<?php 
    class SignController extends BaseController{
        private $signController;
        public function __construct(){
            $this->loadModel("SignModel", true);
            $this->signController = new SignModel;
        }
        public function login($username, $password){
            $login_now = $this->signController->findUser($username, $password);
            return $login_now;
        }
        public function register($username, $password, $re_password, $tel, $gmail, $code){
            $register_now =$this->signController->createUser($username, $password, $re_password, $tel, $gmail, $code);
            return $register_now;
        }
        public function confirmation($code, $id, $tp = false){
            $confirm_now = $this->signController->CodeConfirmation($code, $id);
            // var_dump($confirm_now);
            if(!empty($confirm_now) && !$tp){
                $acp = $this->signController->Accept($confirm_now['id']);
                return ($acp) ? $confirm_now : false;
            }else if(!empty($confirm_now) && $tp){
                return true;
            } 
            else return false;
        }
        public function updateUser($id, $data){
            return $this->signController->updateUser($id, $data);
        }
        public function checkMail($mail){
            return $this->signController->findUserQ("gmail", $mail);
        }
        public function findUser($key, $val){
            return $this->signController->findUserQ($key, $val);
        }
    }
?>