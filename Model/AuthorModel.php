<?php 

    class AuthorModel extends BaseModel{
        const TABLE = "author";
        public function getAllAu(){
            return $this->getAll(self::TABLE);
        }
        public function findAu($id){
            return $this->Find(self::TABLE, $id);
        }
    }
?>