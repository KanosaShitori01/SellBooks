<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("location: ../");
    }
    require '../Core/Database.php';
    require '../Controller/BaseController.php';
    require '../Model/BaseModel.php';
    require '../Controller/SignController.php';
    require './sendmail.php';

    $error = "";
    $HelpPass = new SignController;
    if(isset($_POST['conf_acc'])){
        $gmail = $_POST['gmail'];
        $confirm = $HelpPass->checkMail($gmail);
        if(empty($confirm)){
            $error = "wg";
        }else {
            $_SESSION['gmail'] = $confirm[0]['gmail']; 
            sendCodeMail($_SESSION['gmail'], $code);
            $HelpPass->updateUser($confirm[0]['id'], [
                "code_gmail" => $code
            ]);
            header("location: forgotpass.php?confirm-code");
        }
    }
    if(isset($_POST['conf_code'])){
        $codeC = $_POST['otp_change'];
        $User = $HelpPass->findUser("gmail", $_SESSION['gmail']);
        $User_code = $HelpPass->confirmation($codeC, $User[0]['id'], true);
        if(!$User_code){
            $error = "wc";
        }else{
            $_SESSION['userC'] = $User[0]['id'];
            header("location: changepass.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh Sách Kim Quy</title>
    <link rel="stylesheet" href="../Public/assets/login.css">
    <script src="https://kit.fontawesome.com/728b560bcb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="back_btn">
        <a href="./"><i class="fas fa-arrow-left"></i></a>
    </div>
    <?php 
        if(!isset($_GET['confirm-code'])){
            echo "
            <div class='login_form'>
                <h1>Quên Mật Khẩu</h1>
                <form action='".$_SERVER['PHP_SELF']."' method='post'>
                    <div class='login_form__txtfield forgpass'>
                        <input type='email' name='gmail' id='' required>
                        <span></span>
                        <label for=''>Gmail</label>";
                echo    "<div class='error err_res'>";
                        echo ($error == "wg") ? "<p>(*) Gmail đã được sử dụng</p>" : ""; 
                echo    "</div>";
            echo   "</div>
                    <input class='forgot_submit' type='submit' name='conf_acc' value='Tiếp tục' id=''>
                </form>
            </div>
            ";
        }
        else {
            echo "
            <div class='login_form'>
                <h1>Mã xác nhận</h1>
                <form action='".$_SERVER['PHP_SELF']."?confirm-code' method='post'>
                    <div class='login_form__txtfield forgpass'>
                        <input type='text' name='otp_change' id='' required>
                        <span></span>
                        <label for=''>Nhập mã</label>";
                echo    "<div class='error err_res'>";
                echo ($error == "wc") ? "<p>(*) Mã xác nhận không hợp lệ</p>" : ""; 
                echo    "</div>
                    </div>
                    <input class='forgot_submit' type='submit' name='conf_code' value='Tiếp tục' id=''>
                </form>
            </div>
            ";
        }
    ?>
    
</body>
<script src="../Public/assets/js.js"></script>
</html>

