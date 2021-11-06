<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    $GLOBALS["products_show"] = $Products;
?>