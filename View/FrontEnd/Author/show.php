<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    $GLOBALS['products_author'] = $products_author;
    $GLOBALS['name_author'] = $name_author;
?>