$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            them_moi: {},
            list_don_vi: [],
            tt_xoa: {},
            tt_cap_nhat: {},
        },
        created() {
            this.loadData();
        },
        methods: {
            themDonVi() {
                axios
                    .post('/api/admin/don-vi/create', this.them_moi)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.them_moi = {};
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            loadData() {
                axios
                    .post('/api/admin/don-vi/data')
                    .then((res) => {
                        this.list_don_vi = res.data.data;
                    });
            },
            xoaDonVi() {
                axios
                    .post('/api/admin/don-vi/del', this.tt_xoa)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                            $('#deleteModal').modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            capNhatDonVi() {
                axios
                    .post('/api/admin/don-vi/update', this.tt_cap_nhat)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                            $('#editModal').modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
        },
    });
});
