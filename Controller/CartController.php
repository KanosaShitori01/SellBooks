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
                "quantityProd" => $setQuantityProd,
                "error" => $_SESSION['error']
            ]);
        }
        public function update(){
            if(isset($_GET['change']) && isset($_GET['id'])){
                $keyChange = explode(",", $_GET['id']);
                $valChange = explode(",", $_GET['change']);
                $perRes = [];
                for($i = 0; $i < count($keyChange); $i++){
                    array_push($perRes, [
                        "id" => $keyChange[$i],
                        "quantity" => $valChange[$i]
                    ]);
                }
                foreach($perRes as $res){
                    $cartND = $this->cartController->findCart("id", $res['id']);
                    if($res['quantity'] > $cartND[0]['quantity_max']){
                        $this->cartController->updateCart($res["id"], [
                            "quantity" => $cartND[0]['quantity_max']
                        ]);
                        $_SESSION['error'] = "Bạn đã vượt quá số lượng sách có thể mua được";
                    }
                    else{
                        $this->cartController->updateCart($res["id"], [
                            "quantity" => $res["quantity"]
                        ]);
                    }
                }
            }
            $this->loadView("FrontEnd.Cart.index",[
                "error" => "Bạn đã vượt quá số lượng sách có thể mua được"
            ]);
            header("location: ?controller=cart");
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