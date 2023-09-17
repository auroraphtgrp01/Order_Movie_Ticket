<!doctype html>
<html lang="en" class>

    <head>
        @include('admin.share.css')
        <title>Dashboard - Movie Control Panel</title>
    </head>

    <body>
        <!--wrapper-->
        <div class="wrapper">
            <!--start header wrapper-->
            <div class="header-wrapper">
                <!--start header -->
                @include('admin.share.header')
                <!--end header -->
                <!--navigation-->
                @include('admin.share.menu')
                <!--end navigation-->
            </div>
            <!--end header wrapper-->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
            @include('admin.share.js')
            @yield('js')
        </body>

    </html>
