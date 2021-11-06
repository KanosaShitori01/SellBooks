<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    $GLOBALS['products'] = $products;
    $GLOBALS['key_products'] = $categories;
?>