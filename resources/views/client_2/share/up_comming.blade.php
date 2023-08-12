<section class="ucm-area ucm-bg2" data-background="/client_assets/img/bg/ucm_bg02.jpg">
    <div class="container">
        <div class="row align-items-end mb-55">
            <div class="col-lg-6">
                <div class="section-title title-style-three text-start text-lg-left">
                    <span class="sub-title">Phim Hot</span>
                    <h2 class="text-white">PHIM SẮP CHIẾU</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ucm-nav-wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tvShow" role="tabpanel" aria-labelledby="tvShow-tab">
                <div class="ucm-active-two owl-carousel">
                    @foreach ($phimSapChieu as $key => $value)
                        <div class="movie-item movie-item-two mb-30" style="height: 420px;">
                            <div class="row">
                                <div class="movie-poster">
                                    <a href="/movie-detail/{{ $value->slug_phim }}"><img class="img-thumbnail"
                                            src="{{ $value->hinh_anh }}" style="width: 200px; height:250px;"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="movie-content" style="height: 70px;">
                                <h5 class="title"><a
                                        href="/movie-detail/{{ $value->slug_phim }}">{{ $value->ten_phim }}</a></h5>
                                <span class="rel">{{ $value->the_loai }}</span>
                            </div>
                            <div class="movie-content-bottom">
                                <a class="btn btn-danger mt-2"
                                    href="/movie-detail/{{ $value->slug_phim }}"><b>Details</b></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
