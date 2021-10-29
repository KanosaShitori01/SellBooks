<?php 
    class ProductModel extends BaseModel{
        const TABLE = "products";
        // Models Main
        public function getAllProduct($select = ["*"], $orderBy = [""]){
            return $this->getAll(self::TABLE, $select, $orderBy);
        }
        public function findProductBID($id){
            return $this->Find(self::TABLE, $id);
        }
        public function findProductBN($key, $value){
            return $this->Find(self::TABLE, "", $key, $value);
        }
       
        // Admin 
        public function addProduct($data){
            return $this->toAdd(self::TABLE, $data);
        }
        public function editProduct($id, $data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
        public function deleteProduct($id){
            return $this->delete(self::TABLE, $id);
        }
    }
?>