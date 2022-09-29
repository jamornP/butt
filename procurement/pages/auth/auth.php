<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /butt/procurement/pages/auth/index.php");
        exit;
    }
    
?>