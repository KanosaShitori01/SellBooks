<?php 
    require './Core/Database.php';
    require './Controller/BaseController.php';
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
        <h1>Đăng Nhập</h1>
        <form action="" method="post">
            <div class="login_form__txtfield">
                <input type="text" name="username" id="" required>
                <span></span>
                <label for="">Tên Đăng Nhập</label>
            </div>
            <div class="login_form__txtfield">
                <input type="password" name="password" id="" required>
                <span></span>
                <label for="">Mật Khẩu</label>
            </div>
            <div class="login_form__forgotpass">
                <span>Quên mật khẩu? </span>
            </div>
            <input type="submit" name="login" value="Đăng Nhập" id="">
            <div class="login_form__signup_link">
                <span>Chưa có tài khoản? </span> <a href="">Đăng Ký</a>
            </div>
        </form>
    </div>
   
</body>
</html>

