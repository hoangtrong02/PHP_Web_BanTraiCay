<?php
include 'connect.php';
$admin = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">

    <title>Quản lý sản phẩm</title>
    <link rel="icon" type="image/png" href="../assets/img/icons/favicon.ico" />
    <style>
        .navbar {
            padding: 0 130px;
        }
        .container{
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> 20200985@eaut.edu.vn</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img style="width: 20px;" src="../assets/img/language.png" alt="">
                                <div>Vietnam</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Vietnam</a></li>
                                    <!-- <li><a href="#">English</a></li> -->
                                </ul>
                            </div>
                            <!-- Đăng nhập đăng xuất -->
                            <div class="header__top__right__auth">
                                <?php if (isset($admin['email'])) { ?>
                                    <div class="header__top__right__language">
                                        <div class="fa fa-user header__navbar-item header__navbar-item--bold"> <?php echo $admin['username']; ?></div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="../index.php">Trang chủ</a></li>
                                            <li><a href="../dangxuat.php">Đăng xuất</a></li>
                                        </ul>
                                    </div>

                                <?php } else { ?>
                                    <div class="header__top__right__language">
                                        <div class="fa fa-user header__navbar-item header__navbar-item--bold">
                                            Tài khoản</div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="login.php">Đăng nhập</a></li>
                                            <!-- <li><a href="#">Đăng ký</a></li> -->
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <nav class="header__menu">
                    <ul>
                        <li class=""><a href="./quanlysanpham.php">Quản lý sản phẩm</a></li><br>
                        <li class=""><a href="./quanlydonhang.php">Đơn hàng</a></li><br>
                        <li class="active"><a href="./chitietdonhang.php">Chi tiết đơn hàng</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <?php
                //lenh select
                $orderid = $_GET['orderid'];
                $select_order = mysqli_query($conn, "SELECT * FROM order_detail join orders 
                on order_detail.orderid = orders.orderid join products 
                on order_detail.proid = products.proid
                where orders.orderid = $orderid");
                $order = mysqli_fetch_assoc($select_order);
            ?>
                <tr>
                    <th>Mã đơn hàng: <?=$order['orderid']?></th>
                    <th>Tên khách hàng: <?=$order['cusname']?></th>
                    <th>Địa chỉ: <?=$order['address']?></th>
                    
                    <th style="text-align: center;">Số điện thoại: 0<?= number_format($order['phone'], 0, ".", ".")?></th>
                    <th style="text-align: center;">Ngày đặt hàng: <?=date("H:i d/m/Y", $order['created_time'])?></th>
                    <th>
                        <a href="./print.php?orderid=<?=$order['orderid']?>" class="">In hoá đơn</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orderid = $_GET['orderid'];
                $select_order = mysqli_query($conn, "SELECT * FROM order_detail join orders 
                on order_detail.orderid = orders.orderid join products 
                on order_detail.proid = products.proid
                where orders.orderid = $orderid");
                while ($order = mysqli_fetch_assoc($select_order)) {
                ?>
                    <tr class="table-success">
                        <td><img style="width: 60px; height: 40px;" src="../assets/img/product/<?=$order['image']?>" alt=""></td>
                        <td><p style="color: blue; display: inline-block;"><?=$order['proname']?></p></td>
                        <td>Đơn giá: &nbsp; <p style="color: blue; display: inline-block;"><?= number_format($order['price'], 0, ".", ".")?><sup>đ</sup></p></td>
                        <td>Số lượng (kg): &nbsp; <p style="color: blue; display: inline-block;"><?=$order['quantity']?></p></td>
                        <td>Thành tiền: &nbsp; <p style="color: blue; display: inline-block;"><?= number_format($order['price'] * $order['quantity'], 0, ".", ".")?><sup>đ</sup></p></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img style="width:160px; height:60px;" src="../assets/img/Fruit.jpg" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Siêu thị Lanchi mart</li>
                            <li>Điện thoại: +8498 725 802</li>
                            <li>Email: 20200985@eaut.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên kết hữu ích</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Cửa hàng của chúng tôi</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Chúng tôi là ai</a></li>
                            <li><a href="#">Dịch vụ của chúng tôi</a></li>
                            <li><a href="#">Sản phẩm</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                        <p>Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                        <form action="#">
                            <input type="text" placeholder="Địa chỉ email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Đã đăng ký Bản quyền | Mẫu này được làm
                                <i class="fa fa-heart" aria-hidden="true"></i> bởi
                                <a href="#" target="_blank">Hoàng Xuân Trọng</a>
                            </p>
                            <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script>  -->
                        </div>
                        <div class="footer__copyright__payment"><img src="./assets/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Js  -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery.slicknav.js"></script>
    <script src="../assets/js/mixitup.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>