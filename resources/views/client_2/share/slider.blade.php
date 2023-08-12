<section class="slider-area slider-bg" data-background="/client_assets/img/banner/s_slider_bg.png" style="height: 800px;">
    <div class="slider-active">
        @foreach ($phimSapChieu as $key => $value)
            <div class="slider-item">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-0 order-lg-2">
                            <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                data-delay="1s">
                                <img src="{{ $value->hinh_anh }}" style="width: 350px;" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-content">
                                <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s"><b
                                        class="text-danger">CGV CINEMA</b></h6>
                                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">
                                    <div class="text-white">
                                        {{ $value->ten_phim }}
                                    </div>
                                </h2>
                                <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                    <ul>
                                        <li class="quality">
                                            <span>Pg 18</span>
                                            <span>4K</span>
                                        </li>
                                        <li class="category">
                                            <a href="/client_assets/#">{{ $value->the_loai }}</a>
                                        </li>
                                        <li class="release-time">
                                            <span><i class="far fa-calendar-alt"></i>2023</span>
                                            <span><i class="far fa-clock"></i>{{ $value->thoi_luong }} phút</span>
                                        </li>
                                    </ul>
                                </div>
                                <a href="movie-detail/{{ $value->slug_phim }}" class="banner-btn btn btn-danger"
                                    data-animation="fadeInUp" data-delay=".8s"><i class="fas fa-play"></i>Watch Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
