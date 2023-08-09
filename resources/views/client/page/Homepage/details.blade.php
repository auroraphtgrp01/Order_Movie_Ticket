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
                    data_lc: {},
                    dateTime: [],
                    tt_lich: {},
                    veXemPhim: {},
                    hang_doc: 0,
                    hang_ngang: 0,
                },
                created() {
                    this.loadData();
                },
                methods: {
                    date_format(now) {
                        return moment(now).format('DD/MM/yyyy HH:mm');
                    },
                    getVe(payload) {
                        axios
                            .post('{{ Route('MovieGetVe') }}', payload)
                            .then((res) => {
                                this.veXemPhim = res.data.data;
                                console.log(this.veXemPhim);
                                this.hang_doc = this.veXemPhim[0].hang_doc;
                                this.hang_ngang = this.veXemPhim[0].hang_ngang;
                                console.log(this.veXemPhim);
                            });
                    },

                    dateAndTime(data) {
                        for (var key in data) {
                            let datetime, year, month, day, hours, minute, timeOnly, dateOnly;
                            datetime = new Date(data[key].gio_bat_dau);
                            year = datetime.getFullYear();
                            month = datetime.getMonth() + 1;
                            day = datetime.getDate();
                            hours = datetime.getHours();
                            minute = datetime.getMinutes();
                            timeOnly = hours + ':' + minute;
                            dateOnly = day + '/' + month + '/' + year;
                            if (key >= 1 && dateOnly === this.dateTime[key - 1].ngay_chieu) {
                                this.dateTime.push({
                                    'gio_chieu': timeOnly,
                                    'ngay_chieu': dateOnly,
                                    'check': 1,
                                    'id_lich_chieu': data[key].id,
                                });
                            } else {
                                this.dateTime.push({
                                    'gio_chieu': timeOnly,
                                    'ngay_chieu': dateOnly,
                                    'check': 0,
                                    'id_lich_chieu': data[key].id,
                                });
                            }

                        }
                        console.log(this.dateTime);


                    },
                    loadData() {
                        axios
                            .post('{{ Route('MovieDataGet') }}')
                            .then((res) => {
                                this.dataMovie = res.data.data;
                                this.data_lc = res.data.data_lc;
                                this.dateAndTime(this.data_lc);
                                this.listRcm = res.data.data_rcm;
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
