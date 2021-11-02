<?php 
    class SignModel extends BaseModel{
        const TABLE = "users";
        public function checkData(){
            return $this->getAll(self::TABLE);
        }
        public function findUser($name, $pass){
            $checkU = $this->Find(self::TABLE, "", "username", $name);
            return ($pass === $checkU[0]["password"]) ? $checkU : false;
        }
        public function createUser($name, $pass, $gmail, $code){
            $this->toAdd(self::TABLE, [
                "username" => $name,
                "password" => $pass,
                "gmail" => $gmail,
                "code_gmail" => $code,
                "admin" => 'false'
            ]);
        }
    }
?>