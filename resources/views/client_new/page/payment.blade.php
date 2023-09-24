@extends('client_new.share.masterpage')
@section('content')
<div id="payment">
    <div class="row mt-2">
        <div class="col-md-12 text-center mt-3" style="user-select: none;">
            <div class="container">
                <div class="alert alert-success p-0" role="alert">
                    <h3 style="user-select: none;"><div class="text-danger"
                        style="font-size: 1rem; user-select: none !important; margin-top: 10px;"><marquee behavior="" direction="">Cảm ơn bạn đã
                            tin tưởng lựa chọn dịch vụ của chúng tôi - Vui lòng thanh toán hoá đơn bằng 1 trong 2 cách dưới đây</marquee></div></h3>

                  </div>
            </div>


        </div>
    </div>
    <section class="shoping-cart-section" style="padding: 10px 0">

    <div class="auto-container">
    <div class="row clearfix">
        <div class="total-column col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                   <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="100%"
                                class="bg-success text-center align-middle">
                                <h5 class="text-white"><b>ĐƠN HÀNG</b></h5>
                            </th>
                        </tr>
                    </thead>
                   </table>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                               <div class="col-md-8">
                                <div class="col-md-12 mb-1">
                                    <div class="col-md-12 mb-1">
                                        <b>TÊN PHIM: </b> <b class="text-danger">@{{dataMovie.ten_phim}}</b>
                                    </div>
                                    <b>NGÀY CHIẾU: </b> <b class="text-danger">@{{formatDate(dataMovie.gio_bat_dau)}}</b>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <b>GIỜ BẮT ĐẦU: </b> <b class="text-danger">@{{formatTime(dataMovie.gio_bat_dau)}}</b>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <b>GIỜ KẾT THÚC </b> <b class="text-danger">@{{formatTime(dataMovie.gio_ket_thuc)}}</b>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <b>RẠP:</b> <b class="text-danger">AURORAPHTGRP CINEMA</b>
                                </div>
                               </div>
                               <div class="col-md-4">
                                <img v-bind:src="dataMovie.hinh_anh" class="img-thumbnail" style="height: 150px; width: 350px; object-fit: cover;" alt="">
                               </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="text-center align-middle text-bg-danger">#</th>
                                            <th class="text-center align-middle text-bg-danger">SỐ GHẾ</th>
                                            <th class="text-center align-middle text-bg-danger">GIÁ TIỀN</th>
                                        </thead>
                                        <tbody>
                                            <template v-for="(v,k) in dataCart">
                                                <tr class="fadeIn">
                                                    <th class="text-center align-middle text-danger"  style="transition: 1s linear;">@{{k+1}}</th>
                                                    <th class="text-center align-middle"  style="transition: 1s linear;">@{{v.so_ghe}}</th>
                                                    <th class="text-center align-middle"  style="transition: 1s linear;">@{{formatCurrency(v.gia_ve)}}</th>
                                                </tr>
                                            </template>
                                            <tr>
                                                <th class="text-center align-middle text-danger" colspan="2">TỔNG TIỀN</th>
                                                <th class="text-center align-middle text-danger">@{{formatCurrency(total)}}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-md-12 mt-2">
                                        <button class="btn btn-success mt-2" v-on:click="checkPaid()"><b>XÁC NHẬN ĐÃ THANH
                                                TOÁN</b></button>
                                        <a href="/" class="btn btn-danger mt-2" data-bs-dismiss="modal"
                                            aria-label="Close"
                                            style><b>HUỶ BỎ</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-column col-lg-8 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div
                        class="">
                        <div class="card-body">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="inner-column">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <th colspan="100%" class="bg-success text-center align-middle">
                                                                        <h5 class="text-white"><b>PHƯƠNG THỨC THANH TOÁN</b></h5>
                                                                    </th>
                                                                </thead>
                                                            </table>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h6 class="text-center"><b class="text-success"
                                                                            style="user-select: none !important">THÔNG TIN CHUYỂN
                                                                            KHOẢN</b></h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-12 text-start">
                                                                            <h7 class><b class="text-danger"
                                                                                    style="user-select: none !important">SỐ TÀI KHOẢN:</b></h7>
                                                                            <b
                                                                                class="text-primary">5040109082003</b>
                                                                            <br>
                                                                            <h7 class><b class="text-danger"
                                                                                    style="user-select: none !important">CHỦ TÀI KHOẢN:</b></h7>
                                                                            <b
                                                                                class="text-primary">HUYNH HUY HOANG</b>
                                                                            <br>
                                                                            <h7 class><b class="text-danger"
                                                                                    style="user-select: none !important">NGÂN HÀNG:</b></h7>
                                                                            <b class="text-primary">MBBANK</b> <br>
                                                                            <h7 class><b class="text-danger"
                                                                                style="user-select: none !important">NỘI DUNG CHUYỂN KHOẢN:</b></h7> <br>
                                                                        <b class="text-primary">@{{paymentInfo.hashCode}}</b>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 mt-2">
                                                                <div class="card">
                                                                    <div class="card-body  text-center">
                                                                        <h7 v-if="(checkPayment == 1)" class="text-center"style="user-select: none !important" ><b class="text-primary">ĐANG CHỜ XÁC
                                                                                NHẬN . . . @{{countDown}} giây</b></h7>
                                                                       <div v-if="(checkPayment==2)">
                                                                         <h7 class="text-center"><b class="text-success"
                                                                                style="user-select: none !important">THANH TOÁN THÀNH
                                                                                CÔNG !</b></h7> <br>
                                                                        <h7 class="text-center" style="font-size: 0.8rem;"><b
                                                                                class="text-primary" style="user-select: none !important">THÔNG
                                                                                TIN CHI
                                                                                TIẾT SẼ ĐƯỢC GỬI QUA EMAIL CỦA BẠN</b></h7>
                                                                   </div>
                                                                        <h7 v-if="(checkPayment == 0)" class="text-center" style="font-size: 1rem;"><b
                                                                                class="text-danger" style="user-select: none !important">VUI LÒNG BẤM VÀO XÁC NHẬN ĐÃ THANH TOÁN SAU KHI THANH TOÁN ĐỂ HỆ THỐNG KIỂM TRA</b></h7>
                                                                        <h7 v-if="(checkPayment == -1)" class="text-center" style="font-size: 1rem;"><b
                                                                                class="text-danger" style="user-select: none !important"> <b> THANH TOÁN CHƯA ĐƯỢC THỰC HIỆN HOẶC CÓ LỖI <br> TRONG QUÁ TRÌNH XÁC THỰC - VUI LÒNG LIÊN HỆ NHÀ PHÁT TRIỂN ĐỂ GIẢI QUYẾT</b></b></h7>
                                                                                <h7 v-if="(checkPayment == -2)" class="text-center" style="font-size: 1rem;"><b
                                                                                    class="text-primary" style="user-select: none !important"> <span> ĐƠN HÀNG CHƯA ĐƯỢC THANH TOÁN <br> BẠN ĐÃ THANH TOÁN KHÔNG ĐỦ SỐ TIỀN CỦA ĐƠN HÀNG <br> VUI LÒNG LIÊN HỆ NHÀ PHÁT TRIỄN ĐỂ GIẢI QUYẾT
                                                                                        <br> SỐ TIỀN TỔNG ĐƠN HÀNG: <b class="text-danger"> @{{formatCurrency(total)}}</b>
                                                                                        <br> SỐ TIỀN ĐÃ THANH TOÁN:   <b class="text-danger">@{{formatCurrency(amountMoney)}}</b>
                                                                                        <br> SỐ TIỀN THIẾU CÒN LẠI:  <b class="text-danger">@{{formatCurrency(total-amountMoney)}}</b>

                                                                                    </span></b></h7>
                                                                                    <!-- <h7 v-if="(checkPayment == -10)" class="text-center" style="font-size: 1rem;"><b
                                                                                        class="text-success" style="user-select: none !important">ĐƠN HÀNG ĐÃ ĐƯỢC THANH TOÁN THÀNH CÔNG !!!</b></h7> -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <img v-bind:src="qrpay" style="width: 500px; height: 300px;"
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
    <div class="modal fade" data-bs-backdrop='static' id="payModal" tabindex="-1"
    aria-labelledby aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header d-flex">
        <h1 class="modal-title fs-4 m-auto" id="exampleModalLabel"><b
                class=" text-danger" style="user-select: none;">THANH TOÁN VÉ XEM PHIM
            </b> </h1>
    </div>
    <div class="modal-body" style="padding-bottom: 20px;">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="inner-column">
                <div class="row">
                    <div class="col-md-12 text-center mb-3" style="user-select: none;">
                        <h4 style="user-select: none;"><div class="text-primary"
                                style="font-size: 1rem; user-select: none !important;">Cảm ơn bạn đã
                                tin tưởng lựa chọn dịch vụ của chúng tôi</div></h4>
                        <h4 style="user-select: none;"><div class="text-danger"
                                style="font-size: 1rem; user-select: none !important;">Vui lòng hoàn
                                thành việc thanh toán bằng 2 cách dưới đây </div></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center" style="user-select: none !important;"><b
                                            class="text-success">CHI TIẾT ĐƠN HÀNG</b></h6>
                                    <hr style="margin-top: 0.5rem;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"
                                            style="user-select: none !important">
                                            <thead>
                                                <th class="text-center align-middle">#</th>
                                                <th class="text-center align-middle">SỐ GHẾ</th>
                                                <th class="text-center align-middle">GIÁ TIỀN</th>
                                            </thead>
                                            <tbody>
                                                <div>@{{hang_doc}}</div>
                                                <template v-for="(v,k) in listCartPayment">
                                                    <tr class="fadeIn">
                                                        <th class="text-center align-middle text-danger">@{{k+1}}</th>
                                                        <th class="text-center align-middle">@{{v.so_ghe}}</th>
                                                        <th class="text-center align-middle">@{{formatCurrency(v.gia_ve)}}</th>
                                                    </tr>
                                                </template>
                                                <tr>
                                                    <th class="text-center align-middle" colspan="2">TỔNG TIỀN</th>
                                                    <th class="text-center align-middle text-danger">100.000đ</th>
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
                                <h6 class="text-center align-middle mb-2"
                                    style="user-select: none !important"><b class="text-success">THANH
                                        TOÁN</b></h6>
                                <hr>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-center"><b class="text-success"
                                                    style="user-select: none !important">THÔNG TIN CHUYỂN
                                                    KHOẢN</b></h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 text-start">
                                                    <h7 class><b class="text-danger"
                                                            style="user-select: none !important">SỐ TÀI KHOẢN:</b></h7>
                                                    <b
                                                        class="text-primary">5040109082003</b>
                                                    <br>
                                                    <h7 class><b class="text-danger"
                                                            style="user-select: none !important">CHỦ TÀI KHOẢN:</b></h7>
                                                    <b
                                                        class="text-primary">HUYNH HUY HOANG</b>
                                                    <br>
                                                    <h7 class><b class="text-danger"
                                                            style="user-select: none !important">NGÂN HÀNG:</b></h7>
                                                    <b class="text-primary">MB BANK</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button class="btn btn-success mt-2 w-100"><b>XÁC NHẬN ĐÃ THANH
                                                TOÁN</b></button>
                                        <button class="btn btn-danger mt-2 w-100" data-bs-dismiss="modal"
                                            aria-label="Close"
                                            style><b>HUỶ BỎ</b></button>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="card">
                                            <div class="card-body  text-start">
                                                <!-- <h7 class="text-center"style="user-select: none !important" ><b class="text-warning">ĐANG CHỜ XÁC
                                                        NHẬN . . .</b></h7> <br> -->
                                                <h7 class="text-center"><b class="text-success"
                                                        style="user-select: none !important">THANH TOÁN THÀNH
                                                        CÔNG ! </b></h7> <br>
                                                <h7 class="text-center" style="font-size: 0.8rem;"><b
                                                        class="text-primary" style="user-select: none !important">THÔNG
                                                        TIN CHI
                                                        TIẾT SẼ ĐƯỢC GỬI QUA EMAIL CỦA BẠN</b></h7>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="/images/qrpay.png" style="width: 300px;"
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
<script src="/JS_Client/payment.js"></script>
@endsection
