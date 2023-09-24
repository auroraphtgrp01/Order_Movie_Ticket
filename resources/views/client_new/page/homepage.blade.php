@extends('client_new.share.masterpage')
@section('content')
<section class="main-slider">
    <div class="container">
        <div class="main-slider-carousel owl-carousel owl-theme">
            <div><img src="/assets_client/images/background/6.jpg" alt></div>
            <div><img src="/assets_client/images/background/1.png" alt></div>
            <div><img src="/assets_client/images/background/2.jpg" alt></div>
            <div><img src="/assets_client/images/background/3.jpg" alt></div>
            <div><img src="/assets_client/images/background/5.jpg" alt></div>
            <div><img src="/assets_client/images/background/4.jpg" alt></div>
        </div>
    </div>
</section>
<section class="products-section mt-5">
    <div class="auto-container">
        <div class="sec-title">
            <h4><strong style="font-size: 2.2rem;" class="text-danger">PHIM SẮP
                    CHIẾU</strong></h4>
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
                            <a class="cart" href="#" style><b>Trailer</b></a>
                            <a class="cart" style
                                href="/movie-detail/{{ $value->slug_phim }}"><b>Đặt
                                    vé </b></a>
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
<section class="collection-section">
    <div class="auto-container">
        <div class="inner-container"
            style="border-radius: 20px; background: rgb(255,153,102);
            background: linear-gradient(90deg, rgba(255,153,102,1) 0%, rgba(255,94,98,1) 100%);">
            <div class="pattern-layer"
                style="background-image: url(/assets_client/images/icons/pattern-1.png)"></div>
            <div class="row clearfix">
                <div
                    class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="title text-danger fs-2"><b>PHIM NHIỀU NGƯỜI XEM
                            NHẤT
                            2023</b></div>
                    <h2></h2>
                    <div class="deals text-white">NGƯỜI NHỆN: DU HÀNH VŨ TRỤ
                        NHỆN</div>
                    <a class="shop-now" href="shop-detail.html"><button
                            class="btn btn-danger"><strong>ĐẶT VÉ
                                NGAY</strong></button></a>
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
<section class="products-section-three">
    <div class="auto-container">
        <div class="sec-title">
            <h4><span>PHIM HAY </span> DÀNH CHO BẠN !</h4>
        </div>
        <div class="mixitup-gallery">
            <!-- Filter -->
            <div class="filters">
                <ul class="filter-tabs">
                    <li class="active filter" data-role="button"
                        data-filter="all"></li>
                </ul>
            </div>
            <div class="filter-list row clearfix">
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
                                    href="/movie-detail/{{ $value->slug_phim }}"><b>Trailer</b></a>
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
    </div>
</section>
<section class="sponsors-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="sponsors-outer">
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
<section class="news-section">
    <div class="auto-container">
        <div class="news-carousel owl-carousel owl-theme">
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <div class="tag text-bg-danger">BLOG</div>
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
                        <div class="tag text-bg-danger">BLOG</div>
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
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="row clearfix">
                            <div
                                class="image-column col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="arrow-layer"
                                        style="background-image: url(/assets_client/images/icons/arrow-2.png)"></div>
                                    <div class="image">
                                        <img
                                            src="/assets_client/images/resource/author-2.png"
                                            alt />
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
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="row clearfix">
                            <div
                                class="image-column col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="arrow-layer"
                                        style="background-image: url(/assets_client/images/icons/arrow-2.png)"></div>
                                    <div class="image">
                                        <img
                                            src="/assets_client/images/resource/author-21.png"
                                            alt />
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
<section class="gallery-section">
    <div class="outer-container">
        <div class="instagram-carousel owl-carousel owl-theme">
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
@endsection
