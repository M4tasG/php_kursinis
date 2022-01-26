<?php
    session_start();
    session_destroy();
    $_SESSION['authenticated'] = false;
    $_SESSION['username'] = "";
    header("Location: login.php");
?>