
$(document).ready(function () {
    new Vue({
        el: '#payment',
        data: {
            dataMovie: [],
            dataCart: {},
            total: 0,
            checkPayment: 0,
            countDown: 10,
            paymentInfo: {},
            hash: '',
        },
        created() {
            this.loadData_Payment();
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
            async loadData() {
                try {
                    const url = window.location.href;
                    const payload = {
                        'url': url,
                    }
                    const response = await axios.post('/api/payment', payload);
                    this.dataMovie = response.data.movie;
                    this.dataCart = response.data.tickets;
                    this.hash = response.data.hasdID;
                    console.log(this.hash);
                    this.dataCart.forEach((value, key) => {
                        this.total += value.gia_ve;
                    });
                } catch (error) {
                    $.each(error.response.data.errors, function (k, v) {
                        toastr.error(v[0], 'Error');
                    });
                }
            },

            async loadData_Payment() {
                await this.loadData();
                this.paymentCreate();
            },

            checkPaid() {
                let k = 1;
                this.paymentCheck();
                setTimeout(() => { this.checkPayment = 1; }, 500)
                const count = setInterval(() => {
                    this.countDown--;
                    if (this.countDown == 0) {
                        this.countDown = 10;
                        if (this.checkPayment == 1) {
                            this.paymentCheck();
                            k++;
                        }

                    }
                    if (this.checkPayment == 2 || k == 5) {
                        clearInterval(count);
                    }
                }, 1000);
            },
            paymentCheck() {
                axios
                    .post('/api/payment/check', this.paymentInfo)
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success('Thanh toán thành công', 'Success');
                            this.checkPayment = 2;
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
            paymentCreate() {
                console.log(this.dataCart);
                axios
                    .post('/api/movie-details/order', payload = {
                        'order': this.dataCart,
                        'hash': this.hash
                    })
                    .then((res) => {
                        this.paymentInfo = res.data.data;
                        console.log(this.paymentInfo);
                    });
            }
        },
    });
});


