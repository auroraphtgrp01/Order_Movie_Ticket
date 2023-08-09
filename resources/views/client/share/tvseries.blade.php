<section class="tv-series-area tv-series-bg" data-background="/client_assets/img/bg/tv_series_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-50">
                    <span class="sub-title">Ngẫu Nhiên</span>
                    <h2 class="title">TOP PHIM ĐƯỢC KHÁN GIẢ YÊU THÍCH NHẤT</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <template v-for="(v, k) in listRcm">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="movie-item mb-50">
                        <div class="movie-poster">
                            <a v-on:click="detailMovie(v)" href="/movie-detail"><img class="img-thumbnail"
                                    style="height: 400px; width: 400px; background-size: cover;" v-bind:src="v.hinh_anh"
                                    alt=""></a>
                        </div>
                        <div class="movie-content">
                            <div class="top">
                                <h5 class="title"><a v-on:click="detailMovie(v)"
                                        href="/movie-detail">@{{ v.ten_phim }}</a>
                                </h5>
                                <span class="date">2023</span>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li><span class="quality">hd</span></li>
                                    <li>
                                        <span class="duration"><i class="far fa-clock"></i>@{{ v.thoi_luong }}
                                            phút</span>
                                        <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </template>


        </div>
    </div>
</section>
