$(document).ready(function () {
    new Vue({
        el: '#login',
        data: {
            login: {},
        },
        created() {
        },
        methods: {
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
