<?php
    //ket noi csdl
    include '../admin/connect.php';
    
    //nhan du lieu tu form
    $proname = $_POST['proname'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    $price = $_POST['price'];
    $mota = $_POST['mota'];
    $userid = $_POST['userid'];
    
    //lenh them du lieu sql
    $insert = "INSERT INTO `products`(`proid`, `proname`, `image`, `price`, `mota`,`userid`) VALUES ('','$proname','$image','$price','$mota','$userid')";
    //echo $insert;
    //thuc thi
    mysqli_query($conn,$insert);
    move_uploaded_file($image_tmp, '../assets/img/product/'.$image);
    header("Location: quanlysanpham.php");
?>