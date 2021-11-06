<?php
    (!isset($_SESSION['url_main'])) ? header("location: ../") : "";
    $GLOBALS['introduce'] = $another_content;
?>