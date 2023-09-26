$('document').ready(function () {
    new Vue({
        el: '#order_list',
        data: {
            listOrder: [],
            listTicket: [],
        },
        created() {
            this.loadDataList();
        },
        methods: {
            loadDataList() {
                axios
                    .post('/api/customer/order-list')
                    .then((res) => {
                        this.listOrder = res.data.data;
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
            formatDate(dateTimeStr) {
                const dateTime = new Date(dateTimeStr);
                const day = dateTime.getDate().toString().padStart(2, '0');
                const month = (dateTime.getMonth() + 1).toString().padStart(2, '0');
                const year = dateTime.getFullYear();
                return `${day}/${month}/${year}`;
            }, formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
            },
            loadTicket(id) {
                axios
                    .post('/api/customer/list-ticket', id)
                    .then((res) => {
                        this.listTicket = res.data.data;
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            }
        },

    });
});
