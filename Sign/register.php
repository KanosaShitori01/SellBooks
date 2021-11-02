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
    $Register = new SignController;
    if(isset($_POST['register'])){
        // $username = "'".$_POST['username']."'";
        // $password = md5($_POST['password']);
        // $confirm = $Register->register($username, $password);
        // if(!is_array($confirm)){
        //     $error = $confirm;
        // }else {
        //     $dataUser = $confirm;
        //     $_SESSION['user'] = $dataUser['id'];
        //     header("location: ../");
        // }
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
        <h1>Đăng Ký</h1>
        <form action="" method="post">
            <div class="login_form__txtfield">
                <input type="text" name="username" id="" required>
                <span></span>
                <label for="">Tên Đăng Nhập</label>
            </div>
            <div class="login_form__txtfield">
                <input type="email" name="email" id="" required>
                <span></span>
                <label for="">Email</label>
            </div>
            <div class="login_form__txtfield">
                <input type="tel" name="tel" id="" required>
                <span></span>
                <label for="">Số điện thoại</label>
            </div>
            <div class="login_form__txtfield">
                <input type="password" name="password" id="" required>
                <span></span>
                <label for="">Mật Khẩu</label>
            </div>
            <div class="login_form__txtfield">
                <input type="password" name="re_password" id="" required>
                <span></span>
                <label for="">Nhập Lại Mật Khẩu</label>
            </div>
            <input type="submit" name="register" value="Đăng Ký" id="">
            <div class="login_form__signup_link">
                <span>Đã có tài khoản? </span> <a href="">Đăng Nhập</a>
            </div>
        </form>
    </div>
</body>
<script src="../Public/assets/js.js"></script>
</html>

