<section class="ucm-area ucm-bg" data-background="/client_assets/img/bg/ucm_bg1.png">
    <div class="container">
        <div class="row align-items-end mb-55">
            <div class="col-lg-6" style="z-index: 1;">
                <div class="section-title text-start text-lg-left">
                    <span class="sub-title">PHIM ĐANG HOT</span>
                    <h2 class="title">PHIM ĐANG CHIẾU</h2>
                </div>
            </div>
            <div class="col-lg-6" style="z-index: 1;">
                <div class="ucm-nav-wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tvShow-tab" data-toggle="tab" href="#tvShow" role="tab"
                                aria-controls="tvShow" aria-selected="true">Movie Mới</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tvShow" role="Ftabpanel" aria-labelledby="tvShow-tab">
                <div class="ucm-active owl-carousel">
                    @foreach ($phimSapChieu as $key => $value)
                        <div class="movie-item mb-50">
                            <div class="movie-poster">
                                <a href="/movie-detail/{{ $value->slug_phim }}">
                                    <img class="img-thumbnail" style="width: 300px; height: 400px;"
                                        src="{{ $value->hinh_anh }}" alt="">
                                </a>
                            </div>
                            <div class="movie-content">
                                <div class="top">
                                    <h5 class="title"><a
                                            href="/movie-detail/{{ $value->slug_phim }}">{{ $value->ten_phim }}</a>
                                    </h5>
                                    <span class="date">2021</span>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <li><span class="quality">hd</span></li>
                                        <li>
                                            <span class="duration"><i class="far fa-clock"></i> 128 min</span>
                                            <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    {{-- <template v-for="(v, k) in list_Movie">
                        <div class="movie-item mb-50">
                            <div class="movie-poster">
                                <a href="movie-details.html">
                                    <img class="img-thumbnail" style="width: 300px; height: 400px;"
                                        v-bind:src="v.hinh_anh" alt="">
                                </a>
                            </div>
                            <div class="movie-content">
                                <div class="top">
                                    <h5 class="title"><a href="movie-details.html">@{{ v.ten_phim }}</a></h5>
                                    <span class="date">2021</span>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <li><span class="quality">hd</span></li>
                                        <li>
                                            <span class="duration"><i class="far fa-clock"></i> 128 min</span>
                                            <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </template> --}}
                </div>
            </div>
        </div>
    </div>
</section>
