<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class NewsModel extends BaseModel{
        const TABLE = "news";
        public function getAllNews($select = ["*"]){
            return $this->getAll(self::TABLE, $select);
        }
        public function findNews($id = "", $mul = false, $key = "", $val = ""){
            if(!$mul)
            return $this->Find(self::TABLE, $id);
            else 
            return $this->Find(self::TABLE, "", $key, $val, true);
        }
        public function addNews($data){
            return $this->toAdd(self::TABLE, $data);
        }
        public function updateNews($id,$data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
        public function deleteNews($id, $img){
            unlink($img);
            return $this->Delete(self::TABLE, $id);
        }
    }
?>