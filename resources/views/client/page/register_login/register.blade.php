<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Đăng ký - Auroraphtgrp Cinema</title>
        <meta name="description" content="Morden Bootstrap HTML5 Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/assets_admin/images/favicon-32x32.png"
            type="image/png" />
        <!-- ======= All CSS Plugins here ======== -->
        <link rel="stylesheet"
            href="asstes_client_login_regis/css/plugins/swiper-bundle.min.css">
        <link rel="stylesheet"
            href="asstes_client_login_regis/css/plugins/glightbox.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js"
            integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Plugin css -->
        <link rel="stylesheet"
            href="asstes_client_login_regis/css/vendor/bootstrap.min.css">

        <!-- Custom Style CSS -->
        <link rel="stylesheet" href="asstes_client_login_regis/css/style.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>
        <main class="main__content_wrapper" id="register">
            <!-- Start login section  -->
            <div class="login__section section--padding">
                <div class="container">
                    <div class="login__section--inner">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="account__login register">
                                    <div class="logo d-flex mb-4"> <img
                                            src="/assets_admin/images/logo-icon.png"
                                            style="width: 200px;"
                                            class="m-auto" alt="logo icon"></div>
                                    <div class="account__login--header mb-25">
                                        <h2
                                            class="account__login--header__title mb-10"
                                            style="color: #3e888b;"><b
                                                style="font-weight: 600;">Tạo
                                                Tài Khoản</b></h2>
                                        <p class="account__login--header__desc">Tạo
                                            Tài Khoản Tại Đây Để Trở Thành Thành
                                            Viên</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                            <input class="account__login--input"
                                                v-model="tt_new.ho_va_ten"
                                                placeholder="Họ Và Tên"
                                                type="text">
                                        </label>
                                        <label>
                                            <input class="account__login--input"
                                                v-model="tt_new.ngay_sinh"
                                                placeholder="Ngày Sinh"
                                                type="date">
                                        </label>
                                        <label>
                                            <input class="account__login--input"
                                                v-model="tt_new.dia_chi"
                                                placeholder="Địa Chỉ"
                                                type="text">
                                        </label>
                                        <label>
                                            <input class="account__login--input"
                                                v-model="tt_new.email"
                                                placeholder="Địa Chỉ Mail"
                                                type="email">
                                        </label>
                                        <label>
                                            <input class="account__login--input"
                                                v-model="tt_new.password"
                                                placeholder="Password"
                                                type="password">
                                        </label>
                                        <!-- <label>
                                            <input class="account__login--input"
                                                placeholder="Nhập lại mật khẩu"
                                                type="password">
                                        </label> -->
                                        <label>
                                            <input class="account__login--input"
                                                v-model="tt_new.so_dien_thoai"
                                                placeholder="Số điện thoại"
                                                type="password">
                                        </label>
                                        <button
                                            class="account__login--btn primary__btn mb-10"
                                            v-on:click="themTaiKhoan()">Đăng
                                            Ký</button>
                                        <p class="account__login--signup__text">Đã
                                            có tài khoản ? <a href="/login"
                                                type="button"><b
                                                    class="text-danger">Đăng
                                                    nhập ngay</b></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End login section  -->

            <!-- Start shipping section -->

            <!-- End shipping section -->

        </main>

        <!-- Scroll top bar -->
        <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg"
                class="ionicon" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="48"
                    d="M112 244l144-144 144 144M256 120v292" />
            </svg></button>

        <!-- All Script JS Plugins here  -->
        <script src="asstes_client_login_regis/js/vendor/popper.js"
            defer="defer"></script>
        <script src="asstes_client_login_regis/js/vendor/bootstrap.min.js"
            defer="defer"></script>
        <script src="asstes_client_login_regis/js/plugins/swiper-bundle.min.js"></script>
        <script src="asstes_client_login_regis/js/plugins/glightbox.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Customscript js -->
        <script src="asstes_client_login_regis/js/script.js"></script>
        <script src="/JS_Client/register.js"></script>
    </body>

</html>
