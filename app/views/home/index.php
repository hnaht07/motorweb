<?php

?>
<!-- main wrapper start -->
<main>
    <!-- hero slider section start -->
    <section class="hero-slider">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                        <!-- single slider item start -->
                        <div class="hero-single-slide">
                            <div class="hero-slider-item bg-img" data-bg="public/assets/clients/images/slider/slider_1.png">

                            </div>
                        </div>
                        <!-- single slider item end -->

                        <!-- single slider item start -->
                        <div class="hero-single-slide">
                            <div class="hero-slider-item bg-img" data-bg="public/assets/clients/images/slider/slider_2.jpg">

                            </div>
                        </div>
                        <!-- single slider item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero slider section end -->

    <!-- service features start -->
    <section class="service-policy-area">
        <div class="container">
            <div class="row">
                <!-- single policy item start -->
                <div class="col-lg-4">
                    <div class="service-policy-item mt-30 bg-1">
                        <div class="policy-icon">
                            <img src="public/assets/clients/images/icon/policy-1.png" alt="policy icon">
                        </div>
                        <div class="policy-content">
                            <h5 class="policy-title">Vận Chuyển Miễn Phí</h5>
                            <p class="policy-desc">Áp dụng cho mọi đơn đặt hàng của bạn!</p>
                        </div>
                    </div>
                </div>
                <!-- single policy item start -->

                <!-- single policy item start -->
                <div class="col-lg-4">
                    <div class="service-policy-item mt-30 bg-2">
                        <div class="policy-icon">
                            <img src="public/assets/clients/images/icon/policy-2.png" alt="policy icon">
                        </div>
                        <div class="policy-content">
                            <h5 class="policy-title">Hỗ Trợ Trực Tuyến</h5>
                            <p class="policy-desc">Luôn luôn sẵn sàng hỗ trợ bạn 24/7!</p>
                        </div>
                    </div>
                </div>
                <!-- single policy item start -->

                <!-- single policy item start -->
                <div class="col-lg-4">
                    <div class="service-policy-item mt-30 bg-3">
                        <div class="policy-icon">
                            <img src="public/assets/clients/images/icon/policy-3.png" alt="policy icon">
                        </div>
                        <div class="policy-content">
                            <h5 class="policy-title">Chính Sách Hoàn Tiền</h5>
                            <p class="policy-desc">Sẵn sàng hoàn trả lại cho trong vòng 5 ngày!</p>
                        </div>
                    </div>
                </div>
                <!-- single policy item start -->
            </div>
        </div>
    </section>
    <!-- service features end -->

    <!-- our product area start -->
    <section class="our-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">Sản Phẩm Của Chúng Tôi</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                        <!-- product single item start -->
                        <?php
                        foreach ($data['dataShow'] as $key => $value) {
                        ?>
                            <div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="<?php echo _WEB_ROOT.$value['product_Img'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="product-details.html"><?php echo $value['product_Name'] ?></a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular"><?php echo $value['product_downPrice'] ?></span>
                                        <span class="price-old"><del><?php echo $value['product_Price'] ?></del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Add To Cart"><i class="ion-bag"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" title="Quick View"><i class="ion-ios-eye-outline"></i></span> </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- product single item start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our product area end -->

    <!-- banner statistic area start -->
    
    <!-- banner statistic area end -->

    <!-- top seller area start -->

    <!-- top seller area end -->

    <!-- latest blog area start -->
    <section class="latest-blog-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">our blog</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-15">
                        <!-- blog single item start -->
                        <div class="blog-post-item">
                            <div class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="public/assets/clients/images/blog/blog-1.jpg" alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h5 class="blog-title">
                                    <a href="blog-details.html">
                                        Celebrity Daughter Opens About to Having Her Eye color
                                    </a>
                                </h5>
                                <ul class="blog-meta">
                                    <li><span>By: </span>Admin,</li>
                                    <li><span>On: </span>14.07.2029</li>
                                </ul>
                                <a href="blog-details.html" class="read-more">Read More...</a>
                            </div>
                        </div>
                        <!-- blog single item start -->

                        <!-- blog single item start -->
                        <div class="blog-post-item">
                            <div class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="public/assets/clients/images/blog/blog-2.jpg" alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h5 class="blog-title">
                                    <a href="blog-details.html">
                                        Sotto Winner Offering Money To Any Man That Will Date Her
                                    </a>
                                </h5>
                                <ul class="blog-meta">
                                    <li><span>By: </span>Admin,</li>
                                    <li><span>On: </span>14.07.2029</li>
                                </ul>
                                <a href="blog-details.html" class="read-more">Read More...</a>
                            </div>
                        </div>
                        <!-- blog single item start -->

                        <!-- blog single item start -->
                        <div class="blog-post-item">
                            <div class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="public/assets/clients/images/blog/blog-3.jpg" alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h5 class="blog-title">
                                    <a href="blog-details.html">
                                        Children Left Home Alone For 4 Days In TV Series Experiment
                                    </a>
                                </h5>
                                <ul class="blog-meta">
                                    <li><span>By: </span>Admin,</li>
                                    <li><span>On: </span>14.07.2029</li>
                                </ul>
                                <a href="blog-details.html" class="read-more">Read More...</a>
                            </div>
                        </div>
                        <!-- blog single item start -->

                        <!-- blog single item start -->
                        <div class="blog-post-item">
                            <div class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="public/assets/clients/images/blog/blog-2.jpg" alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h5 class="blog-title">
                                    <a href="blog-details.html">
                                        People Are Willing Lie When To Comes Money Research from
                                    </a>
                                </h5>
                                <ul class="blog-meta">
                                    <li><span>By: </span>Admin,</li>
                                    <li><span>On: </span>14.07.2029</li>
                                </ul>
                                <a href="blog-details.html" class="read-more">Read More...</a>
                            </div>
                        </div>
                        <!-- blog single item start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog area end -->

    <!-- brand area start -->
    <div class="brand-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-active-carousel">
                        <div class="brand-item">
                            <a href="#">
                                <img src="public/assets/clients/images/brand/honda_logo.png" alt="brand image">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="public/assets/clients/images/brand/suzuki_logo.png" alt="brand image">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="public/assets/clients/images/brand/yamaha_logo.png" alt="brand image">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->
</main>
<!-- main wrapper end -->

<!-- Quick view modal start -->
<div class="modal" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-large-slider mb-20">
                                <div class="pro-large-img img-zoom">
                                    <img src="public/assets/clients/images/product/product-details-img1.jpg" alt="product thumb" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="public/assets/clients/images/product/product-details-img2.jpg" alt="product thumb" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="public/assets/clients/images/product/product-details-img3.jpg" alt="product thumb" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="public/assets/clients/images/product/product-details-img4.jpg" alt="product thumb" />
                                </div>
                            </div>
                            <div class="pro-nav slick-row-5">
                                <div class="pro-nav-thumb"><img src="public/assets/clients/images/product/product-details-img1.jpg" alt="" /></div>
                                <div class="pro-nav-thumb"><img src="public/assets/clients/images/product/product-details-img2.jpg" alt="" /></div>
                                <div class="pro-nav-thumb"><img src="public/assets/clients/images/product/product-details-img3.jpg" alt="" /></div>
                                <div class="pro-nav-thumb"><img src="public/assets/clients/images/product/product-details-img4.jpg" alt="" /></div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-details-des">
                                <h3 class="pro-det-title">Primitive Mens Premium Shoes</h3>
                                <div class="pro-review">
                                    <span><a href="#">1 Review(s)</a></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$70.00</span>
                                    <span class="old-price"><del>$80.00</del></span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                <div class="quantity-cart-box d-flex align-items-center mb-20">
                                    <div class="quantity">
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>
                                    <a href="cart.html" class="btn btn-default">Add To Cart</a>
                                </div>
                                <div class="availability mb-20">
                                    <h5 class="cat-title">Availability:</h5>
                                    <span>In Stock</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details inner end -->
            </div>
        </div>
    </div>
</div>
<!-- Quick view modal end -->