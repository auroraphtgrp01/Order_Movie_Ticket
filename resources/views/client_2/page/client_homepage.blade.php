<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Movfix - Online Movies & TV Shows Template</title>
    @include('client_2.share.head')
</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="/client_assets/img/preloader.svg" alt="">
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('client_2.share.header')
    <!-- header-area-end -->

    <!-- main-area -->
    <main>

        <!-- slider-area -->
        @include('client_2.share.slider')
        <!-- slider-area-end -->

        <!-- up-coming-movie-area -->
        @include('client_2.share.up_comming')
        <!-- up-coming-movie-area-end -->

        <!-- gallery-area -->
        {{-- @include('client_2.share.gallery') --}}
        <!-- gallery-area-end -->

        <!-- services-area -->
        {{-- @include('client_2.share.services') --}}
        <!-- services-area-end -->

        <!-- top-rated-movie -->
        {{-- @include('client.share.top_rated') --}}
        @include('client.share.upcoming')

        <!-- top-rated-movie-end -->

        <!-- pricing-area -->
        {{-- @include('client_2.share.pricing') --}}
        <!-- pricing-area-end -->

    </main>
    <!-- main-area-end -->


    <!-- footer-area -->
    @include('client_2.share.footer')
    <!-- footer-area-end -->

    @include('client_2.share.JScript')
</body>

</html>
