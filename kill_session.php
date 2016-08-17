<?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    header("Location: http://zwsite.tk/page2.php"); /* Redirect browser */
    exit();
?>

