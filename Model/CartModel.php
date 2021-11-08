<?php
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class CartModel extends BaseModel{
        const TABLE = "carts";
        public function findCart($key, $value, $mul = "no", $data = []){
            if($mul == "no")
            return $this->Find(self::TABLE, "", $key, $value, true);
            else 
            return $this->FindMul(self::TABLE, $data);
        }
        public function updateCart($id, $data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
        public function addProduct($id, $quan, $id_u){
            $Product = $this->Find("products", $id, "", "", true)[0];
            $setProductKey = [
                "name" => ''.$Product['name'],
                "price" => $Product['price'],
                "image" => $Product['image'],
                "quantity" => $quan,
                "orderU" => 'false',
                "id_products" => $Product['id'],
                "id_user" => $_SESSION['user']
            ];
            // $this->Query("TRUNCATE TABLE carts");
            $Data = $this->Find(self::TABLE, "", "id_user", $id_u, true);
            // var_dump($Data);
            if(!empty($Data)){
                foreach($Data as $cartdata){
                    if($cartdata["quantity"] > 0)
                    $this->Update(self::TABLE, "", "id_products", $id, ["quantity" => $Data[0]["quantity"]+=$quan]);
                    if($cartdata['id_products'] !== $id)
                    $this->toAdd(self::TABLE, $setProductKey);
                }        
                return true;    
            }
            else {
                return $this->toAdd(self::TABLE, $setProductKey);
            }
        }
        public function alterCart($column, $val){
            return $this->Alter(self::TABLE, $column, $val);
        }
        public function deleteCart($id = "", $query = false, $key = "", $val = ""){
            if($query) {
                return $this->Delete(self::TABLE, "", true, $key, $val);
            } 
            return $this->Delete(self::TABLE, $id);
        }
        public function deleteCartUser($key, $val){
            return $this->Delete(self::TABLE, "", true, $key, "'".$val."'");
        }
    }
?>