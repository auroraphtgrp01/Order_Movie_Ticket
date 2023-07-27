<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.share.css')
</head>

<body class="sticky-menu">

    <div class="wrapper">


        @include('client.share.header')
        @yield('content')

        @include('client.share.footer')
    </div>

    @include('client.share.search')
    @include('client.share.order')

    @include('client.share.js')
    @yield('js')
</body>

</html>
