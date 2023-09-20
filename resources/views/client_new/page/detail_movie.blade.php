@extends('client_new.share.masterpage')
@section('content')
<!-- Shop Detail Section -->

<div id="movie_detail">
    <section class="shop-detail-section" style="padding-top: 70px">
        <div class="auto-container">
            <!-- Upper Box -->
            <div class="upper-box">
                <div class="row clearfix">
                    <!-- Gallery Column -->
                    <div class="gallery-column col-md-4">
                        <div class="inner-column">
                            <div class="col-md-12 d-flex">
                                <img
                                    v-bind:src="dataMovie.hinh_anh"
                                    alt class="img-thumbnail"
                                    width="350px;">
                            </div>
                        </div>
                    </div>
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h3><b style="font-size: 2.5rem; font-weight: 500;"><b
                                        class="text-success">@{{
                                        getFirst(dataMovie.ten_phim) }} </b>
                                    <b class="text-danger">@{{
                                        getWords(dataMovie.ten_phim) }}</b> </b></h3>

                            <div class="d-flex flex-wrap mt-4">
                                <!-- Model -->
                                <!-- Select Size -->
                                <div class="select-size-box clearfix">
                                    <div class="select-box"><input type="radio"
                                            disabled
                                            name="payment-group"
                                            id="radio-two"><label
                                            for="radio-two"
                                            style="background-color: #557a7b !important; color: #fff;">4k
                                            -
                                            hdr</label></div>
                                    <div class="select-box"><input type="radio"
                                            disabled
                                            name="payment-group"
                                            id="radio-one"><label
                                            for="radio-one">t18</label></div>

                                </div>
                                <div>
                                    <h5><span class="text-danger ms-2">@{{
                                            dataMovie.the_loai
                                            }}</span></h5>
                                </div>
                                <div class="d-flex align-middle mt-1 ms-3">
                                    <i
                                        class="fa-solid fa-calendar text-success mt-1 me-2"
                                        style="font-size:1.1rem"></i>
                                    <b class="text-success"
                                        style="font-size:1.1rem">2023</b>
                                </div>
                            </div>
                            <!-- Price -->

                            <div class="text mt-2"
                                style="color: #000; font-size: 1.1rem;">@{{
                                dataMovie.mo_ta }}</div>
                            <div class="d-flex flex-wrap">
                                <!-- Model -->
                                <div class="model">
                                    <span class="model-title text-danger"><b>Đạo
                                            Diễn: </b> </span>
                                </div>
                                <!-- Select Size -->
                                <div class="model">
                                    <span class="model-title text-success"><b>@{{
                                            dataMovie.dao_dien }}</b></span>
                                </div>

                            </div>
                            <div class="d-flex flex-wrap">
                                <!-- Model -->
                                <div class="model">
                                    <span class="model-title text-danger"><b>Diễn
                                            Viên: </b></span>
                                </div>
                                <!-- Select Size -->
                                <div class="model">
                                    <span class="model-title text-success"><b>@{{
                                            dataMovie.dien_vien }}</b></span>
                                </div>

                            </div>
                            <div class="d-flex flex-wrap">
                                <!-- Model -->
                                <div class="model">
                                    <span class="model-title text-danger"><b>Ngôn
                                            Ngữ: </b></span>
                                </div>
                                <!-- Select Size -->
                                <div class="model">
                                    <span class="model-title text-success"><b>@{{
                                            dataMovie.ngon_ngu }}</b></span>
                                </div>

                            </div>

                            <!-- Categories -->

                            <div
                                class="d-flex align-items-center flex-wrap mt-2">

                                <!-- Button Box -->
                                <div class="button-box">
                                    <a href="shop.html"
                                        class="theme-btn btn-style-one button-primary"
                                        style>
                                        <b>Trailer</b>
                                    </a>
                                </div>
                                <div class="button-box">
                                    <a data-bs-toggle="modal"
                                        data-bs-target="#ticketModal"
                                        class="theme-btn btn-style-one button-secondary"
                                        style>
                                        <b>Đặt Vé Ngay</b>
                                    </a>
                                </div>

                                <!-- Quantity Box -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Upper Box -->

        </div>
    </section>
    <!-- End Shop Page Section -->
    <!-- Products Section Six -->
    <section class="products-section-six">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <h4><strong style="font-size: 2rem;"><b class="text-success">PHIM</b><b
                            class="text-danger">
                            SẮP
                            CHIẾU</b></strong></h4>
            </div>
            <div class="row clearfix">

                <!-- Shop Item Two -->
                <div class="shop-item col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="shop-detail.html">
                                <div style>
                                    <img
                                        src="https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/vuemdayyeuPOSTER-01.jpg"
                                        alt style="object-fit: cover;" />
                                </div>
                            </a>
                            <div class="cart-box text-center mb-1">
                                <a class="cart" href="#">Trailer</a>
                                <a class="cart" href="#">Đặt vé </a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h6><a href="shop-detail.html"><b>PHIM ĐIỆN ẢNH
                                        DORAEMON: NOBITA VÀ
                                        VÙNG
                                        ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI</b></a></h6>
                        </div>
                    </div>
                </div>
                <div class="shop-item col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="shop-detail.html">
                                <div style>
                                    <img
                                        src="https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/vuemdayyeuPOSTER-01.jpg"
                                        alt style="object-fit: cover;" />
                                </div>
                            </a>
                            <div class="cart-box text-center mb-1">
                                <a class="cart" href="#">Trailer</a>
                                <a class="cart" href="#">Đặt vé </a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h6><a href="shop-detail.html"><b>PHIM ĐIỆN ẢNH
                                        DORAEMON: NOBITA VÀ
                                        VÙNG
                                        ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI</b></a></h6>
                        </div>
                    </div>
                </div>
                <div class="shop-item col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="shop-detail.html">
                                <div style>
                                    <img
                                        src="https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/vuemdayyeuPOSTER-01.jpg"
                                        alt style="object-fit: cover;" />
                                </div>
                            </a>
                            <div class="cart-box text-center mb-1">
                                <a class="cart" href="#">Trailer</a>
                                <a class="cart" href="#">Đặt vé </a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h6><a href="shop-detail.html"><b>PHIM ĐIỆN ẢNH
                                        DORAEMON: NOBITA VÀ
                                        VÙNG
                                        ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI</b></a></h6>
                        </div>
                    </div>
                </div>
                <div class="shop-item col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="shop-detail.html">
                                <div style>
                                    <img
                                        src="https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/vuemdayyeuPOSTER-01.jpg"
                                        alt style="object-fit: cover;" />
                                </div>
                            </a>
                            <div class="cart-box text-center mb-1">
                                <a class="cart" href="#">Trailer</a>
                                <a class="cart" href="#">Đặt vé </a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h6><a href="shop-detail.html"><b>PHIM ĐIỆN ẢNH
                                        DORAEMON: NOBITA VÀ
                                        VÙNG
                                        ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI</b></a></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="ticketModal" tabindex="-1"
        aria-labelledby aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b
                            class=" text-danger">LỊCH CHIẾU CỦA PHIM </b> <b
                            class="text-warning">QUÝ
                            CÔNG TỬ</b></h1>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding-bottom: 20px;">
                    <template v-if="dateTime.length == 0">
                        <b class="text-success">PHIM HIỆN CHƯA CÓ LỊCH CHIẾU</b>
                    </template>
                    <template v-for="(v,k) in dateTime">
                        <template v-if="(k) == v.check">
                            <h6><b class="text-success">Ngày : @{{ v.ngay_chieu
                                    }}</b></h6>
                            <template v-for="(v1, k1)  in dateTime">
                                <template v-if="v.check == v1.check">
                                    <a
                                        v-bind:href="generateHref(v1.id_lich_chieu)"
                                        class="btn btn-danger me-2 mt-2">@{{
                                        v1.gio_chieu }}</a>
                                </template>
                            </template>
                            <hr>
                        </template>
                    </template>

                </div>
            </div>
        </div>
    </div>
    <!-- End Products Section Six -->

</div>

@endsection
@section('js')
<script src="/JS_Client/detailsMovie.js"></script>
@endsection
