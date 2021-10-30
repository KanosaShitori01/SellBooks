<?php
    class CartModel extends BaseModel{
        const TABLE = "carts";

        public function showProducts(){
            return $this->getAll(self::TABLE);
        }
        public function findCart($key, $value){
            return $this->Find(self::TABLE, "", $key, $value);
        }
        public function updateCart($id, $data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
        public function addProduct($id, $quan){
            $Product = $this->Find("products", $id)[0];
            $setProductKey = [
                "name" => ''.$Product['name'],
                "price" => $Product['price'],
                "image" => $Product['image'],
                "quantity" => $quan,
                "quantity_max" => $Product['quantity'],
                "received" => 'false',
                "id_products" => $Product['id']   
            ];
            // $this->Query("TRUNCATE TABLE carts");
            $Data = $this->Find(self::TABLE, "", "id_products", $id);
            // var_dump($Data);
            if(isset($Data[0]["quantity"]) && $Data[0]["quantity"] > 0){
                // echo "VVVVVVVVVVVVVVVVVVVVVVV";
                return $this->Update(self::TABLE, "", "id_products", $id, ["quantity" => $Data[0]["quantity"]+=$quan]);
            }
            else {
                return $this->toAdd(self::TABLE, $setProductKey);
            }
        }
        
        public function deleteCart($id){
            return $this->delete(self::TABLE, $id);
        }
    }
?>