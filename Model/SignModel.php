<?php 
    class SignModel extends BaseModel{
        const TABLE = "users";
        public function checkData(){
            return $this->getAll(self::TABLE);
        }
        public function findUser($name, $pass){
            $error = [
                "err_username" => "Wrong username",
                "err_password" => "Wrong Password",
                "err_notfound" => "NOT FOUND"
            ];
            
            $checkU = $this->Find(self::TABLE, "", "username", $name);
            if(!empty($checkU)){
                return ($pass === $checkU[0]['password']) ? $checkU[0] : $error["err_password"];
            }else return $error["err_notfound"];
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