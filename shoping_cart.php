<?php
include './admin/connect.php';

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>

<?php
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
if (isset($_GET["action"])) {
    function update_cart($add = false)
    {
        foreach ($_POST["quantity"] as $proid => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION["cart"][$proid]);
            } else {
                if ($add) {
                    $_SESSION["cart"][$proid] += $quantity;
                } else {
                    $_SESSION["cart"][$proid] = $quantity;
                }
            }
        }
    }
    switch ($_GET["action"]) {
        case "add":
            update_cart(true);
            header('location: ./shoping_cart.php');
            break;
        case "delete":
            if (isset($_GET["proid"])) {
                unset($_SESSION["cart"][$_GET["proid"]]);
                header('location: ./shoping_cart.php');
            }
            break;
        case "submit":
            if (isset($_POST['update_click'])) {
                update_cart();
            } elseif (isset($_POST['order_click'])) {
                if (!empty($_POST['quantity'])) {
                    $insertorder = mysqli_query($conn, "INSERT INTO `orders` (`orderid`, `cusname`, `address`, `phone`, `note`, `total_price`, `created_time`) VALUE ('','" . $_POST['cusname'] . "','" . $_POST['cusaddress'] . "','" . $_POST['cusphone'] . "','" . $_POST['cusnote'] . "','" . $_POST['total_price'] . "','" . time() . "')");
                    $orderid = $conn->insert_id;
                    $orderProduct = array();
                    $product = mysqli_query($conn, "SELECT * FROM products WHERE proid IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
                    $insertString = "";
                    while($row = mysqli_fetch_array($product)){
                        $orderProduct[] = $row;
                    }
                    foreach($orderProduct as $key => $product){
                        $insertString .= "(NULL, '".$orderid."', '".$product['proid']."', '".$_POST['quantity'][$product['proid']]."', '".$product['price']."')";
                        if($key != count($orderProduct)-1){
                            $insertString .= ", ";
                        }
                    }
                    $insertorder_detail = mysqli_query($conn, "INSERT INTO `order_detail` (`id`, `orderid`, `proid`, `quantity`, `price`) VALUES ".$insertString."");
                    if ($insertorder && $insertorder_detail) {
                        unset($_SESSION['cart']);
                        echo '<script> alert("Đặt hàng thành công"); 
                        window.location = "index.php";
                        </script>';
                    } else
                        echo '<script> alert("Đặt hàng thất bại"); 
                    window.location = "shoping_cart.php";
                    </script>';
                }
            }
            break;
    }
}
if (!empty($_SESSION["cart"])) {
    $product = mysqli_query($conn, "SELECT * FROM products WHERE proid IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
}

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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">

    <title>Giỏ hàng của bạn</title>
    <link rel="icon" type="image/png" href="./assets/img/icons/favicon.ico" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- header -->
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
                                            <li><a href="./index.php">Trang chủ</a></li>
                                            <li><a href="./dangxuat.php">Đăng xuất</a></li>
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
                            <li><a href="./index.php">Trang chủ</a></li>
                            <li class="active"><a href="./shoping_cart.php">Giỏ hàng</a></li>
                            <!-- <li><a href="#">Liên hệ</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <!-- <li><a href="#"><i class="fa fa-shopping-bag" data-toggle="modal" data-target="#myModal"></i> <span>3</span></a></li> -->
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
    <section style="padding-bottom: 0;" class="hero">
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
    <hr>

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <form class="container" method="post" action="shoping_cart.php?action=submit">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($product)) {
                                    $total = 0;
                                    while ($cart = mysqli_fetch_array($product)) {
                                ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img style="width: 80px;" src="./assets/img/product/<?= $cart['image']; ?>" alt="" />
                                                <h5><?= $cart['proname']; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?= number_format($cart['price'], 0, ".", "."); ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input name="quantity[<?= $cart['proid'] ?>]" type="text" value="<?= $_SESSION["cart"][$cart["proid"]] ?>">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <?= number_format($cart['price'] * $_SESSION["cart"][$cart['proid']], 0, ".", "."); ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="shoping_cart.php?action=delete&proid=<?= $cart["proid"] ?>"><span class="icon_close"></span></a>
                                            </td>
                                        </tr>
                                <?php
                                        $total += $cart['price'] * $_SESSION["cart"][$cart['proid']];
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./index.php" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        <button style="border: none;" type="submit" name="update_click" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Cập nhật giỏ hàng</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class=" shoping__discount">
                            <h5>Thông tin đặt hàng</h5>

                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Người nhận hàng<span>*</span></p>
                                                <input type="text" name="cusname" placeholder="" class="checkout__input__add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Địa chỉ<span>*</span></p>
                                        <input type="text" name="cusaddress" placeholder="" class="checkout__input__add">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Số điện thoại<span>*</span></p>
                                                <input type="text" name="cusphone" placeholder="" class="checkout__input__add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Ghi chú<span>*</span></p>
                                        <input type="text" name="cusnote" placeholder="" class="checkout__input__add">
                                        <input class="form-control" name="total_price" type="hidden" value="<?php echo $total; ?>"></input>

                                    </div>
                                    <div class="">
                                        <!-- <button type="submit" class="site-btn" >Đặt hàng</button> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout checkout__order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                        <?php
                        if (!empty($product)) {
                            while ($cart = mysqli_fetch_array($product)) {
                        ?>
                                <ul>
                                    <li><?= $cart['proname'] ?> <span><?= number_format($cart['price'] * $_SESSION["cart"][$cart['proid']], 0, ".", ".") ?></span></li>
                                </ul>
                        <?php }
                        }
                        ?>
                        <!-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> -->
                        <hr>
                        <div class="checkout__order__total">Tổng thanh toán <span><?php if (!empty($total)) {
                                                                                        echo number_format($total, 0, ".", ".");
                                                                                    } ?>đ</span></div>
                        <!-- <input class="form-control" name="total_price" type="hidden" value="<?php //$total; 
                                                                                                    ?>"></input> -->

                        <button type="submit" name="order_click" class="site-btn">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Shoping Cart Section End -->
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