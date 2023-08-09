<section class="tv-series-area tv-series-bg" data-background="/client_assets/img/bg/tv_series_bg02.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-50">
                    <span class="sub-title"></span>
                    <h2 class="title text-warning">PHIM ĐANG HOT TRONG THÁNG</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <template v-for="(v, k) in listRcm">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="movie-item mb-50">
                        <div class="movie-poster">
                            <a v-bind:href="v.slug_phim"><img v-bind:src="v.hinh_anh" class="img-thumbnail"
                                    style="height: 400px; width: 500px;" alt=""></a>
                        </div>
                        <div class="movie-content">
                            <div class="top text-center">
                                <h5 class="title text-white"><a style="text-decoration: none;"
                                        v-bind:href="v.slug_phim">@{{ v.ten_phim }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </template>


        </div>
    </div>
</section>
