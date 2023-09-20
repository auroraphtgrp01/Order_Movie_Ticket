<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Auroraphtgrp Cinema - Hệ Thống Bán Vé Xem Phim</title>
        <!-- Stylesheets -->
        @include('client_new.share.head')
    </head>

    <body>

        <div class="page-wrapper" id="homepage">
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
