<?php
    //lay username can xoa trong duong lien ket
    $proid = $_GET['proid'];
    //echo $user;

    //ket noi csdl
    require_once './connect.php';

    //lenh xoa
    $delete = "DELETE FROM products WHERE proid='$proid'";

    //thuc thi
    mysqli_query($conn,$delete);

    //tro lai trang liet ke
    header("Location: quanlysanpham.php");

?>