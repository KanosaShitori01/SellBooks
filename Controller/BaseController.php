<?php 
    class BaseController{
        const VIEW_FOLDER_NAME = 'View';
        const MODEL_FOLDER_NAME = 'Model';

        protected function loadView($viewPath, array $data = []){
            foreach($data as $key => $value){
                $$key = $value;
            }
            require (self::VIEW_FOLDER_NAME.'/'.str_replace('.', '/', $viewPath).'.php');
        }
        protected function loadModel($modelPath){
            return require (self::MODEL_FOLDER_NAME.'/'.$modelPath.'.php');
        }
    }
?>