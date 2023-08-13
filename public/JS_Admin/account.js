$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            them_moi: {
                'is_block': 1,
                'tinh_trang': 1
            },
            list_tai_khoan: [],
            tt_xoa: {},
            tt_update: {},
        },
        created() {
            this.loadData();
        },
        methods: {
            themTaiKhoan() {
                axios
                    .post('/api/admin/danh-sach-account/create', this.them_moi)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            $('#themTaiKhoan').modal('hide');
                            this.them_moi = {
                                'is_block': 1,
                                'tinh_trang': 1
                            }
                            this.loadData();
                        } else {
                            toastr.error('Error', 'Error');
                        }
                    });
            },
            loadData() {
                axios
                    .post('/api/admin/danh-sach-account/data')
                    .then((res) => {
                        this.list_tai_khoan = res.data.xxx;
                        console.log(this.list_tai_khoan);
                    });
            },
            doiTrangThaiBlock(payload) {
                axios
                    .post('/api/admin/danh-sach-account/block', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error')
                        }
                    });
            },
            doiTrangThaiTinhTrang(payload) {
                axios
                    .post('/api/admin/danh-sach-account/tinh-trang', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            },
            xoaTaiKhoan() {
                axios
                    .post('/api/admin/danh-sach-account/delete', this.tt_xoa)
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
            updateTaiKhoan() {
                axios
                    .post('/api/admin/danh-sach-account/update', this.tt_update)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                            $('#updateTaiKhoan').modal('hide');
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    });
            }
        }
    });
});
