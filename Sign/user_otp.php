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
    $CodeConfirmation = new SignController;
    // var_dump($_SESSION['userZ']);
    if(isset($_POST['confirm'])){
        $code = $_POST['otp'];
        $confirm = $CodeConfirmation->confirmation($code, $_SESSION['userZ']);
        var_dump($confirm);
        if(empty($confirm)){
            $error = "wc";
        }else{
            $dataUser = $confirm;
            unset($_SESSION['userZ']);
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
    <!-- <div class="back_btn">
        <a href="./"><i class="fas fa-arrow-left"></i></a>
    </div> -->
    <div class="login_form">
        <h1>Mã Xác Nhận</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <div class="login_form__txtfield forgpass">
                <input type="text" name="otp" id="" required>
                <span></span>
                <label for="">Nhập mã</label>
                <div class="error err_res">
                    <?php echo ($error == "wc") ? "<p>Mã xác nhận không chính xác!</p>" : ""; ?>
                </div>
            </div>
            <input class="forgot_submit" type="submit" name="confirm" value="Tiếp tục" id="">
        </form>
    </div>
</body>
<script src="../Public/assets/js.js"></script>
</html>

