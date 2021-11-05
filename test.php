<?php 
    // require './Core/Database.php';
    // require './Model/BaseModel.php';
    // $DB = new BaseModel;
    // var_dump($DB->FindMul("carts", [
    //     "id_user" => 31,
    //     "id_products" => 1
    // ]));
    $dis = "";
    if(isset($_POST['ok'])){
        $dis = "disabled";
    }
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
    <form action="test.php" method="post">
        <input type="submit" name="ok" value="OKE" <?= $dis ?>>
    </form>
</body>
</html>