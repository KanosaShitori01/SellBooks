<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class CategoryModel extends BaseModel{
        const TABLE = "categories";
        public function getAllCategory($select = ["*"], $orderBy = [""]){
            return $this->getAll(self::TABLE, $select, $orderBy);
        }
        public function findCategory($id){
            return $this->Find(self::TABLE, $id);
        }
        public function findProducts(){
            
        }

        // Admin 
        public function addCategory($data){
            return $this->toAdd(self::TABLE, $data);
        }
        public function editCategory($id, $data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
        public function deleteCategory($id){
            return $this->delete(self::TABLE, $id);
        }
    }
?>