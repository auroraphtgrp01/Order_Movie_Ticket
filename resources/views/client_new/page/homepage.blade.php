@extends('client_new.share.masterpage')
@section('content')

<!-- Sidebar Cart Item -->

<!-- END sidebar widget item -->

<!-- Main Section -->
<section class="main-slider">
    <div class="main-slider-carousel owl-carousel owl-theme">

        <div class="slide">
            <div class="image-layer p-3"
                style="background-image: url(/assets_client/images/main-slider/image-2.png)"></div>
            <div class="auto-container">
                <!-- Content Column -->
                <div class="content-box hover-slider"
                    style="width: 400px;">
                    <img
                        src="https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/i/n/insidious_5_poster_2_1080x1350.jpg"
                        style="width: 400px; height: 500px; position: absolute; z-index: 1; filter: brightness(0.6)"
                        class="res-img"
                        alt>
                    <div class="box-inner" style="height: 500px;">
                        <div class="vector-icon"
                            style="background-image: url(/assets_client/images/main-slider/vector-1.png)"></div>
                        <div class="vector-icon-two"
                            style="background-image: url(/assets_client/images/main-slider/vector-2.png)"></div>
                        <div class="vector-icon-three"
                            style="background-image: url(/assets_client/images/main-slider/vector-3.png)"></div>
                        <div class="title text-white">PHIM HOT 2023</div>
                        <h1 class="text-white" style="z-index: 2;">CỬA
                            ĐỎ <br> VÔ ĐỊNH</h1>
                        <h1 class="text-white"
                            style="z-index: 4; font-size: 0.9rem">
                            Kinh Dị,
                            Kịch Tính</h1>
                        <a href="shop-detail.html"
                            class="shop-now text-white btn btn-success d-flex"
                            style="z-index: 2; width: 150px;"><span
                                class="ms-3">Đặt vé ngay</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="image-layer p-3"
                style="background-image: url(/assets_client/images/main-slider/image-3.png)"></div>
            <div class="auto-container">
                <!-- Content Column -->
                <div class="content-box hover-slider"
                    style="width: 400px;">
                    <img
                        src="https://www.venuscinema.vn/uploaded/phim/ma%20so%20truc%20quy.jpg"
                        style="width: 400px; height: 500px; position: absolute; z-index: 1; filter: brightness(0.6)"
                        class="res-img"
                        alt>
                    <div class="box-inner" style="height: 500px;">
                        <div class="vector-icon"
                            style="background-image: url(/assets_client/images/main-slider/vector-1.png)"></div>
                        <div class="vector-icon-two"
                            style="background-image: url(/assets_client/images/main-slider/vector-2.png)"></div>
                        <div class="vector-icon-three"
                            style="background-image: url(/assets_client/images/main-slider/vector-3.png)"></div>
                        <div class="title text-white">PHIM HOT 2023</div>
                        <h1 class="text-white" style="z-index: 2;">MA
                            SƠ <br> TRỤC QUỶ</h1>
                        <h1 class="text-white"
                            style="z-index: 4; font-size: 0.9rem">
                            Kinh Dị,
                            Kịch Tính</h1>
                        <a href="shop-detail.html"
                            class="shop-now text-white btn btn-success d-flex"
                            style="z-index: 2; width: 150px;"><span
                                class="ms-3">Đặt vé ngay</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="image-layer p-3"
                style="background-image: url(/assets_client/images/main-slider/image-1.png)"></div>
            <div class="auto-container">
                <!-- Content Column -->
                <div class="content-box hover-slider"
                    style="width: 400px;">
                    <img
                        src="https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/vuemdayyeuPOSTER-01.jpg	"
                        style="width: 400px; height: 500px; position: absolute; z-index: 1; filter: brightness(0.6)"
                        class="res-img"
                        alt>
                    <div class="box-inner" style="height: 500px;">
                        <div class="vector-icon"
                            style="background-image: url(/assets_client/images/main-slider/vector-1.png)"></div>
                        <div class="vector-icon-two"
                            style="background-image: url(/assets_client/images/main-slider/vector-2.png)"></div>
                        <div class="vector-icon-three"
                            style="background-image: url(/assets_client/images/main-slider/vector-3.png)"></div>
                        <div class="title text-white">PHIM HOT 2023</div>
                        <h1 class="text-white" style="z-index: 2;">VÚ
                            EM <br> DẠY YÊU</h1>
                        <h1 class="text-white"
                            style="z-index: 4; font-size: 0.9rem">
                            Tình Cảm,
                            Vui Nhọn</h1>
                        <a href="shop-detail.html"
                            class="shop-now text-white btn btn-success d-flex"
                            style="z-index: 2; width: 150px;"><span
                                class="ms-3">Đặt vé ngay</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Slide One -->
    </div>
