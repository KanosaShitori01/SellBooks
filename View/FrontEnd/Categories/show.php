<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    $GLOBALS['products_follow'] = $products_follow;
    $GLOBALS['category_main'] = $category_main;
?>