<?php 
     (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
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
            $Carts = (isset($_SESSION['user'])) ? $this->cartController->findCart("id_user", $_SESSION['user']) : "";
            $quantiyProd = $this->productController->getAllProduct(["id, quantity"]);
            $setQuantityProd = [];
            // var_dump(self::changeC());
            foreach($quantiyProd as $prod){
                $setQuantityProd += [$prod["id"] => $prod["quantity"]];
            }
            return $this->loadView("FrontEnd.Cart.index",[
                "carts" => $Carts,
                "quantityProd" => $setQuantityProd,
            ]);
        }
        public function update(){
            // var_dump(self::$count);
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
                    $productND = $this->productController->findProductBID($cartND[0]['id_products']);
                    if($res['quantity'] > $productND[0]['quantity']){
                        $this->cartController->alterCart("error", "varchar(255)");
                        $this->cartController->updateCart($res["id"], [
                            "quantity" => $productND[0]['quantity'],
                            "error" => $this->ErrBuy
                        ]);
                        header("location: ?controller=cart");
                        break;
                    }
                    else{
                        $this->cartController->updateCart($res["id"], [
                            "quantity" => $res["quantity"],
                            "error" => ""
                        ]);
                        // $this->clearSession();
                        header("location: ?controller=cart");
                    }
                }
            }
            return $this->loadView("FrontEnd.Cart.index",[
                "error" => "OKEEEE"
            ]);
            // var_dump($check);
            // return $check;
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