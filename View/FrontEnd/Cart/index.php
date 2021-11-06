<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    $GLOBALS['cart'] = $carts;
    $GLOBALS['quantityProd'] = $quantityProd;
    // var_dump($GLOBALS['error']);
    // var_dump($GLOBALS['cart']);
?>