<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="/assets_admin/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/assets_admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/assets_admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/assets_admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/assets_admin/css/pace.min.css" rel="stylesheet" />
    <script src="/assets_admin/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/assets_admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets_admin/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="/assets_admin/css/app.css" rel="stylesheet">
    <link href="/assets_admin/css/icons.css" rel="stylesheet">
    <title>Đăng Ký</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">ĐĂNG KÝ</h3>
                                        <p>Đã có tài khoản ? <a href="authentication-signin.html"> Đăng nhập ngay
                                            </a>
                                        </p>
                                    </div>
                                    <div class="d-grid">

                                    </div>
                                    <div class="login-separater text-center mb-4">

                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Họ và tên :</label>
                                                <input type="text" class="form-control" id="ho_va_ten"
                                                    placeholder="Nhập vào họ và tên">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email :</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Nhập vào email">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password: </label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="password" placeholder="Enter Password"> <a
                                                        href="javascript:;" class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="inputEmailAddress" class="form-label">Số điện thoại:</label>
                                                <input type="text" class="form-control" id="so_dien_thoai"
                                                    placeholder="Nhập vào số điện thoại">
                                            </div>
                                            <div class="col-6">
                                                <label for="inputEmailAddress" class="form-label">Ngày sinh :</label>
                                                <input type="date" class="form-control" id="ngay_sinh"
                                                    placeholder="Nhập vào email">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Địa Chỉ :</label>
                                                <input type="text" class="form-control" id="dia_chi"
                                                    placeholder="Nhập vào địa chỉ">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Đồng ý
                                                        với các điều khoản</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class='bx bx-user'></i>Đăng Ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="/assets_admin/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/assets_admin/js/jquery.min.js"></script>
    <script src="/assets_admin/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets_admin/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="/assets_admin/js/app.js"></script>
</body>

</html>
