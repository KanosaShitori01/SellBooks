<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
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
                if(empty($ProductMain)) header("location: ./");
            }
            $this->loadView("FrontEnd.Products.show",[
                "ProductOne" => $ProductMain
            ]); 
        }
        public function buy(){
            $typeU = (isset($_SESSION['user'])) ? "user" : "guest";
                if(isset($_GET['id']) && isset($_GET['quantity'])){
                    $id = $_GET['id'];
                    $quantity = $_GET['quantity'];
                    $productBuy = $this->productsController->findProductBID($id);
                    $cartCheck = ($typeU == "user") ? $this->cartController->findCart("", "", "mul", [
                        "id_user" => $_SESSION['user'],
                        "id_products" => $id
                    ]) : "";
                    // var_dump($productBuy[0]['quantity']);
                    if($quantity > $productBuy[0]['quantity']){
                        $this->failBuy($id, "Số lượng đã đạt mức tối đa. Quý khách vui lòng liên hệ email hoặc hotline để được tư vấn và hỗ trợ tốt nhất.");
                        return header("location: ?controller=products&action=show&id=$id");
                    }
                    else if(!empty($cartCheck) && $quantity <= $productBuy[0]['quantity']){
                        $how = $cartCheck[0]['quantity'] + $quantity;
                        if($how > $productBuy[0]['quantity']){
                            $this->failBuy($id, "Số lượng đã đạt mức tối đa. Quý khách vui lòng liên hệ email hoặc hotline để được tư vấn và hỗ trợ tốt nhất.");
                            return header("location: ?controller=products&action=show&id=$id");
                        }
                        else{
                            $this->compleBuy($id, $quantity, $typeU);
                        }
                    }
                    else if($productBuy[0]["quantity"] == 1 && $quantity > 1){
                    $this->compleBuy($id, 1, $typeU);
                    // $this->failBuy($id, "", true);
                    }
                    else{
                    $this->compleBuy($id, $quantity, $typeU);
                    // $this->failBuy($id, "", true);
                    }
                }
        }
        public function failBuy($id, $err, $reset = false){
            if($reset == false){
                $this->productsController->alterProduct("error", "varchar(225)");
                $this->productsController->editProduct($id, [
                    "error" => $err
                ]);
            }
            else{
                $this->productsController->editProduct($id, [
                    "error" => ""
                ]);
            }
        }
        public function compleBuy($id, $quantity, $typeU){
            if($typeU == "user") {
            $this->cartController->addProduct($id, $quantity, $_SESSION['user']);
            }else{
                $prod = $this->productsController->findProductBID($id)[0];
                $cartBox = [
                    "id" => rand(11,99),
                    "name" => $prod['name'],
                    "image" => $prod['image'],
                    "price" => $prod['price'],
                    "quantity" => $quantity,
                    "id_products" => $prod['id'],
                    "id_user" => "",
                    "orderU" => "",
                    "error" => "",
                    "max" => ""
                ];
                if($this->checkCartTemp($prod['id'], $quantity, $prod['quantity'], $cartBox) === false) {
                    return header("location: ?controller=products&action=show&id=$id");
                }
                   
            }
            return header("location: ?controller=cart");
        }
        private function checkCartTemp($id, $quantity, $maxquant, $box){
            $check = 0;
            for($i = 0; $i < count($_SESSION['cart']); $i++){
                if($_SESSION['cart'][$i]['id_products'] == $id){
                    $newquant = $quantity + $_SESSION['cart'][$i]['quantity'];
                    if($newquant > $maxquant) {
                        $this->failBuy($id, $this->ErrBuy);
                        return false;
                    }
                    else{
                        $_SESSION['cart'][$i]['quantity'] = $newquant;
                        $check = 1;
                    } 
                    break;
                }
            }
            if($check == 0){
                $_SESSION['cart'][] = $box;
            }
        }
    }
?>