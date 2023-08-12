<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Dashboard ecommerce - Vuexy - Bootstrap HTML admin template</title>
    @include('vuexy_dashboard.masterpage.head')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern menu-collapsed navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('vuexy_dashboard.masterpage.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('vuexy_dashboard.masterpage.main_menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @include('vuexy_dashboard.masterpage.Content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('vuexy_dashboard.masterpage.footer')
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    @include('vuexy_dashboard.masterpage.JScript')
    @yield('JS')
</body>
<!-- END: Body-->

</html>
