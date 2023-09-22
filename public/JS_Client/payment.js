
$(document).ready(function () {
    new Vue({
        el: '#payment',
        data: {
            dataMovie: [],
            dataCart: {},
            total: 0,
            checkPayment: 0,
            countDown: 60,
            paymentInfo: {},
            hash: '',
            checkButton: 1,
            amountMoney: 0,
            qrpay: '',
            hashCode: '',
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
                    console.log('hash' + this.dataCart.hashCode);

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
                if (this.checkButton == 1) {
                    let countSecond = 10;
                    let k = 1;
                    this.paymentCheck();
                    setTimeout(() => { this.checkPayment = 1; }, 500)
                    const count = setInterval(() => {
                        this.countDown--;
                        countSecond--;
                        if (countSecond == 0 && this.checkPayment == 1) {
                            countSecond = 10;
                            this.paymentCheck();
                            k++;
                        }
                        if (this.checkPayment == 2 || this.countDown == 0) {
                            clearInterval(count);
                        }
                        if (k == 5) {
                            this.checkPayment = -1;
                            clearInterval(count);
                        }
                        if (this.checkPayment == -2) {
                            clearInterval(count);
                        }
                        if (this.checkPayment == -10) {
                            clearInterval(count);
                        }
                    }, 1000);
                }
            },
            paymentCheck() {
                axios
                    .post('/api/payment/check', this.paymentInfo)
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success('Thanh toán thành công', 'Success');
                            this.checkPayment = 2;
                            this.checkButton = 0;
                        }
                        if (res.data.status == -1) {
                            this.checkPayment = -2;
                            this.amountMoney = res.data.amount_pay;
                        }
                        // if (res.data.status == 11) {
                        //     this.checkPayment == -10;
                        // }
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
                        this.hashCode = res.data.data.hashCode;
                        this.qrPay();
                    });
            },
            qrPay() {
                console.log('hashcode: ' + this.hashCode);
                payload = {
                    "accountNo": 5040109082003,
                    "accountName": "HUYNH HUY HOANG",
                    "acqId": 970422,
                    "amount": this.total,
                    "addInfo": this.hashCode,
                    "format": "text",
                    "template": "compact"
                }
                axios
                    .post('https://api.vietqr.io/v2/generate', payload)
                    .then((res) => {
                        this.qrpay = res.data.data.qrDataURL;
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
        },
    });
});


