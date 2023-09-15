
$(document).ready(function () {
    new Vue({
        el: '#resetPassword',
        data: {
            payload: {}
        },
        created() {
            console.log('sdsdsdsds');

        },
        methods: {
            changePassword() {
                var currentURL = window.location.href;
                var parts = currentURL.split('/');
                var tokenPassword = parts[parts.length - 1];
                this.payload.token = tokenPassword;
                axios
                    .post('/api/admin/danh-sach-account/reset', this.payload)
                    .then((res) => {

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
