<?php
    session_start();
    unset($_SESSION['UserLogin']);
    unset($_SESSION['Access']);
    unset($_SESSION['idNumber']);
    echo header("Location: index.php");
?>