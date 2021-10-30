<?php 
    class CartController extends BaseController{
        private $cartController;
        private $productController;
        public function __construct()
        {
            $this->loadModel("CartModel");
            $this->loadModel("ProductModel");
            $this->cartController = new CartModel;
            $this->productController = new ProductModel;
        }
        public function index(){
            $Carts = $this->cartController->showProducts();
            $quantiyProd = $this->productController->getAllProduct(["id, quantity"]);
            $setQuantityProd = [];
            foreach($quantiyProd as $prod){
                $setQuantityProd += [$prod["id"] => $prod["quantity"]];
            }
            return $this->loadView("FrontEnd.Cart.index",[
                "carts" => $Carts,
                "quantityProd" => $setQuantityProd
            ]);
        }
        public function update(){
            $allCart = $this->cartController->showProducts();
            // if(isset($_GET))
            // foreach($allCart as $data){
                
            // }
           
        }
        public function delete(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $this->cartController->deleteCart($id);
            }
            header("location: ?controller=cart");
        }
    }
?>