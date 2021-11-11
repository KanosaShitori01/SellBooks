<?php 
    // PHP mailer
    (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    if(isset($_GET['controller'])){
    include "./PHPMailer/src/PHPMailer.php";
    include "./PHPMailer/src/Exception.php";
    include "./PHPMailer/src/OAuth.php";
    include "./PHPMailer/src/POP3.php";
    include "./PHPMailer/src/SMTP.php";
    }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
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
           

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'tranchauqn9@gmail.com';                 // SMTP username
                    $mail->Password = 'sxcmggxcigpfxooa';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                    $mail->IsHTML(true);
                    $mail->CharSet = 'UTF-8';
                    //Recipients
                    $mail->setFrom('tranchauqn9@gmail.com', 'Kinh Sach Kim Quy');
                    $mail->addAddress(''.$gmail_to, 'Guest');   
                    $mail->addCC('openniceqn009@gmail.com');

                    $mail->Subject = "$title";
                    $mail->Body    = "$content";
                    $mail->SMTPOptions=array('ssl'=>array(
                        'verify_peer'=>false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>false
                    ));
                
                    $mail->send();
                    return "YES";
                } catch (Exception $e) {
                    return 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
                }
        }
    }
?>