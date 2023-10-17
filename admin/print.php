<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In hoá đơn</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tohoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 21cm;
            overflow: hidden;
            min-height: 297mm;
            padding: 2.5cm;
            margin-left: auto;
            margin-right: auto;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 237mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        button {
            width: 100px;
            height: 24px;
        }

        .header {
            overflow: hidden;
        }

        .logo {
            background-color: #FFFFFF;
            text-align: left;
            float: left;
        }

        .company {
            padding-top: 24px;
            text-transform: uppercase;
            background-color: #FFFFFF;
            text-align: right;
            float: right;
            font-size: 16px;
        }

        .title {
            text-align: center;
            position: relative;
            color: #000;
            font-size: 24px;
            top: 1px;
            font-weight: bold;
        }

        .footer-left {
            text-align: center;
            text-transform: uppercase;
            padding-top: 24px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            float: left;
            font-size: 12px;
            bottom: 1px;
        }

        .footer-right {
            text-align: center;
            text-transform: uppercase;
            padding-top: 24px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            font-size: 12px;
            float: right;
            bottom: 1px;
        }

        .TableData {
            background: #ffffff;
            font: 11px;
            width: 100%;
            border-collapse: collapse;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            border: thin solid #d3d3d3;
        }

        .TableData TH {
            text-align: center;
            font-weight: bold;
            color: #000;
            border: solid 1px #ccc;
            height: 24px;
        }

        .TableData TR {
            height: 24px;
            border: thin solid #d3d3d3;
        }

        .TableData TR TD {
            padding-right: 2px;
            padding-left: 2px;
            border: thin solid #d3d3d3;
        }

        .TableData TR:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .TableData .cotSTT {
            text-align: center;
            width: 10%;
        }

        .TableData .cotTenSanPham {
            text-align: left;
            width: 40%;
        }

        .TableData .cotHangSanXuat {
            text-align: left;
            width: 20%;
        }

        .TableData .cotGia {
            text-align: right;
            width: 120px;
        }

        .TableData .cotSoLuong {
            text-align: center;
            width: 120px;
        }

        .TableData .cotSo {
            text-align: center;
            width: 150px;
        }

        .TableData .tong {
            text-align: right;
            font-weight: bold;
            text-transform: uppercase;
            padding-right: 5px;
        }

        .TableData .cotSoLuong input {
            text-align: center;
        }

        @media print {
            @page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body onload="window.print();">
    <div id="page" class="page">
        <div class="header">
            <!-- <div class="logo"><img src="" /></div> -->
            <div class="company" style="float: left;">Fruit Store</div>
            <div class="company">Siêu thị Lanchi mart</div>
        </div>
        <br><br>
        <div class="title">
            HÓA ĐƠN THANH TOÁN
            <br>-----------------<br>
        </div>
        <p style="text-align: center; font-size: 14px;">Ngày lập hoá đơn:  <?=date("d/m/Y H:i", time())?></p>
        <div>
            <?php
            //lenh select
            $orderid = $_GET['orderid'];
            $select_order = mysqli_query($conn, "SELECT * FROM order_detail join orders 
                on order_detail.orderid = orders.orderid join products 
                on order_detail.proid = products.proid
                where orders.orderid = $orderid");
            $order = mysqli_fetch_assoc($select_order);
            ?>
            <ul style="list-style: none; padding-left: 5px;">
                <li><b style="font-size: 16px;">Tên khách hàng:</b> <?=$order['cusname']?></li>
                <li><b style="font-size: 16px;">Địa chỉ:</b> <?=$order['address']?></li>
                <li><b style="font-size: 16px;">Số điện thoại:</b> 0<?=number_format($order['phone'], 0, ".", ".")?></li>
            </ul>
        </div>
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $stt = 1;
            $orderid = $_GET['orderid'];
            $select_order = mysqli_query($conn, "SELECT * FROM order_detail join orders 
                on order_detail.orderid = orders.orderid join products 
                on order_detail.proid = products.proid
                where orders.orderid = $orderid");
            while ($order = mysqli_fetch_assoc($select_order)) {
            ?>
                <tr>
                    <td class="cotSTT"><?= $stt ?></td>
                    <td class="cotTenSanPham" style="text-align: center;"><?= $order['proname'] ?></td>
                    <td class="cotGia" style="text-align: center;"><?= number_format($order['price'], 0, ".", ".") ?></td>
                    <td class="cotSoLuong" style="text-align: center;"><?= $order['quantity'] ?></td>
                    <td class="cotSo"><?= number_format(($order['quantity'] * $order['price']), 0, ",", ".") ?>đ</td>
                </tr>
            <?php
                $stt++;
            }
            ?>
            <tr>
                <?php
                //lenh select
                $orderid = $_GET['orderid'];
                $select_order = mysqli_query($conn, "SELECT * FROM order_detail join orders 
                on order_detail.orderid = orders.orderid join products 
                on order_detail.proid = products.proid
                where orders.orderid = $orderid");
                $order = mysqli_fetch_assoc($select_order);
                ?>
                <td colspan="4" class="tong">Tổng cộng</td>
                <td class="cotSo" style="color: green;"><?php echo number_format($order['total_price'], 0, ".", "."); ?>đ</td>
            </tr>
        </table>
        <div class="footer-left"><br><br>
            Khách hàng </div>
            <?php $date = getdate()?>
        <div class="footer-right"> Hà nội, ngày <?=$date['mday']?> tháng <?=$date['mon']?> năm <?=$date['year']?><br><br>
            Nhân viên </div>
    </div>
</body>

</html>