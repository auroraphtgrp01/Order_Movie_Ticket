$(document).ready(function () {
    new Vue({
        el: '#app',
        data: {
            id_phong: '',
            phong_chieu: {
                'hang_ngang': 2,
                'hang_doc': 10
            },
            list_ghe: [],
            edit: {},
        },
        created() {
            this.getIdPhong();
        },
        methods: {
            getIdPhong() {
                var currentURL = window.location.href;
                var parts = currentURL.split('/');
                var number = parts[parts.length - 1];
                if (!isNaN(number)) {
                    this.id_phong = number;
                    this.loadData();
                } else {
                    console.log('Không tìm thấy số');
                }
            },
            loadData() {
                var payload = {
                    'id_phong': this.id_phong
                };
                axios
                    .post('/api/admin/ghe-chieu/info', payload)
                    .then((res) => {
                        this.phong_chieu = res.data.phong_chieu;
                        this.list_ghe = res.data.ds_ghe;
                    });
            },
            doiTinhTrang(payload) {
                axios
                    .post('/api/admin/ghe-chieu/status', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message, 'Success');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            },
            capNhapGheChieu() {
                axios
                    .post('/api/admin/ghe-chieu/update', this.edit)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.message);
                            $("#updateModal").modal('hide');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message);
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function (k, v) {
                            toastr.error(v[0]);
                        });
                    });
            }
        },
    });
});

