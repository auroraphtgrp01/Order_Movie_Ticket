
$(document).ready(function () {
    new Vue({
        el: '#payment',
        data: {
            dataMovie: [],
            dataCart: {},
            total: 0,
            checkPayment: 0,
            countDown: 60,
        },
        created() {
            this.loadData();
        },
        methods: {
            formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
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
            loadData() {
                $url = window.location.href;
                let payload = {
                    'url': $url,
                }
                axios
                    .post('/api/payment', payload)
                    .then((res) => {
                        this.dataMovie = res.data.movie;
                        this.dataCart = res.data.tickets;
                        this.dataCart.forEach((value, key) => {
                            this.total += value.gia_ve;
                        });
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
            checkPaid() {
                setTimeout(() => { this.checkPayment = 1; }, 500)
                const count = setInterval(() => {
                    this.countDown--; if (this.countDown == 0) {
                        clearInterval(count);
                    }
                }, 1000);

            }
        },
    });
});


