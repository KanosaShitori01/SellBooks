<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class AnotherModel extends BaseModel{
        const TABLE = "another";
        public function getAllAN($select = ["*"]){
            return $this->getAll(self::TABLE, $select);
        }
        public function findAN($id = "", $mul = false, $key = "", $val = ""){
            if(!$mul)
            return $this->Find(self::TABLE, $id);
            else 
            return $this->Find(self::TABLE, "", $key, $val, true);
        }
        public function updateANO($id,$data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
    }
?>