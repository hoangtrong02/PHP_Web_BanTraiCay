<?php
    include 'admin/connect.php';
    unset($_SESSION['user']);
    unset($_SESSION['cart']);
    header("location: index.php");
?>