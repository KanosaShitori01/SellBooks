<?php 
    // require './Core/Database.php';
    // require './Model/BaseModel.php';
    // $DB = new BaseModel;
    // var_dump($DB->FindMul("carts", [
    //     "id_user" => 31,
    //     "id_products" => 1
    // ]));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>


<?php
include('smtp/PHPMailerAutoload.php');
$html='<h1>Kinh Sách Kim Quy Tới Đây!!!!</h1>';
echo smtp_mailer('tranchauqn9@gmail.com','Tin nhắn từ Kinh Sách Kim QUy',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
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
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$mail->addCC("darkmodenhan@gmail.com");
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>