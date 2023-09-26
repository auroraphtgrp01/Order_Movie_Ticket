<header class="main-header" id="headerNav"
    style="box-shadow: 0px 2px 3px rgba(255, 255, 255, 0.05);">

    <!-- Header Lower -->
    <div class="header-lower">
        <input hidden type="text" v-model="check" id="hiddenCheck">
        <div class="auto-container">
            <div
                class="inner-container d-flex justify-content-between align-items-center">

                <div class="logo-box d-flex align-items-center"
                    style="margin-left: -50px;">
                    <!-- Logo -->
                    <div class="logo ms-2">
                        <a href="/" class
                            style="margin-left: 100px;"><img
                                style="width: 130px; transform: scale(1.4);"
                                src="/assets_client/images/logo.png"
                                alt
                                title>
                        </a>
                    </div>
                </div>
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu show navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler"
                                type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div
                            class="navbar-collapse collapse clearfix"
                            id="navbarSupportedContent">
                            <ul class="navigation clearfix"
                                style>
                                <!-- <li class="dropdown"><a href="#">Home</a>
                                <ul>
                                    <li><a href="index.html">Homepage One</a></li>
                                    <li><a href="index-2.html">Homepage Two</a></li>
                                    <li><a href="index-3.html">Homepage Three</a></li>
                                    <li class="dropdown"><a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="index.html">Header Style One</a></li>
                                            <li><a href="index-2.html">Header Style Two</a></li>
                                            <li><a href="index-3.html">Header Style Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
                                <li><a href="/"><b>Trang Chủ</b></a></li>
                                <li><a href="/"><b>Đơn Hàng</b></a></li>
                                <!-- <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shop.html">Our
                                                Products</a></li>
                                        <li><a
                                                href="shop-detail.html">Product
                                                Single</a></li>
                                        <li><a href="cart.html">Shoping
                                                Cart</a></li>
                                        <li><a href="checkout.html">CheckOut</a></li>
                                        <li><a href="register.html">Register</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Our
                                                Blog</a></li>
                                        <li><a
                                                href="blog-detail.html">Blog
                                                Single</a></li>
                                        <li><a href="not-found.html">Not
                                                Found</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact
                                        us</a></li> -->
                            </ul>
                        </div>

                    </nav>
                    <!-- Main Menu End -->
                </div>

                <!-- Outer Box -->
                <div class="outer-box d-flex align-items-center">

                    <!-- Options Box -->
                    <div
                        class="options-box d-flex align-items-center">

                        <!-- Search Box -->
                        <!-- <div class="search-box-outer">
                            <div class="search-box-btn"><span
                                    class="flaticon-search-1"></span></div>
                        </div> -->

                        <!-- User Box -->
                        <!-- <a class="user-box flaticon-user-3"
                            href="contact.html"></a> -->

                        <!-- Like Box -->
                        <!-- <div class="like-box">
                            <a class="user-box flaticon-heart"
                                href="contact.html"></a>
                            <span class="total-like">0</span>
                        </div> -->

                    </div>

                    <!-- Cart Box -->
                    <div v-if="check == false" class="cart-box">
                        <div class="box-inner p-0">
                            <a href="/login"
                                class="btn btn-outline-danger phone p-2"><b
                                    class>Đăng
                                    Nhập</b></a>
                        </div>
                    </div>
                    <div v-else class="cart-box">
                        <div class="box-inner" style="text-transform: none;">
                            <div class
                                style="width: 40px; height: 40px; left: 0; top: 3px; position: absolute;">
                                <img
                                    src="/assets_client/images/avatar.png"
                                    alt="avatar"
                                    style="border-radius: 30px;">
                            </div>
                            <b class style="color: #ED3232;">@{{user.ho_va_ten}}</b><br>
                            <a class="phone text-hover" v-on:click="logOut()"><b>Đăng
                                    Xuất</b></a>
                        </div>
                    </div>

                    <!-- End Cart Box -->
                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span
                            class="icon flaticon-menu"></span></div>
                </div>
                <!-- End Outer Box -->
            </div>

        </div>
    </div>
    <!-- End Header Lower -->
    <!-- Sticky Header  -->
    <div class="sticky-header" style="background-color: #0e1317;">
        <div class="auto-container">
            <div
                class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html" style="margin-left: 100px;"
                        title><img
                            style="width: 130px; transform: scale(1.2);"
                            q
                            src="/assets_client/images/logo-small.png"
                            alt title></a>
                </div>

                <!-- Right Col -->
                <div class="right-box">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                        <div v-if="check == true" class="cart-box">
                            <div class="box-inner" style="text-transform: none;">
                                <div class
                                    style="width: 40px; height: 40px; left: 0; top: 3px; position: absolute;">
                                    <img
                                        src="/assets_client/images/avatar.png"
                                        alt="avatar"
                                        style="border-radius: 30px;">
                                </div>
                                <b class style="color: #ED3232;">Lê Minh Tuấn</b><br>
                                <a class="phone text-hover"
                                    v-on:click="logOut()"><b>Đăng Xuất</b></a>
                            </div>
                        </div>
                    </nav>

                    <!-- Main Menu End-->

                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span
                            class="icon flaticon-menu"></span></div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img
                        src="/assets_client/images/mobile-logo.png"
                        alt title></a></div>
            <!-- Search -->
            <div class="search-box">
                <form method="post" action="contact.html">
                    <div class="form-group">
                        <input type="search" name="search-field"
                            value
                            placeholder="SEARCH HERE" required>
                        <button type="submit"><span
                                class="icon flaticon-search-1"></span></button>
                    </div>
                </form>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>
