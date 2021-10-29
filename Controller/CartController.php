<?php 
    class CartController extends BaseController{
        private $cartController;
        public function __construct()
        {
            $this->loadModel("CartModel");
            $this->cartController = new CartModel;
        }
        public function index(){
            $Carts = $this->cartController->showProducts();
            return $this->loadView("FrontEnd.Cart.index",[
                "carts" => $Carts
            ]);
        }
        public function delete(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                return $this->cartController->deleteCart($id);
            }
        }
    }
?>