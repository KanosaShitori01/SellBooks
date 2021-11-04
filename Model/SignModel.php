<?php 
    class SignModel extends BaseModel{
        const TABLE = "users";
        public function checkData(){
            return $this->getAll(self::TABLE);
        }
        public function findUserQ($key, $value){
            return $this->Find(self::TABLE, "", $key, "'".$value."'", true);
        }
        public function showInfor($id){
            return $this->Find(self::TABLE, $id, true); 
        }
        public function findUser($name, $pass){
            $error = [
                "err_password" => "wp",
                "err_notfound" => "nf"
            ];
            
            $checkU = $this->Find(self::TABLE, "", "username", $name);
            if(!empty($checkU) && $checkU[0]['checkU']){
                return ($pass === $checkU[0]['password']) ? $checkU[0] : $error["err_password"];
            }else return $error["err_notfound"];
        }
        public function createUser($name, $pass, $re_pass, $tel, $gmail, $code){
            $error = [
                "username" => "ue",
                "gmail" => "ge",
                "pass" => "wp",
                "tel" => "wt",
                "tel_2" => "te"
            ];
            // echo "$name, $pass, $re_pass, $tel, $gmail, $cosde";
            $nameC = $this->Find(self::TABLE, "", "username", "'".$name."'");
            $gmailC = $this->Find(self::TABLE, "", "gmail", "'".$gmail."'");
            $telC = $this->Find(self::TABLE, "", "tel", "'".$tel."'");
            if(!empty($nameC)){
                return $error["username"];
            }else if(!empty($gmailC)){
                return $error["gmail"];
            }else if(!empty($telC)){
                return $error["tel_2"];
            }else if(strlen($tel) < 10){
                return $error["tel"];
            }else if($pass !== $re_pass){
                return $error["pass"];
            }else{
                return $this->toAdd(self::TABLE, [
                        "username" => $name,
                        "password" => $pass,
                        "gmail" => $gmail,
                        "code_gmail" => $code,
                        "tel" => $tel,
                        "admin" => 'false',
                        "checkU" => 'false'
                ]);
            }
        }
        public function CodeConfirmation($code, $id){
            $Data = $this->Find(self::TABLE, $id);
            return ($Data[0]['code_gmail'] === $code) ? $Data[0] : "";
        }
        public function Accept($id){
            return $this->Update(self::TABLE, $id, "", "", [
                "checkU" => '1'
            ]);
        }
        public function UpdateUser($id, $data){
            return $this->Update(self::TABLE, $id, "", "", $data);
        }
    }
?>
<!-- Notice: Array to string conversion in C:\xampp\htdocs\SellBooks\Model\SignModel.php on line 39
Array, e10adc3949ba59abbe56e057f20f883e, , 734003, 0337294740, falseNULL NULL OKE -->

<!-- Admin_BRUH, 17225f2346a7f6eaa6d6d92876d1cd72, 17225f2346a7f6eaa6d6d92876d1cd72, 0337294740, 
tuananhditu1@gmail.com, 622230
INSERT INTO users(id, username, password, gmail, code_gmail, tel, admin) 
VALUES(NULL, '', '17225f2346a7f6eaa6d6d92876d1cd72', '', '622230', '0337294740', 'false')
bool(true) NULL NULL OKE -->