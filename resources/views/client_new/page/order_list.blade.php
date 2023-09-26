@extends('client_new.share.masterpage')
@section('content')
<div class="container mt-4" id="order_list">
    <div class="row">
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
                            <div class="table-responsive">
                                <table
                                    class="table table-hover">
                                    <thead>
                                        <th
                                            class="text-center align-middle text-bg-danger">#</th>
                                        <th
                                            class="text-center align-middle text-bg-danger">Số
                                            Ghế</th>
                                        <th
                                            class="text-center align-middle text-bg-danger">Tên
                                            Phim</th>
                                        <th
                                            class="text-center align-middle text-bg-danger">Giá
                                            Tiền</th>

                                    </thead>
                                    <tbody>
                                        <template
                                            v-for="(value, key) in listTicket">
                                            <tr class="fadeIn">
                                                <th
                                                    class="text-center align-middle text-white th-css"
                                                    style="transition: 1s linear;">@{{key+1}}</th>
                                                <th
                                                    class="text-center align-middle text-white th-css"
                                                    style="transition: 1s linear;">@{{value.so_ghe}}</th>
                                                <th
                                                    class="text-center align-middle text-white th-css"
                                                    style="transition: 1s linear;">@{{value.ten_phim}}</th>
                                                <th
                                                    class="text-center align-middle text-white th-css"
                                                    style="transition: 1s linear;">@{{formatCurrency(value.gia_ve)}}</th>
                                            </tr>
                                        </template>

                                        <tr>
                                            <th
                                                class="text-center align-middle text-danger th-css"
                                                colspan="3">TỔNG
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
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/JS_Client/order_list.js"></script>r
@endsection
