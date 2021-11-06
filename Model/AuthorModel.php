<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class AuthorModel extends BaseModel{
        const TABLE = "author";
        public function getAllAu(){
            return $this->getAll(self::TABLE);
        }
        public function findAu($id){
            return $this->Find(self::TABLE, $id);
        }

        
        public function addAu($data){
            return $this->toAdd(self::TABLE, $data);
        }
        public function editAu($id, $data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
        public function deleteAu($id){
            return $this->delete(self::TABLE, $id);
        }
    }
?>