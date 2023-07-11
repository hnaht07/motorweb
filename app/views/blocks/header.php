<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>MotorOnlShop</title>
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="<?php echo _WEB_ROOT ?>/public/assets/clients/images/motor.ico" type="image/x-icon">
    <!--=== All Plugins CSS ===-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/plugins.css" rel="stylesheet">
    <!--=== All Vendor CSS ===-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/vendor.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/style.css" rel="stylesheet">
    <!--=== Admin Style CSS ===-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/upImages.css" rel="stylesheet">
    <!-- Modernizer JS -->
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/modernizr-2.8.3.min.js"></script>


</head>

<body>
    <!-- Start Header Area -->
    <header class="header-area">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top theme-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Welcome to MotorShop</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-end">
                                    <li class="user-hover">
                                        Xin Chào
                                    </li>
                                    <li class="language">
                                        <i class="fa fa-star" aria-hidden="true"></i> Thành
                                        <ul class="dropdown-list">
                                            <li> <a> <i class="fa fa-star" aria-hidden="true"></i> Tài Khoản</a></li>
                                            <li> <a> <i class="fa fa-star" aria-hidden="true"></i> Đăng Xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">
                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?php echo _WEB_ROOT ?>/home">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/images/logo/logomotor.png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->
                        <!-- main menu area start -->
                        <div class="col-lg-8 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="active"><a href="<?php echo _WEB_ROOT ?>/home">Home</i></a></li>
                                            <li><a href="danh-sach-san-pham">shop</i></a></li>
                                            <li><a href="#">Blog</i></a></li><!--Sửa-->
                                            <li><a href="#">Contact us</a></li><!--Sửa-->
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-2">
                            <div class="header-configure-wrapper">
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li>
                                            <a href="#" class="offcanvas-btn">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="ion-bag"></i>
                                                <div class="notification">2</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->
                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="home">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/clients/images/logo/logomotor.png" alt="Brand Logo">
                                </a>
                            </div>
                            <!-- Sửa Logo -->
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="#">
                                        <i class="ion-bag"></i>
                                    </a>
                                </div>
                                <div class="mobile-menu-btn">
                                    <div class="off-canvas-btn">
                                        <i class="ion-navicon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Tìm Kiếm...">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="<?php echo _WEB_ROOT ?>/home">Trang Chủ</a></li>
                            <li class="menu-item-has-children "><a href="#">Shop</a></li>
                            <li class="menu-item-has-children "><a href="#">Blog</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- user setting option start -->
                <div class="mobile-settings">
                    <ul class="mobile-menu">
                        <li>
                            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Thành</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ Hàng</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
                <!-- user setting option end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0933029627</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">dauthanh7321@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="https://www.facebook.com/dau.hnaht07"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->