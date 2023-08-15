$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            list_phong_chieu: {},
            createDS: {},
            edit: {},
            del: {},
            create: {},
            gia_mac_dinh: 0,
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                axios
                    .post('/api/admin/phong-chieu/data',)
                    .then((res) => {
                        this.list_phong_chieu = res.data.data;
                    });
            },
            createPC() {
                axios
                    .post('/api/admin/phong-chieu/store', this.createDS)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            this.loadData();
                        }
                    });
            },
            doiTT(payload) {
                axios
                    .post('/api/admin/phong-chieu/status', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            update() {
                axios
                    .post('/api/admin/phong-chieu/update', this.edit)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                            $('#editModal').modal('hide');
                            this.edit = {};
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            deleteTT() {
                axios
                    .post('/api/admin/phong-chieu/delete', this.del)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                            $('#delModal').modal('hide');
                            this.del = {};
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            createGhe() {
                this.create.gia_mac_dinh = this.gia_mac_dinh;
                axios
                    .post('/api/admin/ghe-chieu/create', this.create)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            }
        },
    });
});
