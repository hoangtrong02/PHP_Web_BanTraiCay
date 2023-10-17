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

        .container {
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
                        <li class="active"><a href="./quanlysanpham.php">Quản lý sản phẩm</a></li>
                        <li><a href="./quanlydonhang.php">Đơn hàng</a></li>
                        <!-- <li><a href="#">#</a></li> -->
                    </ul>
                </nav>
            </div>
            <!-- <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul> 
                    </div>
                </div> -->
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th style="text-align: center;">Hình ảnh</th>
                    <th style="text-align: center;">Giá bán</th>
                    <th>Mô tả</th>
                    <th style="text-align: right;">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#themsp">
                            Thêm mới
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //ket noi csdl
                require_once './connect.php';
                $userid = $admin['userid'];
                //lenh select
                $select = "SELECT * FROM products where userid = $userid order by proid";

                //thuc thi
                $result = mysqli_query($conn, $select);

                //duyet result
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="table-success">
                        <td style="padding-left: 50px;"><?php echo $r['proid']; ?></td>
                        <td><?php echo $r['proname']; ?></td>
                        <td style="text-align: center;">
                            <img style="width: 60px;" src="../assets/img/product/<?php echo $r['image']; ?>" alt="">
                        </td>
                        <td style="text-align: center;"><?= number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></td>
                        <!-- number_format($cart['price'] * $_SESSION["cart"][$cart['proid']], 0, ".", ".") -->
                        <td><?php echo $r['mota']; ?></td>
                        <td style="text-align: right;"><a href="suasp.php?proid=<?php echo $r['proid']; ?>" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Xac nhan xoa thong tin');" href="xoasp.php?proid=<?php echo $r['proid']; ?>" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal add-->
    <div class="modal" id="themsp">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <!-- <h4 class="modal-title">Sản phẩm mới</h4> -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./themsp.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="usn">Tên sản phẩm:</label>
                            <input type="text" name="proname" class="form-control" placeholder="Nhập tên sản phẩm" id="proname" required>
                        </div>
                        <div class="form-group">
                            <label for="usn">Hình ảnh:</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>
                        <div class="form-group">
                            <label for="usn">Giá bán:</label>
                            <input type="text" name="price" class="form-control" placeholder="Thêm giá" id="price" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mô tả:</label>
                            <input type="text" name="mota" class="form-control" placeholder="Thêm mô tả" id="mota" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="userid" name="userid" type="hidden" value="<?php echo $admin['userid']; ?>"></input>
                        </div>

                        <button type="submit" name="btnsub" class="btn btn-primary">Thêm</button>
                    </form>
                </div>


            </div>
        </div>
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