</section>
<!-- End Main Section -->

<!-- Featured Section -->
<section class="featured-section">
    <div class="vector-layer"
        style="background-image: url(/assets_client/images/icons/vector-1.png)"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
            </div>
        </div>
    </div>
</section>
<!-- End Featured Section -->

<!-- Movie -->
<section class="products-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <h4><strong style="font-size: 2rem;">PHIM SẮP CHIẾU</strong></h4>
        </div>
        <div class="four-item-carousel owl-carousel owl-theme">
            @foreach ($phimSapChieu as $key => $value)
            <div class="shop-item">
                <div class="inner-box">
                    <div class="image" style="width: 300px; height: 400px;">
                        <a href="/movie-detail/{{ $value->slug_phim }}">
                            <div style>
                                <img
                                    src="{{$value->hinh_anh}}"
                                    alt style="object-fit: contain;" />
                            </div>
                        </a>
                        <div class="cart-box text-center mb-1">
                            <a class="cart" href="#">Trailer</a>
                            <a class="cart"
                                href="/movie-detail/{{ $value->slug_phim }}">Đặt
                                vé </a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h6><a href="/movie-detail/{{ $value->slug_phim }}"><b>{{$value->ten_phim}}</b></a></h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="sale-section">
    <div class="auto-container">
    </div>
</section>

<!-- PHIM NHIỀU NGƯỜI XEM NHẤT -->
<section class="collection-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="pattern-layer"
                style="background-image: url(/assets_client/images/icons/pattern-1.png)"></div>
            <div class="shape-layer"
                style="background-image: url(/assets_client/images/background/pattern-1.png)"></div>
            <div class="row clearfix">
                <div
                    class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="title">PHIM NHIỀU NGƯỜI XEM NHẤT
                        2023</div>
                    <h2></h2>
                    <div class="deals">NGƯỜI NHỆN: DU HÀNH VŨ TRỤ
                        NHỆN</div>
                    <a class="shop-now" href="shop-detail.html"><button
                            class="btn btn-danger"><strong>ĐẶT VÉ
                                NGAY</strong></button></a>
                    <!-- Arrow -->
                    <div class="arrow">
                        <img
                            src="/assets_client/images/icons/arrow-1.png"
                            alt />
                    </div>
                </div>
                <div
                    class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image">
                        <div class="shadow-layer"
                            style="background-image: url(/assets_client/images/icons/pattern-2.png)"></div>
                        <img
                            src="/assets_client/images/resource/chair.png"
                            alt />

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  PHIM NHIỀU NGƯỜI XEM NHẤT-->

<!-- Products Section Three -->
<section class="products-section-three">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <h4><span>PHIM HAY </span> DÀNH CHO BẠN !</h4>
        </div>

        <!-- MixitUp Galery -->

        <div class="mixitup-gallery">
            <!-- Filter -->
            <div class="filters">
                <ul class="filter-tabs">
                    <li class="active filter" data-role="button"
                        data-filter="all"></li>
                </ul>
            </div>

            <div class="filter-list row clearfix">

                <!-- Shop Item -->
                @foreach ($phimSapChieu as $key => $value)
                <div
                    class="shop-item mix music photography col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image" style="width: 300px; height: 400px;">
                            <a href="/movie-detail/{{ $value->slug_phim }}">
                                <div style>
                                    <img
                                        src="{{$value->hinh_anh}}"
                                        alt
                                        style="object-fit: cover;" />
                                </div>
                            </a>
                            <div class="cart-box text-center mb-1">
                                <a class="cart"
                                    href="/movie-detail/{{ $value->slug_phim }}">Trailer</a>
                                <a class="cart"
                                    href="/movie-detail/{{ $value->slug_phim }}">Đặt
                                    vé </a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h6><a href="/movie-detail/{{ $value->slug_phim }}"><b>PHIM
                                        ĐIỆN ẢNH DORAEMON: NOBITA VÀ
                                        VÙNG
                                        ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI</b></a></h6>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Button Box -->

        </div>
    </div>
