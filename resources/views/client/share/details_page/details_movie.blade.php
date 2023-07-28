<section class="movie-details-area" style="height: 150%" data-background="/client_assets/img/bg/movie_details_bg.jpg">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-xl-3 col-lg-4">
                <div class="movie-details-img">
                    <img v-bind:src="dataMovie.hinh_anh" class="img-thumbnail" style="width: 350px;" alt="">
                    <a href="https://www.youtube.com/watch?v=R2gbPxeNk2E" class="popup-video"><img
                            src="/client_assets/img/images/play_icon.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8">
                <div class="movie-details-content">
                    <h2 class="text-danger fs-1">@{{ dataMovie.ten_phim_dau }}<span> @{{ dataMovie.ten_phim_cuoi }}</span></h2>
                    <div class="banner-meta">
                        <ul>
                            <li class="quality">
                                <span>T18</span>
                                <span>4K</span>
                            </li>
                            <li class="category">
                                <b class="text-white">@{{ dataMovie.the_loai }}</b>
                            </li>
                            <li class="release-time">
                                <span><i class="far fa-calendar-alt"></i>2023</span>
                                <span><i class="far fa-clock"></i>@{{ dataMovie.thoi_luong }} min</span>
                            </li>
                        </ul>
                    </div>
                    <p>@{{ dataMovie.mo_ta }}</p>
                    <div class="movie-details-prime">
                        <ul style="max-width: 550px;">
                            <li class="share"><a style="text-decoration: none;" href="#"><i
                                        class="fas fa-share-alt"></i><b>Share</b></a>
                            </li>
                            <li class="btn btn-danger">
                                <a href="" class="btn popup-video">
                                    <i class="text-white fa-solid fa-cart-plus"></i>
                                    <b class="text-white">Đặt Vé Ngay</b>
                                </a>
                            </li>
                            <li class="btn btn-success ms-4"><a href="https://www.youtube.com/watch?v=R2gbPxeNk2E"
                                    class="btn popup-video"><i class="fas fa-play text-white"></i> <b
                                        class="text-white">Trailer</b></a></li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
