<?php 
   class ProductsController extends BaseController{
        private $productsController;
        private $categoriesController;
        private $cartController;
        public function __construct(){
            $this->loadModel("ProductModel");
            $this->loadModel("CategoryModel");
            $this->loadModel("CartModel");
            $this->productsController = new ProductModel; 
            $this->categoriesController = new CategoryModel;
            $this->cartController = new CartModel;
        }
        public function index(){
            $Categories = $this->categoriesController->getAllCategory();
            $Data = $this->productsController->getAllProduct();
            $this->loadView("FrontEnd.Products.index",[
                "products" => $Data,
                "categories" => $Categories
            ]);
            // header("location: View/FrontEnd/Products/index.php");
        }
        public function find(){
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                $ProductSearch = $this->productsController->findProductBN("name", "'%".$name."%'"); 
                // $cartAdd = $this->cartController->addProduct($id);
            }
            // var_dump($ProductSearch);
            $this->loadView("FrontEnd.Products.find",[
                "Products" => $ProductSearch
            ]);
        }
        public function show(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $ProductMain = $this->productsController->findProductBID($id);
            }
            $this->loadView("FrontEnd.Products.show",[
                "ProductOne" => $ProductMain
            ]);
        }
        public function buy(){
            if(isset($_SESSION['user'])){
                if(isset($_GET['id']) && isset($_GET['quantity'])){
                    $id = $_GET['id'];
                    $quantity = $_GET['quantity'];
                    $productBuy = $this->productsController->findProductBID($id);
                    $cartCheck = $this->cartController->findCart("id_products", $id);
                    if($quantity > $productBuy[0]['quantity']){
                        $this->failBuy($id);
                        return header("location: ?controller=products&action=show&id=$id");
                    }
                    else if(!empty($cartCheck) && $quantity <= $productBuy[0]['quantity']){
                        $how = $cartCheck[0]['quantity'] + $quantity;
                        if($how > $cartCheck[0]['quantity_max']){
                            $this->failBuy($id);
                            return header("location: ?controller=products&action=show&id=$id");
                        }
                        else{
                            $this->compleBuy($id, $quantity);
                        }
                    }
                    else if($productBuy[0]["quantity"] == 1 && $quantity > 1){
                    $this->compleBuy($id, 1);
                    $this->failBuy($id, true);
                    }
                    else{
                    $this->compleBuy($id, $quantity);
                    $this->failBuy($id, true);
                    }
                }
            }else{
                header("location: ./Sign/login.php");
            }
        }
        public function failBuy($id, $reset = false){
            if($reset == false){
                $this->productsController->alterProduct("error", "varchar(225)");
                $this->productsController->editProduct($id, [
                    "error" => $this->ErrBuy
                ]);
            }
            else{
                $this->productsController->editProduct($id, [
                    "error" => ""
                ]);
            }
        }
      
        public function compleBuy($id, $quantity){
            $this->cartController->addProduct($id, $quantity);
            header("location: ?controller=cart");
        }
    }
?>