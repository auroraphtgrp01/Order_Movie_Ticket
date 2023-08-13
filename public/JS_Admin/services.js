$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            themMoi: {},
            list_dich_vu: {},
            tt: {},
            tt_cap_nhat: {},
        },
        created() {
            this.loadData();
        },
        methods: {
            themDichVu() {
                axios
                    .post('/api/admin/dich-vu/create', this.themMoi)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            loadData() {
                axios
                    .post('/api/admin/dich-vu/data',)
                    .then((res) => {
                        if (res.data.status) {
                            this.list_dich_vu = res.data.data;
                        }
                    });
            },
            format(number) {
                return new Intl.NumberFormat('vi-VI', {
                    style: 'currency',
                    currency: 'VND'
                }).format(number);
            },
            doiTT(payload) {
                axios
                    .post('/api/admin/dich-vu/status', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            },
            updateTT() {
                axios
                    .post('/api/admin/dich-vu/update', this.tt_cap_nhat)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                            $('#editModal').modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            },
            deleteTT() {
                axios
                    .post('/api/admin/dich-vu/delete', this.tt)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                            $('#deleteModal').modal('hide');
                        } else {

                        }
                    });
            }
        },
    });
});
