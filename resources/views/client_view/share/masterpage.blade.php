<!DOCTYPE html>
<html lang="en">

    <head>
        @include('client_view.share.css')
    </head>

    <body class="sticky-menu">

        <div class="wrapper">

            @include('client.share.header')
            @yield('content')

            @include('client.share.footer')
        </div>

        @include('client_view.share.search')
        @include('client_view.share.order')

        @include('client_view.share.js')
        @yield('js')
    </body>

</html>
