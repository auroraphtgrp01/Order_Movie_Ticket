<!doctype html>
<html class="no-js" lang>

    <head>
        @include('client.share.head')
        <title>Movie Tickets</title>
    </head>

    <body>
        <div id="app">
            <!-- preloader -->
            <!-- preloader-end -->

            <!-- Scroll-top -->
            <button class="scroll-top scroll-to-target" data-target="html">
                <i class="fas fa-angle-up"></i>
            </button>
            <!-- Scroll-top-end-->

            <!-- header-area -->
            @include('client.share.header')
            <!-- header-area-end -->
            <!-- main-area -->
            <main>
                <!-- banner-area -->
                @include('client.share.banner')
                <!-- banner-area-end -->

                <!-- up-coming-movie-area -->
                @include('client.share.upcoming')
                <!-- up-coming-movie-area-end -->
                @include('client.share.now')
                <!-- services-area -->
                {{-- @include('client.share.services') --}}
                <!-- services-area-end -->
                <!-- top-rated-movie -->
                @include('client.share.top_rated')
                <!-- top-rated-movie-end -->
                <!-- live-area -->
                {{-- @include('client.share.live') --}}
                <!-- live-area-end -->

                <!-- tv-series-area -->
                @include('client.share.tvseries')
                <!-- tv-series-area-end -->

                <!-- newsletter-area -->
                @include('client.share.new_letter')
                <!-- newsletter-area-end -->

            </main>
            <!-- main-area-end -->

            <!-- footer-area -->
            @include('client.share.footer')
            <!-- footer-area-end -->
        </div>

        <!-- JS here -->

        @include('client.share.scriptJS')

    </body>

</html>
