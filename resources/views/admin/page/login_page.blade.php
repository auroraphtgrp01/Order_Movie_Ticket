<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="description" content="Auroraphtgrp Cinema">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/assets_admin/images/favicon-32x32.png"
            type="image/png" />
        <link rel="stylesheet"
            href="/asstes_client_login_regis/css/plugins/swiper-bundle.min.css">
        <link rel="stylesheet"
            href="/asstes_client_login_regis/css/plugins/glightbox.min.css">
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
        <link rel="stylesheet"
            href="/asstes_client_login_regis/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/asstes_client_login_regis/css/style.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap"
            rel="stylesheet">
    </head>
    <body>
        <main class="main__content_wrapper" id="login">
            <div class="login__section section--padding">
                <div class="container">
                    <div class="login__section--inner">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="account__login">
                                    <div class="logo d-flex mb-2"> <img
                                            src="/assets_admin/images/logo-icon.png"
                                            style="width: 200px;"
                                            class="m-auto" alt="logo icon"></div>
                                    <div class="account__login--header mb-25">
                                        <h2
                                            class="account__login--header__title mb-10 text-center"
                                            style="color: #557A7B;"><b
                                                style="font-weight: 700;">Đăng
                                                Nhập Vào Admin Control Panel</b></h2>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                            <input v-model="dang_nhap.email"
                                                class="account__login--input"
                                                placeholder="Email Addres"
                                                type="email">
                                        </label>
                                        <label>
                                            <input v-on:keyup.enter="login()"
                                                v-model="dang_nhap.password"
                                                class="account__login--input"
                                                placeholder="Password"
                                                type="password">
                                        </label>

                                        <button v-on:click="login()"
                                            class="account__login--btn primary__btn">Login</button>

                                        <div class="account__login--divide">

                                        </div>
                                        <div
                                            class="account__social d-flex justify-content-center mb-15">
                                        </div>
                                        <p
                                            class="account__log--signup__text text-center">
                                            <b class="text-danger">Quên mật khẩu
                                                ? <br>
                                            </b>
                                            <b style="color: #557A7B"> Liên
                                                hệ với
                                                admin
                                                để được hỗ trợ !</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="/asstes_client_login_regis/js/vendor/popper.js"
            defer="defer"></script>
        <script src="/asstes_client_login_regis/js/vendor/bootstrap.min.js"
            defer="defer"></script>
        <script src="/asstes_client_login_regis/js/plugins/swiper-bundle.min.js"></script>
        <script src="/asstes_client_login_regis/js/plugins/glightbox.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/asstes_client_login_regis/js/script.js"></script>
    </body>
    <script>
        new Vue({
            el: "#login",
            data: {
                dang_nhap: {},
            },
            created() {},
            methods: {
                login() {
                    console.log('11111');

                    axios
                        .post("/api/admin/login", this.dang_nhap)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, "Success");
                                setTimeout(() => {
                                    window.location.href = "/admin";
                                }, 500);
                            } else {
                                toastr.error(res.data.message, "Error");
                            }
                        })
                        .catch((res) => {
                            $.each(
                                res.response.data.errors,
                                function (k, v) {
                                    toastr.error(v[0]);
                                }
                            );
                        });
                },
            },
        });
    </script>
</html>
