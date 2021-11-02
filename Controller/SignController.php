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
        public function register(){

        }
    }
?>