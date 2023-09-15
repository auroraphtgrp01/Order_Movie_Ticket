$('document').ready(function () {
    new Vue({
        el: '#forgetPassword',
        data: {
            payload: {},
        },
        created() {

        },
        methods: {
            resetPassword() {
                axios
                    .post('/api/admin/danh-sach-account/forget', this.payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
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
// Path: public/JS_Client/forget.js
