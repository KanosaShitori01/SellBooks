<?php 
    class SignModel extends BaseModel{
        const TABLE = "users";
        public function checkData(){
            return $this->getAll(self::TABLE);
        }
        public function findUser($name, $pass){
            $error = [
                "err_password" => "wp",
                "err_notfound" => "nf"
            ];
            
            $checkU = $this->Find(self::TABLE, "", "username", $name);
            if(!empty($checkU)){
                return ($pass === $checkU[0]['password']) ? $checkU[0] : $error["err_password"];
            }else return $error["err_notfound"];
        }
        public function createUser($name, $pass, $gmail, $code){
            $error = [
                "username" => "ue",
                "gmail" => "ge",
                "pass" => "wp"
            ];
            $name = $this->Find(self::TABLE, "", "username", $name);
            $gmail = $this->Find(self::TABLE, "", "gmail", $gmail);
            if(empty($name) && empty($gmail)){
                
            }
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