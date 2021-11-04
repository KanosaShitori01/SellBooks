<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("location: ../");
    }else if(isset($_SESSION['userZ'])) header("location: user_otp.php");
    require '../Core/Database.php';
    require '../Controller/BaseController.php';
    require '../Model/BaseModel.php';
    require '../Controller/SignController.php';
    $error = "";
    $Login = new SignController;
    if(isset($_POST['login'])){
        $username = "'".$_POST['username']."'";
        $password = md5($_POST['password']);
        $confirm = $Login->login($username, $password);
        if(!is_array($confirm)){
            $error = $confirm;
        }else{
            $dataUser = $confirm;
            $_SESSION['user'] = $dataUser['id'];
            header("location: ../");
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
        <h1>Đăng Nhập</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <div class="login_form__txtfield">
                <input type="text" name="username" id="" required>
                <span></span>
                <label for="">Tên Đăng Nhập</label>
                <div class="error">
                    <?php echo ($error == "nf") ? "(*) Không tìm thấy tên tài khoản" : ""; ?>
                </div>
            </div>
            <div class="login_form__txtfield">
                <input type="password" name="password" id="" required>
                <span></span>
                <label for="">Mật Khẩu</label>
                <div class="error">
                    <?php echo ($error == "wp") ? "(*) Sai mật khẩu" : ""; ?>
                </div>
            </div>
           
            <div class="login_form__forgotpass">
                <a href="forgotpass.php">Quên mật khẩu?</a>
            </div>
            <input type="submit" name="login" value="Đăng Nhập" id="">
            <div class="login_form__signup_link">
                <span>Chưa có tài khoản? </span> <a href="register.php">Đăng Ký</a>
            </div>
        </form>
    </div>
</body>
<script src="../Public/assets/js.js"></script>
</html>

