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
    {{-- <script>
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
                    dateObj: [],
                },
                created() {
                    this.loadDataFromURL();
                },
                methods: {
                    sortArrayByTime(arr) {
                        function convertTimeToMinutes(time) {
                            const [hours, minutes] = time.split(':');
                            return parseInt(hours, 10) * 60 + parseInt(minutes, 10);
                        }

                        function compareTimes(item1, item2) {
                            const time1 = convertTimeToMinutes(item1.gio_chieu);
                            const time2 = convertTimeToMinutes(item2.gio_chieu);
                            return time1 - time2;
                        }

                        const sortedArr = arr.slice().sort(compareTimes);
                        return sortedArr;
                    },
                    sortArrayByDate(arr) {
                        function compareDates(item1, item2) {
                            const date1 = new Date(item1.ngay_chieu);
                            const date2 = new Date(item2.ngay_chieu);
                            return date1 - date2;
                        }
                        const sortedArr = arr.slice().sort(compareDates);
                        return sortedArr;
                    },
                    getFirst(sentence) {
                        if (sentence !== undefined) {
                            var words = sentence.split(' ');
                            var wordCount = words.length;
                            if (wordCount > 3) {
                                return words[0] + ' ' + words[1];
                            } else if (wordCount <= 3) {
                                return words[0];
                            } else {
                                return '';
                            }
                        } else {
                            return '';
                        }
                    },
                    getWords(sentence) {
                        if (sentence !== undefined) {
                            var words = sentence.split(' ');
                            var wordCount = words.length;
                            if (wordCount > 4) {
                                var result = words.slice(2);
                            } else if (wordCount > 1) {
                                var result = words.slice(1);
                            } else {
                                var result = '';
                            }
                            return result.join(' ');
                        } else {
                            return '';
                        }

                    },
                    date_format(now) {
                        return moment(now).format('DD/MM/yyyy HH:mm');
                    },
                    getVe(payload) {
                        axios
                            .post('{{ Route('MovieGetVe') }}', payload)
                            .then((res) => {
                                this.veXemPhim = res.data.data;
                                console.log(this.veXemPhim);
                                if (this.veXemPhim.length) {
                                    this.hang_doc = this.veXemPhim[0].hang_doc;
                                    this.hang_ngang = this.veXemPhim[0].hang_ngang;
                                }
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
                            this.dateTime.push({
                                'gio_chieu': timeOnly,
                                'ngay_chieu': dateOnly,
                                'check': 0,
                                'id_lich_chieu': data[key].id,
                            });
                        }
                        // this.dateTime = this.sortArrayByTime(this.dateTime);
                        this.dateTime = this.sortArrayByDate(this.dateTime);
                        console.log(this.dateTime);

                        let obj = {};
                        let arr = [];
                        for (let i = 0; i < this.dateTime.length; i++) {
                            this.dateTime[i].check = i;
                        }
                        for (let i = 0; i < this.dateTime.length; i++) {
                            this.dateObj.push(i);
                            for (let j = i + 1; j < this.dateTime.length; j++) {
                                if (this.dateTime[i].ngay_chieu == this.dateTime[j].ngay_chieu) {
                                    this.dateTime[j].check = this.dateTime[i].check;
                                    break;
                                }
                            }
                        }

                        console.log(this.dateTime);
                    },
                    loadDataFromURL() {
                        var currentURL = window.location.href;
                        var parts = currentURL.split('/');
                        var movieSlug = parts[parts.length - 1];
                        let payload = {
                            'slug_phim': movieSlug,
                        }
                        axios
                            .post('{{ Route('DataMovieSet') }}', payload)
                            .then((res) => {
                                this.dataMovie = res.data.data;
                                this.data_lc = res.data.data_lc;
                                this.dateAndTime(this.data_lc);
                                this.listRcm = res.data.data_rcm;
                            });
                    },
                },
            });
        });
    </script> --}}
</body>

</html>