</section>
<!-- End Products Section Three -->

<!-- Sponsors Section -->
<section class="sponsors-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="sponsors-outer">
                <!-- Sponsors Carousel -->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/1.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/2.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/3.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/4.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/5.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/1.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/2.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/3.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/4.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/5.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/1.png"
                                    alt></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a
                                href="#"><img
                                    src="/assets_client/images/clients/2.png"
                                    alt></a></figure></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Sponsors Section -->

<!-- News Section -->
<section class="news-section">
    <div class="auto-container">
        <div class="news-carousel owl-carousel owl-theme">

            <!-- News Block -->
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <div class="tag">BLOG</div>
                        <a href="blog-detail.html"><img
                                src="/assets_client/images/resource/news-1.jpg"
                                alt /></a>
                    </div>
                    <div class="lower-content">
                        <div class="author">
                            <img
                                src="/assets_client/images/resource/author-1.png"
                                alt />
                        </div>
                        <h5><a href="blog-detail.html"
                                style="text-decoration: none;">Mắt
                                Biếc:
                                Câu chuyện tình yêu và nỗi
                                buồn đến từ sự bỏ lỡ</a></h5>
                        <div class="info">By: <span>Lan Hương</span>
                            <i>January 23,2022</i></div>
                    </div>
                </div>
            </div>
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <div class="tag">BLOG</div>
                        <a href="blog-detail.html"><img
                                src="/assets_client/images/resource/news-2.jpg"
                                alt /></a>
                    </div>
                    <div class="lower-content">
                        <div class="author">
                            <img
                                src="/assets_client/images/resource/author-11.png"
                                alt />
                        </div>
                        <h5><a href="blog-detail.html"
                                style="text-decoration: none;">Mắt
                                Biếc”
                                - Một Tác Phẩm Phải Dùng Cả Quãng
                                Thời Gian Thanh Xuân Để Cảm Nhận
                            </a></h5>
                        <div class="info">By: <span>Anh Nguyễn</span>
                            <i>September 11,2022</i></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End News Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="pattern-layer"
        style="background-image: url(/assets_client/images/background/pattern-3.png)"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="pattern-layer-two"
                style="background-image: url(/assets_client/images/background/pattern-4.png)"></div>
            <div class="vector-layer"
                style="background-image: url(/assets_client/images/background/pattern-2.png)"></div>
            <div class="single-item-carousel owl-carousel owl-theme">

                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="row clearfix">
                            <!-- Image Column -->
                            <div
                                class="image-column col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="arrow-layer"
                                        style="background-image: url(/assets_client/images/icons/arrow-2.png)"></div>
                                    <div class="image">
                                        <img
                                            src="/assets_client/images/resource/author-2.png"
                                            alt />
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li><a
                                                    href="https://www.facebook.com/"
                                                    class="fa fa-facebook-f"></a></li>
                                            <li><a
                                                    href="https://www.twitter.com/"
                                                    class="fa fa-twitter"></a></li>
                                            <li><a
                                                    href="https://dribbble.com/"
                                                    class="fa fa-dribbble"></a></li>
                                            <li><a
                                                    href="https://www.linkedin.com/"
                                                    class="fa fa-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->
                            <div
                                class="content-column col-lg-8 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="text">“Tôi gửi tình
                                        yêu cho mùa hè, nhưng mùa hè
                                        không
                                        giữ nổi. Mùa hè chỉ biết ra
                                        hoa, phượng đỏ sân trường và
                                        tiếng ve
                                        nỉ non trong lá. Mùa hè ngây
                                        ngô, giống như tôi vậy. Nó
                                        chẳng làm
                                        được những điều tôi kí thác.
                                        Nó để Hà Lan đốt tôi, đốt
                                        rụi. Trái
                                        tim tôi cháy thành tro, rơi
                                        vãi trên đường về.”</div>
                                    <div
                                        class="quote-icon flaticon-quote"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="row clearfix">
                            <!-- Image Column -->
                            <div
                                class="image-column col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="arrow-layer"
                                        style="background-image: url(/assets_client/images/icons/arrow-2.png)"></div>
                                    <div class="image">
                                        <img
                                            src="/assets_client/images/resource/author-21.png"
                                            alt />
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li><a
                                                    href="https://www.facebook.com/"
                                                    class="fa fa-facebook-f"></a></li>
                                            <li><a
                                                    href="https://www.twitter.com/"
                                                    class="fa fa-twitter"></a></li>
                                            <li><a
                                                    href="https://dribbble.com/"
                                                    class="fa fa-dribbble"></a></li>
                                            <li><a
                                                    href="https://www.linkedin.com/"
                                                    class="fa fa-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->
                            <div
                                class="content-column col-lg-8 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="text">“Trà Long,
                                        làng mình bao giờ cũng đẹp.
                                        Cháu hiểu
                                        rõ điều đó hơn mẹ cháu. Làng
                                        mình đẹp, nhưng buồn. Hồi
                                        chú còn nhỏ,
                                        làng vui hơn. Cũng có thể
                                        làng vẫn thế thôi, nhưng bây
                                        giờ chú thấy
                                        khác. Khi lớn lên, người ta
                                        thường thấy mọi thứ khác đi,
                                        cháu ạ!
                                        Chúng ít rực rỡ hơn và ít
                                        trong suốt hơn. Nhưng dù sao
                                        chí vẫn tin
                                        trong mắt cháu, thế giới vẫn
                                        còn nguyên vẹn, dù ngày mai
                                        khi cháu
                                        đến đây thì chú đã đi
                                        rồi...”</div>
                                    <div
                                        class="quote-icon flaticon-quote"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->

