<?php
    session_start();
    unset($_SESSION['err_msg']);
    session_destroy();
    header("Location: /edit"); 
?>

