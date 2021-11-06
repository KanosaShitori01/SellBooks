<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    header("refresh: 0, url=../");
?>