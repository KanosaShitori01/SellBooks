<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class PayModel extends BaseModel{
        const TABLE = "myorder";
        public function addOrder($data){
            return $this->toAdd(self::TABLE, $data);
        }
        public function showOrder(){
            return $this->getAll(self::TABLE);
        }
        public function findOrder($key, $value){
            return $this->Find(self::TABLE, "", $key, $value, true);
        }
        public function CancelOrder($id){
            return $this->Delete(self::TABLE, $id);
        }
    }
?>