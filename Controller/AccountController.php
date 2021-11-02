<?php
    class AccountController extends BaseController{ 
        private $accControl;
        public function __construct(){
            $this->loadModel("SignModel");
            $this->accControl = new SignModel;
        }
        public function index(){
            
        }
    }
?>