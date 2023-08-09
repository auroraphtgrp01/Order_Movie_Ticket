<section class="top-rated-movie tr-movie-bg" data-background="/client_assets/img/bg/tr_movies_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-50">
                    <span class="sub-title">PHIM HAY NHẤT TRONG TUẦN</span>
                    <h2 class="title">TOP PHIM CÓ LƯỢT BÁN CAO NHẤT</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="tr-movie-menu-active text-center">
                    <button class="active" data-filter=".cat-one">Hành Động</button>
                    <button class="" data-filter=".cat-two">Tình Cảm</button>
                    <button class="" data-filter=".cat-three">Trinh Thám</button>
                </div>
            </div>
        </div>
        <div class="row tr-movie-active">
            @foreach ($phimSapChieu as $key => $value)
                @if ($key % 2 == 0)
                    <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                        <div class="movie-item mb-60">
                            <div class="movie-poster">
                                <a href="/movie-detail/{{ $value->slug_phim }}"><img class="img-thumbnail"
                                        style="height: 400px; width: 300px;" src="{{ $value->hinh_anh }}"
                                        alt=""></a>
                            </div>
                            <div class="movie-content">
                                <div class="top">
                                    <h5 class="title"><a href="/">{{ $value->ten_phim }}</a>
                                    </h5>
                                    <span class="date">2023</span>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <li><span class="quality">hd</span></li>
                                        <li>
                                            <span class="duration"><i class="far fa-clock"></i>{{ $value->thoi_luong }}
                                                phút</span>
                                            <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one cat-three">
                        <div class="movie-item mb-60">
                            <div class="movie-poster">
                                <a href="/movie-detail/{{ $value->slug_phim }}"><img class="img-thumbnail"
                                        style="height: 400px; width: 300px;" src="{{ $value->hinh_anh }}"
                                        alt=""></a>
                            </div>
                            <div class="movie-content">
                                <div class="top">
                                    <h5 class="title"><a href="/">{{ $value->ten_phim }}</a>
                                    </h5>
                                    <span class="date">2021</span>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <li><span class="quality">4k</span></li>
                                        <li>
                                            <span class="duration"><i class="far fa-clock"></i>{{ $value->thoi_luong }}
                                                phút</span>
                                            <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>
