<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Auroraphtgrp Cinema - Hệ Thống Bán Vé Xem Phim</title>
        <!-- Stylesheets -->
        @include('client_new.share.head')
    </head>

    <body style="background-color: #0e1317;">

        <div class="page-wrapper" id="homepage">
            <div class="loader-wrap">
                <div class="preloader">
                    <div id="handle-preloader" class="handle-preloader">
                        <div class="animation-preloader">
                            <div class="spinner"></div>
                            <div class="txt-loading">
                                <span data-text-preloader="A"
                                    class="letters-loading">
                                    A
                                </span>
                                <span data-text-preloader="U"
                                    class="letters-loading">
                                    U
                                </span>
                                <span data-text-preloader="R"
                                    class="letters-loading">
                                    R
                                </span>
                                <span data-text-preloader="O"
                                    class="letters-loading">
                                    O
                                </span>
                                <span data-text-preloader="R"
                                    class="letters-loading">
                                    R
                                </span>
                                <span data-text-preloader="A"
                                    class="letters-loading">
                                    A
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Header -->
            @include('client_new.share.header')
            <!-- End Main Header -->
            @yield('content')
            @include('client_new.share.footer')

        </div>
        <!-- End PageWrapper -->

        <!-- Search Popup -->
        <div class="search-popup">
            <div class="color-layer"></div>
            <button class="close-search"><span class="fa fa-arrow-up"></span></button>
            <form method="post" action="blog.html">
                <div class="form-group">
                    <input type="search" name="search-field" value
                        placeholder="Search Here"
                        required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <!-- End Search Popup -->

        <!-- Scroll To Top -->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span
                class="fa fa-arrow-up"></span></div>
        @include('client_new.share.script')
        @yield('js')
    </body>
</html>
