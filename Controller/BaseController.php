<?php 
    class BaseController{
        const VIEW_FOLDER_NAME = 'View';
        const MODEL_FOLDER_NAME = 'Model';
        protected $ErrBuy = "Số lượng đã đạt mức tối đa. Quý khách vui lòng liên hệ email hoặc hotline để được tư vấn và hỗ trợ tốt nhất.";
        protected function loadView($viewPath, array $data = []){
            foreach($data as $key => $value){
                $$key = $value;
            }
            require (self::VIEW_FOLDER_NAME.'/'.str_replace('.', '/', $viewPath).'.php');
        }
        protected function loadModel($modelPath, $in = false){
            if($in == false){
                return require (self::MODEL_FOLDER_NAME.'/'.$modelPath.'.php');
            }
            else return require ("../".self::MODEL_FOLDER_NAME.'/'.$modelPath.'.php');
        }
        protected function clearSession(){
            session_unset();
            session_destroy();
            // session_start();
        }
        public function emailValid($string) 
        { 
            if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
        } 
    }
?>