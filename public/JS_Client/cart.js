
$(document).ready(function () {
    new Vue({
        el: '#movie_detail',
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
            dataCart: {},
            listCart: [],
            listCartPayment: [{
                'gia_ve': 50,
                'so_ve': 50,
            }],
            total: 0,
        },
        created() {
            this.laodData()
        },
        methods: {
            paymentModal() {
                this.listCartPayment = this.listCart;
                console.log(this.listCartPayment);

            },
            formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
            },
            chooseTicket(payload) {
                this.listCart.push({
                    'so_ghe': payload.so_ghe,
                    'gia_ve': payload.gia_ve
                });
                this.total += payload.gia_ve;
                console.log(this.listCart);
            },
            unchooseTicket(payload) {
                this.listCart.forEach((value, key) => {
                    if (value.so_ghe == payload.so_ghe) {
                        this.listCart.splice(key, 1);
                    }
                })
                this.total -= payload.gia_ve;
            },
            formatDate(dateTimeStr) {
                const dateTime = new Date(dateTimeStr);
                const day = dateTime.getDate().toString().padStart(2, '0');
                const month = (dateTime.getMonth() + 1).toString().padStart(2, '0');
                const year = dateTime.getFullYear();
                return `${day}/${month}/${year}`;
            },
            formatTime(dateTimeStr) {
                const dateTime = new Date(dateTimeStr);
                const hours = dateTime.getHours().toString().padStart(2, '0');
                const minutes = dateTime.getMinutes().toString().padStart(2, '0');
                return `${hours}:${minutes}`;
            },

            laodData(id) {
                var currentURL = window.location.href;
                const pathParts = currentURL.split('/');
                const id_lich_chieu = pathParts[pathParts.length - 1];
                const slug_phim = pathParts[pathParts.length - 3];
                var payload = {
                    'slug': slug_phim,
                    'id_lich_chieu': id_lich_chieu
                }

                console.log(payload);
                axios
                    .post('/api/movie-detail/cart', payload)
                    .then((res) => {
                        this.dataCart = res.data.data;
                        this.hang_ngang = res.data.data.hang_ngang;
                        this.hang_doc = res.data.data.hang_doc;
                        console.log(this.hang_ngang);

                        console.log(this.dataCart);
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
                this.getVe(payload);
            },

            datVe() {
                axios
                    .post('/api/movie-details/order', payload = {
                        'order': this.veXemPhim
                    })
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success(res.data.message, 'Success');
                            $('#veModal').modal('hide');
                        } else if (res.data.status == -1) {
                            toastr.error(res.data.message, 'Error');
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
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
            // chooseChair(payload) {
            //     axios
            //         .post('/api/movie-details/status', payload)
            //         .then((res) => { });
            // },
            getVe(payload) {
                axios
                    .post('/api/movie-details/get-ve', payload)
                    .then((res) => {
                        if (res.data.status) {
                            this.veXemPhim = res.data.data;
                            if (this.veXemPhim.length) {
                                this.hang_doc = this.veXemPhim[0].hang_doc;
                                this.hang_ngang = this.veXemPhim[0].hang_ngang;
                                console.log(this.veXemPhim);
                            }
                        } else {
                            toastr.error(res.data.message, 'Error !');
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

            },

        },
    });
});
