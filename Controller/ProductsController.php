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
    }
?>