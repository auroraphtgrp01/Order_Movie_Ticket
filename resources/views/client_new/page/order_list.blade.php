@extends('client_new.share.masterpage')
@section('content')
<div class="container mt-4" id="order_list">
    <div class="row">
        <h2 class="text-danger text-center"><b>LỊCH SỬ ĐƠN HÀNG ĐÃ GIAO DỊCH TẠI
                AURORAPHTGRP
                CINEMA</b></h2>
    </div>
    <div class="row mt-3">
        <div class="col-md-7 text-white d-flex">
            <div class="card flex-fill" style="border: 3px #ff5e62 solid;">
                <div class="card-body" style="background-color: #0e1317;">
                    <div> <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class>
                                            <th
                                                class="text-center align-middle text-white text-bg-danger">
                                                #
                                            </th>
                                            <th
                                                class="text-center align-middle text-white text-bg-danger">
                                                Mã Đơn Hàng
                                            </th>
                                            <th
                                                class="text-center align-middle text-white text-bg-danger">
                                                Ngày Đặt Vé
                                            </th>
                                            <th
                                                class="text-center align-middle text-white text-bg-danger">
                                                Tổng Tiền
                                            </th>
                                            <th
                                                class="text-center align-middle text-white text-bg-danger">
                                                Tình Trạng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template
                                            v-for="(value, key) in listOrder">
                                            <tr class="table-hover-res"
                                                v-on:click="loadTicket(value)">
                                                <th
                                                    class="text-center align-middle text-white th-css">
                                                    @{{key+1}}
                                                </th>
                                                <th
                                                    class="text-center align-middle text-white th-css">
                                                    @{{value.ma_don_hang}}
                                                </th>
                                                <th
                                                    class="text-center align-middle text-white th-css">
                                                    @{{formatDate(value.created_at)}}
                                                </th>
                                                <th
                                                    class="text-center align-middle text-white th-css">
                                                    @{{formatCurrency(value.tong_tien)}}
                                                </th>
                                                <th
                                                    class="text-center align-middle text-white th-css">
                                                    <b
                                                        v-if="value.is_thanh_toan == 1"
                                                        class="text-success">
                                                        Đã Thanh Toán
                                                    </b>
                                                    <b
                                                        v-else
                                                        class="text-danger">
                                                        Chưa Thanh Toán
                                                    </b>
                                                </th>
                                            </tr>
                                        </template>

                                    </tbody>
                                </table>

                            </div>
                        </div></div>
                </div>
            </div>

        </div>
        <div class="col-md-5 d-flex">
            <div class="card flex-fill" style="border: 3px #ff5e62 solid;">
                <div class="card-body"
                    style="background-color: #0e1317;">
                    <div class>
                        <div class="row">
                            <div v-if="nameMovie == 0" class="d-flex">
                                <div class="text-center mt-3 m-auto">
                                    <img
                                        src="/assets_client/images/logo_xxl.png"
                                        alt style="transform: scale(1.2);">
                                    <h3 class="mt-4"><b class="text-danger">
                                            Vui Lòng Chọn Đơn Hàng
                                        </b></h3>
                                </div>
                            </div>
                            <div v-else class="table-responsive">
                                <table
                                    class="table table-bordered">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                class="text-center align-middle text-bg-danger">Tên
                                                Phim</th>
                                            <th
                                                class="text-center align-middle text-white">@{{nameMovie}}</th>

                                        </tr>
                                        <tr>
                                            <th
                                                class="text-center align-middle text-bg-danger"
                                                style="width: 20%;">Số
                                                Ghế</th>
                                            <th
                                                class="text-center align-middle text-white text-wrap"
                                                style="max-width: 100px;">@{{listChair}}</th>

                                        </tr>

                                        <tr>
                                            <th
                                                class="text-center align-middle text-bg-danger">Giá
                                                Tiền</th>
                                            <th
                                                class="text-center align-middle text-white">@{{formatCurrency(total)}}</th>

                                        </tr>
                                        <tr>
                                            <th colspan="2"
                                                class="text-center align-middle text-white"><button
                                                    class="btn btn-danger w-100"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><b>Chi
                                                        Tiết Đơn Hàng</b></button></th>

                                        </tr>

                                    </tbody>
                                </table>
                                <div class="text-center mt-4 m-auto">
                                    <img
                                        src="/assets_client/images/logo_xxl.png"
                                        alt style="transform: scale(1.2);">
                                    <h3 class="mt-4"><b class="text-danger">
                                            AURORAPHTGRP CINEMA
                                        </b></h3>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg"
                                    style="border: 3px #ff5e62 solid; border-radius: 10px;">
                                    <div class="modal-content"
                                        style="background-color: #0e1317; user-select: none !important;">
                                        <div class="modal-header"
                                            style="border-bottom: 3px #ff5e62 solid;">
                                            <h1
                                                class="modal-title fs-5 text-danger text-center"
                                                id="exampleModalLabel"
                                                style="user-select: none !important;"><b>
                                                    CHI TIẾT ĐƠN HÀNG
                                                </b></h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card flex-fill"
                                                style="border: 3px #ff5e62 solid;">
                                                <div class="card-body"
                                                    style="background-color: #0e1317;">
                                                    <div class>
                                                        <div class="row">
                                                            <div
                                                                class="table-responsive">
                                                                <table
                                                                    class="table table-hover">
                                                                    <thead>
                                                                        <th
                                                                            class="text-center align-middle text-bg-danger"
                                                                            style="user-select: none !important;">#</th>
                                                                        <th
                                                                            class="text-center align-middle text-bg-danger"
                                                                            style="user-select: none !important;">Số
                                                                            Ghế</th>
                                                                        <th
                                                                            class="text-center align-middle text-bg-danger"
                                                                            style="user-select: none !important;">Tên
                                                                            Phim</th>
                                                                        <th
                                                                            class="text-center align-middle text-bg-danger"
                                                                            style="user-select: none !important;">Giá
                                                                            Tiền</th>

                                                                    </thead>
                                                                    <tbody>
                                                                        <template
                                                                            v-for="(value, key) in listTicket">
                                                                            <tr
                                                                                class="fadeIn">
                                                                                <th
                                                                                    class="text-center align-middle text-white th-css"
                                                                                    style="transition: 1s linear;user-select: none !important;">@{{key+1}}</th>
                                                                                <th
                                                                                    class="text-center align-middle text-white th-css"
                                                                                    style="transition: 1s linear;user-select: none !important;">@{{value.so_ghe}}</th>
                                                                                <th
                                                                                    class="text-center align-middle text-white th-css"
                                                                                    style="transition: 1s linear;user-select: none !important;">@{{value.ma_ve}}</th>
                                                                                <th
                                                                                    class="text-center align-middle text-white th-css"
                                                                                    style="transition: 1s linear;user-select: none !important;">@{{formatCurrency(value.gia_ve)}}</th>
                                                                            </tr>
                                                                        </template>

                                                                        <tr>
                                                                            <th
                                                                                class="text-center align-middle text-danger th-css"
                                                                                colspan="3"
                                                                                style="user-select: none !important;">TỔNG
                                                                                TIỀN</th>
                                                                            <th
                                                                                class="text-center align-middle text-danger"
                                                                                style="user-select: none !important;">@{{formatCurrency(total)}}</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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
</div>

<!-- Modal -->

@endsection
@section('js')
<script src="/JS_Client/order_list.js"></script>
@endsection
