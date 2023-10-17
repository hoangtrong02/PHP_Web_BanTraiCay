<?php
include 'admin/connect.php';
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Fruit, fresh, vegetable, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fresh fruit</title>
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header -->
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
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <!-- Đăng nhập đăng xuất -->
                            <div class="header__top__right__auth">
                                <?php if (isset($user['email'])) { ?>
                                    <div class="header__top__right__language">
                                        <div class="fa fa-user header__navbar-item header__navbar-item--bold"> <?php echo $user['username']; ?></div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="./admin/quanlysanpham.php">Bán hàng</a></li>
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
                                        </ul>
                                    </div>
                                <?php } ?>
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
                            <li class="active"><a href="./index.php">Trang chủ</a></li>
                            <li><a href="#">Cửa hàng</a></li>
                            <li><a href="./shoping_cart.php">Giỏ hàng</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>20</span></a></li>
                            <li><a href="./shoping_cart.php"><i class="fa fa-shopping-bag" data-toggle="" data-target=""></i> <!--<span></span>--></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>

        <!-- Modal cart -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <?php if (isset($user['email'])) { ?>
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" style="margin: 0 178px;"><b>Giỏ hàng</b></h5> -->
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="shoping__cart__table" action="/cart/cart.php" method="post" enctype="multipart/form-data">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product" style="text-align: center; font-size: 17px;">Sản phẩm</th>
                                            <th style="text-align: center; font-size: 17px;">Đơn giá</th>
                                            <th style="text-align: center; font-size: 17px;">Số lượng</th>
                                            <th style="text-align: center; font-size: 17px;">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //ket noi csdl
                                        require_once 'admin/connect.php';

                                        $userid = $user['userid'];

                                        //lenh select
                                        $select = "SELECT * FROM carts c inner join products p on c.proid=p.proid where c.userid = $userid order by c.userid";

                                        //thuc thi
                                        $result = mysqli_query($conn, $select);

                                        //duyet result
                                        while ($cart = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td class="shoping__cart__item" style="width: 200px;">
                                                    <img style="width: 40px;" src="./assets/img/product/<?php echo $cart['image']; ?>" alt="" />
                                                    <h5 style="font-size: 15px;"><?php echo $cart['proname']; ?></h5>
                                                </td>
                                                <td class="shoping__cart__price" style="text-align: center; font-size: 15px;">
                                                    <?php echo number_format($cart['price'], 0, ".", "."); ?>
                                                </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div style="text-align: center; font-size: 15px;">
                                                            <?php echo $cart['quantity']; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total" style="text-align: center; font-size: 15px;">
                                                    <?php echo number_format($cart['price'] * $cart['quantity'], 0, ".", "."); ?>
                                                </td>
                                                <!-- <td class="shoping__cart__item__close">
                                                    <span class="icon_close"></span>
                                                </td> -->
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success" name="btnsub"><a href="shoping_cart.php"> Mua ngay</a></button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                </div>
            <?php } else { ?>
                <p style="text-align: center; margin: 0 auto;">Giỏ hàng trống</p>
            <?php } ?>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            <li><a href="#">Rau củ</a></li>
                            <li><a href="#">Trái cây</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Danh mục
                                    <span class="arrow_carrot-down"></span>
                                </div>
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
                    <div class="hero__item set-bg" data-setbg="./assets/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>Trái cây tươi</span>
                            <h2>Trái cây <br />100% tươi</h2>
                            <p>Nhận và giao hàng miễn phí có sẵn</p>
                            <a href="#" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Giảm giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                        <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($product = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="./assets/img/product/<?=$product["image"]?>">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="shop_detail.php?produc_detail&proid=<?php echo $product['proid']; ?>"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="shop_detail.php?produc_detail&proid=<?php echo $product['proid']; ?>"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="shop_detail.php?produc_detail&proid=<?php echo $product['proid']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <!-- <span>Dried Fruit</span> -->
                                        <h5><a href="shop_detail.php?produc_detail&proid=<?php echo $product['proid']; ?>"><?=$product["proname"]?></a></h5>
                                        <div class="product__item__price"><?=$product["price"]?><sup>đ</sup> <span><?=$product["price"]?><sup>đ</sup></span></div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            <li data-filter=".oranges">Cam</li>

                            <li data-filter=".vegetables">Rau củ</li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter">
                <?php
                //ket noi csdl
                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                //lenh select
                $select = "SELECT * FROM products order by proid";

                //thuc thi
                $result = mysqli_query($conn, $select);

                //duyet result
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges vegetables">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="./assets/img/product/<?php echo $r['image']; ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="shop_detail.php?produc_detail&proid=<?php echo $r['proid']; ?>"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="shop_detail.php?produc_detail&proid=<?php echo $r['proid']; ?>"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="shop_detail.php?produc_detail&proid=<?php echo $r['proid']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop_detail.php?produc_detail&proid=<?php echo $r['proid']; ?>"><b><?php echo $r['proname']; ?></b></a></h6>
                                <h6><a href="shop_detail.php?produc_detail&proid=<?php echo $r['proid']; ?>"><?php echo number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></a></h6>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <!-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="./assets/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="./assets/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products where proid < 12 order by proid";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($product = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img  src="./assets/img/product/<?php echo $product['image']; ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $product['proname']; ?></h6>
                                            <span><?php echo number_format($product['price'], 0, ".", "."); ?><sup>d</sup></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products where proid < 12 order by proid";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="./assets/img/product/<?php echo $r['image']; ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $r['proname']; ?></h6>
                                            <span><?php echo number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm nổi bật</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products where proid < 12 order by proid";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="./assets/img/product/<?php echo $r['image']; ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $r['proname']; ?></h6>
                                            <span><?php echo number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products where proid < 12 order by proid";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="./assets/img/product/<?php echo $r['image']; ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $r['proname']; ?></h6>
                                            <span><?php echo number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Đánh giá sản phẩm</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products where proid < 12 order by proid";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="./assets/img/product/<?php echo $r['image']; ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $r['proname']; ?></h6>
                                            <span><?php echo number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                //ket noi csdl
                                $conn = mysqli_connect("localhost", "root", "", "baitaplonphp");
                                //lenh select
                                $select = "SELECT * FROM products where proid < 12 order by proid";

                                //thuc thi
                                $result = mysqli_query($conn, $select);

                                //duyet result
                                while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="./assets/img/product/<?php echo $r['image']; ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $r['proname']; ?></h6>
                                            <span><?php echo number_format($r['price'], 0, ".", "."); ?><sup>đ</sup></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="./assets/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> 22/12/2022</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Mẹo nấu ăn giúp việc nấu ăn trở nên đơn giản</a></h5>
                            <p>Nhưng vì thời thế không phải lúc nào cũng thuận lợi </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="./assets/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> 22/12/2022</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 cách chuẩn bị bữa sáng cho 30</a></h5>
                            <p>Nhưng vì thời thế không phải lúc nào cũng thuận lợi, anh ấy tìm kiếm điều gì đó tuyệt vời bằng sự chăm chỉ và đau đớn </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="./assets/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> 22/12/2022</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Tham quan trang trại sạch ở Việt nam</a></h5>
                            <p>Tham quan trang trại sạch ở Việt nam </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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
                                Mẫu này được làm
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