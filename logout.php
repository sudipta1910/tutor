<?php
    session_start();
    session_destroy();
    $_SESSION['user']='Nouser';
    header("Location: index.php");
?>