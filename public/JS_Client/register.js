$(document).ready(function () {
    new Vue({
        el: '#register',
        data: {
            tt_new: {
                tinh_trang: 1,
                is_block: 1,
            },
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
                            setTimeout(function () {
                                window.location.href = '/login';
                            }, 700);
                        } else {
                            toastr.error('Lỗi đăng ký tài khoản', 'Error !');
                        }
                    });
            },
        },
    });
});
