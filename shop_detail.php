<?php
include 'admin/connect.php';
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/product-detail.css" type="text/css">


    <title>Chi tiết sản phẩm</title>
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
                                <img style="width: 20px;" src="./assets/img/language.png" alt="">
                                <div>Vietnam</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Vietnam</a></li>
                                    <!-- <li><a href="#">English</a></li> -->
                                </ul>
                            </div>
                            <!-- Đăng nhập đăng xuất -->
                            <div class="header__top__right__auth">
                                <?php if (isset($user['email'])) { ?>
                                    <div class="header__top__right__language">
                                        <div class="fa fa-user header__navbar-item header__navbar-item--bold"> <?php echo $user['username']; ?></div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="index.php">Trang chủ</a></li>
                                            <li><a href="dangxuat.php">Đăng xuất</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img style="width:150px; height:50px;" src="./assets/img/Fruit.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li class="active"><a href="#">Chi tiết sản phẩm</a></li>
                            <!-- <li><a href="#">Liên hệ</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag" data-toggle="modal" data-target="#myModal"></i> <span>3</span></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- end header -->
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <!-- <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            <li><a href="#">Rau củ</a></li>
                            <li><a href="#">Trái cây</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <!-- <div class="hero__search__categories">
                                    Danh mục
                                    <span class="arrow_carrot-down"></span>
                                </div> -->
                                <input type="text" placeholder="Bạn cần gì?">
                                <button type="submit" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0398.725.802</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <div class="container">
        <?php
        //ket noi csdl
        require_once './admin/connect.php';
        $proid = $_GET['proid'];
        //lenh select
        $select = "SELECT * FROM products where proid = $proid order by proid";

        //thuc thi
        $result = mysqli_query($conn, $select);
        $product = mysqli_fetch_assoc($result);
        ?>
        <!-- Product Details Section Begin -->
        <section style="padding-top: 0px;" class="product-details spad">
            <form class="container" method="POST" action="./shoping_cart.php?action=add">
                <div class="row">
                    <input type="hidden" name="proid" id="proid" value="<?php echo $product['proid']; ?>">
                    <input type="hidden" name="proname" id="proname" value="<?php echo $product['proname']; ?>">
                    <input type="hidden" name="price" id="price" value="<?php echo $product['price']; ?>">
                    <input type="hidden" name="image" id="image" value="<?php echo $product['image']; ?>">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large" src="./assets/img/product/<?php echo $product['image']; ?>" alt="">
                            </div>
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-imgbigurl="./assets/img/product/<?php echo $product['image']; ?>" src="./assets/img/product/<?php echo $product['image']; ?>" alt="">
                                <img data-imgbigurl="./assets/img/product/<?php echo $product['image']; ?>" src="./assets/img/product/<?php echo $product['image']; ?>" alt="">
                                <img data-imgbigurl="./assets/img/product/<?php echo $product['image']; ?>" src="./assets/img/product/<?php echo $product['image']; ?>" alt="">
                                <img data-imgbigurl="./assets/img/product/<?php echo $product['image']; ?>" src="./assets/img/product/<?php echo $product['image']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3><?php echo $product['proname']; ?></h3>
                            <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(20 lượt đánh giá)</span>
                            </div>
                            <div class="product__details__price"><?php echo number_format($product['price'], 0, ".", "."); ?></div>
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo <strong>Uy tín</strong>!</p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity[<?= $product['proid'] ?>]" value="1">
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($_SESSION['user'])){?>
                            <button style="border: none;" class="primary-btn action" type="submit">THÊM VÀO GIỎ HÀNG </button>
                            <?php }else{?>
                                <button style="border: none;" class="primary-btn action" type="button"><a href="./login.php">THÊM VÀO GIỎ HÀNG</a> </button>
                                <?php }?>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            <ul>
                                <li><b>Có sãn:</b> <span>Tại cửa hàng.</span></li>
                                <li><b>Giao hàng:</b> <span>Giao hàng trong 01 ngày. <samp>Miễn phí</samp></span></li>
                                <li><b>Trọng lượng:</b> <span>1 kg</span></li>
                                <li><b>Chia sẻ với</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Đánh giá <span></span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <!-- <h6>Description</h6>
                                        <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                            Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                            suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                            vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                            Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                            accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                            pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                            elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                            et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                            vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                            ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                            elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                            porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                            nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                            Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                            porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                            sed sit amet dui. Proin eget tortor risus.</p> -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Products Infomation</h6>
                                        <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                            Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                            Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                            sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                            eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                            sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                            diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                            Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                            Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                            ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                            elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                            porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                            nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Reviews</h6>
                                        <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                            Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                            Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                            sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                            eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                            sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                            diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                            Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                            Proin eget tortor risus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <!-- Footer -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img style="width:160px; height:60px;" src="./assets/img/Fruit.jpg" alt=""></a>
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
    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery-ui.min.js"></script>
    <script src="./assets/js/jquery.slicknav.js"></script>
    <script src="./assets/js/mixitup.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>