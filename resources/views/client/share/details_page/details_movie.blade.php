<div class="modal fade mt-5 xs" style id="editModal" tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b
                        class="text-danger">LỊCH CHIẾU</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <template v-if="dateTime.length == 0">
                            <b class="text-success">PHIM HIỆN CHƯA CÓ LỊCH CHIẾU</b>
                        </template>
                        <template v-for="(v, k)  in dateTime">
                            <template v-if="(k) == v.check">
                                <h6 class="mt-2"><b>Ngày : @{{ v.ngay_chieu }}
                                    </b></h6>
                                {{-- <div>@{{ v.check }}</div> --}}
                                <template v-for="(v1, k1)  in dateTime">
                                    <template v-if="v.check == v1.check">
                                        <button data-bs-toggle="modal"
                                            v-on:click="tt_lich = v1 ; getVe(v1); hang_doc = 0; hang_ngang = 0"
                                            data-bs-target="#veModal"
                                            class="btn btn-danger me-2">@{{
                                            v1.gio_chieu }}</button>
                                    </template>
                                </template>
                                <hr>
                            </template>
                        </template>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade mt-5 xs" style id="veModal" tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LỊCH CHIẾU CỦA:
                    <b
                        class="text-danger">@{{ tt_lich.ngay_chieu }}</b> - <b
                        class="text-success">@{{ tt_lich.gio_chieu }}</b></h5>
                <button type="button" class="btn-close" data-bs-toggle="modal"
                    data-bs-target="#editModal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div
                            class="card border-primary border-bottom border-3 border-0">
                            <div class="card-body">
                                <template
                                    v-if="hang_doc == 0 && hang_ngang == 0">
                                    <h4 class="text-center"><b
                                            class="text-danger">PHIM HIỆN CHƯA
                                            ĐƯỢC TẠO GHẾ</b></h4>
                                </template>
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th colspan="100%"
                                                class="bg-warning text-center align-middle">
                                                <h5 class=" text-danger"><b>MÀN
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
                                                                            v-on:click="v.choose = 0"
                                                                            class="text-success fa-solid fa-couch fa-2x"></i>
                                                                        <i
                                                                            v-if="v.choose == 0"
                                                                            v-on:click="v.choose = 1"
                                                                            class="fa-solid fa-couch fa-2x"></i>
                                                                    </template>
                                                                    <template
                                                                        v-else>
                                                                        <i
                                                                            class="text-danger fa-solid fa-couch fa-2x"></i>
                                                                    </template>
                                                                    <br>
                                                                    <span>
                                                                        @{{
                                                                        v.so_ghe
                                                                        }} / @{{
                                                                        v.gia_ve
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
                                <div class="text-end"> <button
                                        class="btn btn-danger"
                                        v-on:click="datVe()">Đặt
                                        Vé</button></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="movie-details-area" style="height: 150%"
    data-background="/client_assets/img/bg/movie_details_bg.jpg">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-xl-3 col-lg-4">
                <div class="movie-details-img">
                    <img v-bind:src="dataMovie.hinh_anh" class="img-thumbnail"
                        style="width: 350px;" alt>
                    <a v-bind:href="dataMovie.trailer" class="popup-video"><img
                            src="/client_assets/img/images/play_icon.png" alt></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8">
                <div class="movie-details-content">
                    <h2 class="text-danger fs-1">@{{
                        getFirst(dataMovie.ten_phim) }}<span> @{{
                            getWords(dataMovie.ten_phim) }}</span></h2>
                    <div class="banner-meta">
                        <ul>
                            <li class="quality">
                                <span>T18</span>
                                <span>4K</span>
                            </li>
                            <li class="category">
                                <b class="text-warning">@{{ dataMovie.the_loai
                                    }}</b>
                            </li>
                            <li class="release-time">
                                <span><i class="far fa-calendar-alt"></i>2023</span>
                                <span><i class="far fa-clock"></i>@{{
                                    dataMovie.thoi_luong }} min</span>
                            </li>
                        </ul>
                    </div>
                    <p>@{{ dataMovie.mo_ta }}</p>
                    <div class="text-white mt-2"><b>Đạo Diễn: </b>
                        <b class="text-warning">@{{ dataMovie.dao_dien }}</b>
                    </div>
                    <div class="text-white mt-2"><b>Diễn Viên: </b>
                        <b class="text-warning">@{{ dataMovie.dien_vien }}</b>
                    </div>
                    <div class="text-white mt-2"><b>Ngôn Ngữ: </b>
                        <b class="text-warning">@{{ dataMovie.ngon_ngu }}</b>
                    </div>
                    <div class="movie-details-prime">
                        <ul style="max-width: 550px;">
                            <li class="share"><a style="text-decoration: none;"
                                    href="#"><i
                                        class="fas fa-share-alt"></i><b>Share</b></a>
                            </li>
                            <li class="btn btn-danger">
                                <button href class="btn popup-video"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <i class="text-white fa-solid fa-cart-plus"></i>
                                    <b class="text-white">Đặt Vé
                                        Ngay</b>
                                </button>
                            </li>
                            <li class="btn btn-success ms-4"><a
                                    v-bind:href="dataMovie.trailer"
                                    class="btn popup-video"><i
                                        class="fas fa-play text-white"></i> <b
                                        class="text-white">Trailer</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
