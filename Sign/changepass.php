<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("location: ../");
    }
    require '../Core/Database.php';
    require '../Controller/BaseController.php';
    require '../Model/BaseModel.php';
    require '../Controller/SignController.php';
    $error = "";
    $Log = new SignController;
    if(isset($_POST['changepass'])){
        $password = md5($_POST['password']);
        $re_password = md5($_POST['re_password']);
        if($password !== $re_password){
            $error = "wp";
        }else{
            $changepass = $Log->updateUser($_SESSION['userC'], [
                "password" => $password
            ]);
            ($changepass) ? header("location: login.php") : "";
            session_unset();
            session_destroy();
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
    <div class="login_form">
        <h1>Đổi Mật Khẩu</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <div class="login_form__txtfield">
                <input type="password" name="password" id="" required>
                <span></span>
                <label for="">Mật khẩu mới</label>
                <div class="error">
                    <?php echo ($error == "wp") ? "(*) Mật khẩu không trùng khớp" : ""; ?>
                </div>
            </div>
            <div class="login_form__txtfield">
                <input type="password" name="re_password" id="" required>
                <span></span>
                <label for="">Nhập lại mật khẩu mới</label>
               
            </div>
            <input class="forgot_submit" type="submit" name="changepass" value="Xác Nhận" id="">
        </form>
    </div>
</body>
<script src="../Public/assets/js.js"></script>
</html>

