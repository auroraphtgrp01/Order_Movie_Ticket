$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            tt_new: {
                tinh_trang: 1,
                is_block: 1,
            },
            login: {},

        },
        created() {
        },
        methods: {
            themTaiKhoan() {
                axios
                    .post('/api/admin/danh-sach-account/create', this.tt_new)
                    .then((res) => {
                        if (res.data.status) {
                            this.tt_new = {
                                'is_block': 1,
                                'tinh_trang': 1
                            }
                            toastr.success(res.data.message, 'Success !');
                        } else {
                            toastr.error('Lỗi đăng ký tài khoản', 'Error !');
                        }
                    });
            },
            loginAcc() {
                axios
                    .post('/api/admin/danh-sach-account/login', this.login)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success !');
                            window.location.href = '/';
                        } else {
                            toastr.error(res.data.message, 'Error !');
                        }
                    });
            }
        },
    });
});
