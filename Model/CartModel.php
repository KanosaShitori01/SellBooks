<?php
    class CartModel extends BaseModel{
        const TABLE = "carts";

        public function showProducts(){
            return $this->getAll(self::TABLE);
        }

        public function addProduct($id){
            $Product = $this->Find("products", $id)[0];
            $setProductKey = [
                "name" => ''.$Product['name'],
                "price" => $Product['price'],
                "quantity" => 1,
                "received" => 'false',
                "id_products" => $id   
            ];
            $this->Query("TRUNCATE TABLE carts");
            $Data = $this->Find(self::TABLE, "", "id_products", $id);
            if(isset($Data[0]["quantity"]) && $Data[0]["quantity"] > 0){
                return $this->Update(self::TABLE, "", "id_products", $id, ["quantity" => $Data["quantity"]+=1]);
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