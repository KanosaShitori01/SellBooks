<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
   class CategoryController extends BaseController{
        private $categoryController;
        private $productController;
        public function __construct(){
            $this->loadModel("CategoryModel");
            $this->loadModel("ProductModel");
            $this->productController = new ProductModel;
            $this->categoryController = new CategoryModel;
        }
        public function index(){
            header("refresh: 0, url=./");
        }
        public function show(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            $ProductFollow = $this->productController->findProductBN("id_category", $id);
            $CategoryMain = $this->categoryController->findCategory($id);
            return $this->loadView("FrontEnd.Categories.show", [
                "products_follow" => $ProductFollow,
                "category_main" => $CategoryMain
            ]);
        }
    }
?>