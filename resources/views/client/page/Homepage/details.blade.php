<!doctype html>
<html class="no-js" lang="">

<head>
    @include('client.share.details_page.head')
    <title>Movfix - Online Movies & TV Shows Template</title>
</head>

<body>
    <div id="app_details">
        <!-- preloader -->
        @include('client.share.details_page.preloader')
        <!-- preloader-end -->

        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('client.share.details_page.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>
            <!-- movie-details-area -->
            @include('client.share.details_page.details_movie')
            <!-- movie-details-area-end -->

            <!-- episode-area -->
            {{-- @include('client.share.details_page.episode') --}}
            <!-- episode-area-end -->

            <!-- tv-series-area -->
            @include('client.share.details_page.tv_series')
            <!-- tv-series-area-end -->

            <!-- newsletter-area -->
            @include('client.share.details_page.newletter')
            <!-- newsletter-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer-area -->
        @include('client.share.details_page.footer')
        <!-- footer-area-end -->
    </div>

    <!-- JS here -->
    @include('client.share.details_page.scriptJS')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app_details',
                data: {
                    dataMovie: [],
                    listRcm: [],
                },
                created() {
                    this.loadData();
                },
                methods: {
                    loadData() {
                        axios
                            .post('{{ Route('MovieDataGet') }}')
                            .then((res) => {
                                this.dataMovie = res.data.data;
                                this.listRcm = res.data.data_rcm;
                                console.log(this.listRcm);

                            });
                    },
                    detailMovie(payload) {
                        axios
                            .post('{{ Route('DataMovieSet') }}', payload)
                            .then((res) => {
                                if (res.data.status == 0) {
                                    toastr.error(res.data.message, 'Error !');
                                }
                            });
                    }

                },
            });
        });
    </script>

</body>

</html>
