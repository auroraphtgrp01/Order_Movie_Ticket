<!doctype html>
<html lang="en" class="dark-theme">

<head>
    @extends('admin.share.css')
    <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header wrapper-->
        <div class="header-wrapper">
            <!--start header -->
            @extends('admin.share.header')
            <!--end header -->
            <!--navigation-->
            @extends('admin.share.menu')
            <!--end navigation-->
        </div>
        <!--end header wrapper-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    @extends('admin.share.js')
    @extends('admin.share.color')
</body>


</html>