<!-- Gallery Section -->
<section class="gallery-section">
    <div class="outer-container">
        <div class="instagram-carousel owl-carousel owl-theme">

            <!-- Insta Gallery -->
            <div class="insta-gallery">
                <img src="/assets_client/images/gallery/1.png" alt />
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <a
                            class="lightbox-image icon flaticon-instagram"
                            href="/assets_client/images/gallery/1.png"></a>
                    </div>
                </div>
            </div>

            <!-- Insta Gallery -->
            <div class="insta-gallery">
                <img src="/assets_client/images/gallery/2.png" alt />
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <a
                            class="lightbox-image icon flaticon-instagram"
                            href="/assets_client/images/gallery/1.png"></a>

                    </div>
                </div>
            </div>

            <!-- Insta Gallery -->
            <div class="insta-gallery">
                <img src="/assets_client/images/gallery/3.png" alt />
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <a
                            class="lightbox-image icon flaticon-instagram"
                            href="/assets_client/images/gallery/3.png"></a>
                    </div>
                </div>
            </div>

            <!-- Insta Gallery -->
            <div class="insta-gallery">
                <img src="/assets_client/images/gallery/4.png" alt />
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <a
                            class="lightbox-image icon flaticon-instagram"
                            href="/assets_client/images/gallery/4.png"></a>
                    </div>
                </div>
            </div>

            <!-- Insta Gallery -->
            <div class="insta-gallery">
                <img src="/assets_client/images/gallery/5.png" alt />
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <a
                            class="lightbox-image icon flaticon-instagram"
                            href="/assets_client/images/gallery/5.png"></a>
                    </div>
                </div>
            </div>

            <!-- Insta Gallery -->
            <div class="insta-gallery">
                <img src="/assets_client/images/gallery/6.png" alt />
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <a
                            class="lightbox-image icon flaticon-instagram"
                            href="/assets_client/images/gallery/6.png"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Gallery Section -->
@endsection
