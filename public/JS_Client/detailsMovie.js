
$(document).ready(function () {
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
            this.loadDataFromURL();
        },
        methods: {
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
                    .post('{{ Route("MovieGetVe") }}', payload)
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
            loadDataFromURL() {
                var currentURL = window.location.href;
                var parts = currentURL.split('/');
                var movieSlug = parts[parts.length - 1];
                let payload = {
                    'slug_phim': movieSlug,
                }
                console.log(payload);

                axios
                    .post('{{ Route("DataMovieSet") }}', payload)
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
