$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            list_admin: {},
            them_moi: {},
            tt_xoa: {},
            tt_capNhat: {}
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                axios
                    .post('/api/admin/admin-manage/data')
                    .then((res) => {
                        this.list_admin = res.data.data;
                    });
            },
            createAdmin() {
                axios
                    .post('/api/admin/admin-manage/store', this.them_moi)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                            $("#themAccModal").modal('hide');
                        } else {
                            toastr.error('Error !');
                        }
                    });
            },
            deleteAcc() {
                axios
                    .post('/api/admin/admin-manage/destroy', this.tt_xoa)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            },
            changStatus(payload) {
                axios
                    .post('/api/admin/admin-manage/status', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            },
            updateAdmin() {
                axios
                    .post('/api/admin/admin-manage/update', this.tt_capNhat)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                            $("#editAccModal").modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            }

        },
    });
});
