$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            tt_themMoi: {
                'tinh_trang': 0,
            },
            list_phim: [],
            list_phong: [],
            list_data: [],
            tt_update: {
                'tinh_trang': 0,
            },
            del: {},
            detail: {},
            ds_ve: [],
        },
        created() {
            this.loadData();
        },
        methods: {
            getTT(payload) {
                axios
                    .post('/api/admin/lich-chieu/info', payload)
                    .then((res) => {
                        this.ds_ve = res.data.data;
                        console.log(this.ds_ve);
                        console.log(this.detail);
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
            createData() {
                axios
                    .post('/api/admin/lich-chieu/store', this.tt_themMoi)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                        } else {
                            toastr.error('Error !');
                        }
                    });
            },
            loadData() {
                axios
                    .post('/api/admin/lich-chieu/data')
                    .then((res) => {
                        this.list_phim = res.data.ds_phim;
                        this.list_phong = res.data.ds_phong;
                        this.list_data = res.data.data1;
                        console.log(this.list_data);
                    });
            },
            changeStatus(payload) {
                axios
                    .post('/api/admin/lich-chieu/status', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            },
            updateData() {
                axios
                    .post('/api/admin/lich-chieu/update', this.tt_update)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                            $("#updateModal").modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error !');

                        }
                    });
            },
            deleteData() {
                axios
                    .post('/api/admin/lich-chieu/delete', this.del)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                            $("#deleteModal").modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            }
        },
    });
});
