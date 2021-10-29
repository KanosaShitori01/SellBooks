<?php 
    class AuthorController extends BaseController{
        private $authorController;
        private $productController;
        public function __construct()
        {
            $this->loadModel("AuthorModel");
            $this->loadModel("ProductModel");
            $this->authorController = new AuthorModel;
            $this->productController = new ProductModel;
        }
        public function index(){
            header("refresh: 0, url=./");
        }
        public function show(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $author_name = $this->authorController->findAu($id);
                $products_author = $this->productController->findProductBN("id_author", $id);
            }
            else header("refresh: 0, url=./");
            // var_dump($products_author);
            return $this->loadView("FrontEnd.Author.show", [
                "products_author" => $products_author,
                "name_author" => $author_name
            ]);
        }
    }
?>