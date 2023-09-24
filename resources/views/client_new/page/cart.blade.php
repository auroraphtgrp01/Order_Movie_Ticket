@extends('client_new.share.masterpage')
@section('content')
<div id="movie_detail">
    <div class="col-md-12"><h3 class="text-center mt-4"><b class="text-danger">ĐẶT
                VÉ
                XEM PHIM</b></h3></div>
    <section class="shoping-cart-section" style="padding: 20px 0">

        <div class="auto-container">
            <div class="row clearfix">
                <div class="cart-column col-lg-8 col-md-12 col-sm-12 flex-fill">
                    <div class="row d-flex">
                        <div class="col-12">
                            <div
                                class="card flex-fill"
                                style="border: 3px #f05053 solid;">
                                <div class="card-body"
                                    style="background-color: #0e1317;">
                                    <template
                                        v-if="hang_doc == 0 && hang_ngang == 0">
                                        <h4 class="text-center"><b
                                                class="text-danger">PHIM HIỆN
                                                CHƯA
                                                ĐƯỢC TẠO GHẾ</b></h4>
                                    </template>
                                    <div class="table-responsive">
                                        <table class="table table-bordered"
                                            id="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="100%"
                                                        class="text-center align-middle"
                                                        style="background-color: #ED3232;">
                                                        <h5 class="text-white"><b>MÀN
                                                                CHIẾU</b></h5>
                                                    </th>
                                                </tr>
                                                <tr style="height: 20px">
                                                    <td colspan="100%"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="i in hang_doc">
                                                    <tr>
                                                        <template
                                                            v-for="j in hang_ngang">
                                                            <th
                                                                class="text-center align-middle">
                                                                <template
                                                                    v-for="(v, k) in veXemPhim">
                                                                    <template
                                                                        v-if="k == ((i - 1) * hang_ngang + j - 1)">
                                                                        <div
                                                                            style="cursor: pointer;">
                                                                            <template
                                                                                v-if="v.tinh_trang == 0">
                                                                                <i
                                                                                    v-if="v.choose == 1"
                                                                                    v-on:click="v.choose = 0;unchooseTicket(v)"
                                                                                    class="text-success fa-solid fa-couch fa-2x"></i>
                                                                                <i
                                                                                    v-if="v.choose == 0"
                                                                                    v-on:click="v.choose = 1;  chooseTicket(v)"
                                                                                    class="fa-solid fa-couch fa-2x text-white"></i>
                                                                            </template>
                                                                            <template
                                                                                v-else>
                                                                                <i
                                                                                    class="text-danger fa-solid fa-couch fa-2x"></i>
                                                                            </template>
                                                                            <br>
                                                                            <span
                                                                                class="text-white">
                                                                                @{{
                                                                                v.so_ghe
                                                                                }}

                                                                            </span>
                                                                        </div>
                                                                    </template>
                                                                </template>
                                                            </th>
                                                        </template>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="total-column col-lg-4 col-md-12 col-sm-12 ">
                    <div class="card flex-fill"
                        style="border: 3px #ff5e62 solid;">
                        <div class="card-body"
                            style="background-color: #0e1317;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="100%"
                                            class="text-center align-middle"
                                            style="background-color: #ED3232;">
                                            <h5 class="text-white"><b>ĐƠN HÀNG</b></h5>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <hr>
                            <div class="card" style="border: 3px #ff5e62 solid;">
                                <div class="card-body"
                                    style="background-color: #0e1317;">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <div class="col-md-12 mb-1">
                                                    <div class="col-md-12 mb-1">
                                                        <b class="text-warning">TÊN
                                                            PHIM: </b> <b
                                                            class="text-white">@{{dataCart.ten_phim}}</b>
                                                    </div>
                                                    <b class="text-warning">NGÀY
                                                        CHIẾU: </b> <b
                                                        class="text-white">@{{formatDate(dataCart.gio_bat_dau)}}</b>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <b class="text-warning">GIỜ
                                                        BẮT ĐẦU: </b> <b
                                                        class="text-white">@{{formatTime(dataCart.gio_bat_dau)}}</b>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <b class="text-warning">GIỜ
                                                        KẾT THÚC </b> <b
                                                        class="text-white">@{{formatTime(dataCart.gio_ket_thuc)}}</b>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <b class="text-warning">RẠP:</b>
                                                    <b
                                                        class="text-white">AURORAPHTGRP
                                                        CINEMA</b>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img
                                                    v-bind:src="dataCart.hinh_anh"
                                                    class="img-thumbnail"
                                                    style="height: 150px; width: 350px; object-fit: cover;"
                                                    alt>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered">
                                                    <thead>
                                                        <th
                                                            class="text-center align-middle text-bg-danger">#</th>
                                                        <th
                                                            class="text-center align-middle text-bg-danger">SỐ
                                                            GHẾ</th>
                                                        <th
                                                            class="text-center align-middle text-bg-danger">GIÁ
                                                            TIỀN</th>
                                                    </thead>
                                                    <tbody>
                                                        <template
                                                            v-for="(v,k) in listCart">
                                                            <tr class="fadeIn">
                                                                <th
                                                                    class="text-center align-middle text-danger"
                                                                    style="transition: 1s linear;">@{{k+1}}</th>
                                                                <th
                                                                    class="text-center align-middle text-white"
                                                                    style="transition: 1s linear;">@{{v.so_ghe}}</th>
                                                                <th
                                                                    class="text-center align-middle text-white"
                                                                    style="transition: 1s linear;">@{{formatCurrency(v.gia_ve)}}</th>
                                                            </tr>
                                                        </template>
                                                        <tr>
                                                            <th
                                                                class="text-center align-middle text-danger"
                                                                colspan="2">TỔNG
                                                                TIỀN</th>
                                                            <th
                                                                class="text-center align-middle text-danger">@{{formatCurrency(total)}}</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-end">
                                                <button
                                                    class="btn btn-success w-100"
                                                    v-on:click="paymentClick()"><b>THANH
                                                        TOÁN</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shoping Cart Section -->

    </div>
    <!-- Scroll To Top -->

    <!-- Button trigger modal -->

    <!-- Modal -->

    <div class="scroll-to-top scroll-to-target" data-target="html"><span
            class="fa fa-arrow-up"></span></div>
    <!-- End Scroll To Top -->
    <div class="modal fade" data-bs-backdrop='static' id="payModal"
        tabindex="-1"
        aria-labelledby aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h1 class="modal-title fs-4 m-auto" id="exampleModalLabel"><b
                            class=" text-danger" style="user-select: none;">THANH
                            TOÁN VÉ XEM PHIM
                        </b> </h1>
                </div>
                <div class="modal-body" style="padding-bottom: 20px;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="row">
                                <div class="col-md-12 text-center mb-3"
                                    style="user-select: none;">
                                    <h4 style="user-select: none;"><div
                                            class="text-primary"
                                            style="font-size: 1rem; user-select: none !important;">Cảm
                                            ơn bạn đã
                                            tin tưởng lựa chọn dịch vụ của chúng
                                            tôi</div></h4>
                                    <h4 style="user-select: none;"><div
                                            class="text-danger"
                                            style="font-size: 1rem; user-select: none !important;">Vui
                                            lòng hoàn
                                            thành việc thanh toán bằng 2 cách
                                            dưới đây </div></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-center"
                                                    style="user-select: none !important;"><b
                                                        class="text-success">CHI
                                                        TIẾT ĐƠN HÀNG</b></h6>
                                                <hr style="margin-top: 0.5rem;">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-bordered"
                                                        style="user-select: none !important">
                                                        <thead>
                                                            <th
                                                                class="text-center align-middle">#</th>
                                                            <th
                                                                class="text-center align-middle">SỐ
                                                                GHẾ</th>
                                                            <th
                                                                class="text-center align-middle">GIÁ
                                                                TIỀN</th>
                                                        </thead>
                                                        <tbody>
                                                            <div>@{{hang_doc}}</div>
                                                            <template
                                                                v-for="(v,k) in listCartPayment">
                                                                <tr
                                                                    class="fadeIn">
                                                                    <th
                                                                        class="text-center align-middle text-danger">@{{k+1}}</th>
                                                                    <th
                                                                        class="text-center align-middle">@{{v.so_ghe}}</th>
                                                                    <th
                                                                        class="text-center align-middle">@{{formatCurrency(v.gia_ve)}}</th>
                                                                </tr>
                                                            </template>
                                                            <tr>
                                                                <th
                                                                    class="text-center align-middle"
                                                                    colspan="2">TỔNG
                                                                    TIỀN</th>
                                                                <th
                                                                    class="text-center align-middle text-danger">100.000đ</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--  -->
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-body text-center row">
                                            <h6
                                                class="text-center align-middle mb-2"
                                                style="user-select: none !important"><b
                                                    class="text-success">THANH
                                                    TOÁN</b></h6>
                                            <hr>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="text-center"><b
                                                                class="text-success"
                                                                style="user-select: none !important">THÔNG
                                                                TIN CHUYỂN
                                                                KHOẢN</b></h6>
                                                        <hr>
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12 text-start">
                                                                <h7 class><b
                                                                        class="text-danger"
                                                                        style="user-select: none !important">SỐ
                                                                        TÀI
                                                                        KHOẢN:</b></h7>
                                                                <b
                                                                    class="text-primary">04172252601</b>
                                                                <br>
                                                                <h7 class><b
                                                                        class="text-danger"
                                                                        style="user-select: none !important">CHỦ
                                                                        TÀI
                                                                        KHOẢN:</b></h7>
                                                                <b
                                                                    class="text-primary">LE
                                                                    MINH TUAN</b>
                                                                <br>
                                                                <h7 class><b
                                                                        class="text-danger"
                                                                        style="user-select: none !important">NGÂN
                                                                        HÀNG:</b></h7>
                                                                <b
                                                                    class="text-primary">TP
                                                                    BANK</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <button
                                                        class="btn btn-success mt-2 w-100"><b>XÁC
                                                            NHẬN ĐÃ THANH
                                                            TOÁN</b></button>
                                                    <button
                                                        class="btn btn-danger mt-2 w-100"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                        style><b>HUỶ BỎ</b></button>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="card">
                                                        <div
                                                            class="card-body  text-start">
                                                            <!-- <h7 class="text-center"style="user-select: none !important" ><b class="text-warning">ĐANG CHỜ XÁC
                                                        NHẬN . . .</b></h7> <br> -->
                                                            <h7
                                                                class="text-center"><b
                                                                    class="text-success"
                                                                    style="user-select: none !important">THANH
                                                                    TOÁN THÀNH
                                                                    CÔNG !</b></h7>
                                                            <br>
                                                            <h7
                                                                class="text-center"
                                                                style="font-size: 0.8rem;"><b
                                                                    class="text-primary"
                                                                    style="user-select: none !important">THÔNG
                                                                    TIN CHI
                                                                    TIẾT SẼ ĐƯỢC
                                                                    GỬI QUA
                                                                    EMAIL CỦA
                                                                    BẠN</b></h7>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="/images/qrpay.png"
                                                    style="width: 300px;"
                                                    class="img-thumbnail" alt>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="/JS_Client/cart.js"></script>
@endsection
