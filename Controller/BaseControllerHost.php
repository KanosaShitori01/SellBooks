<?php 
    // PHP mailer
      
    (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
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
        public function emailValid($string) 
        { 
            if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
        } 
        public function sendCodeMail($gmail_to, $title, $content){
            include('smtp/PHPMailerAutoload.php');
        	$mail = new PHPMailer(); 
        	$mail->SMTPDebug  = 0;
        	$mail->IsSMTP(); 
        	$mail->SMTPAuth = true; 
        	$mail->SMTPSecure = 'tls'; 
        	$mail->Host = "smtp.gmail.com";
        	$mail->Port = 587; 
        	$mail->IsHTML(true);
        	$mail->CharSet = 'UTF-8';
        	$mail->Username = "darkmodenhan@gmail.com";
        	$mail->Password = "Darkmode123@";
        	$mail->SetFrom("darkmodenhan@gmail.com");
        	$mail->Subject = $title;
        	$mail->Body = $content;
        	$mail->AddAddress($gmail_to);
            $mail->addCC('openniceqn009@gmail.com');
        	$mail->SMTPOptions=array('ssl'=>array(
        		'verify_peer'=>false,
        		'verify_peer_name'=>false,
        		'allow_self_signed'=>false
        	));
        	if(!$mail->Send()){
        	    return false;
        	}else{
        		return true;
        	}
        }
    }
?>