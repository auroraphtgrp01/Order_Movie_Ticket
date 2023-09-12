@extends('admin.share.master')
@section('content')
    <div class="row" id="phanQuyen">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="align-middle mt-2">
                                Danh Sách Quyền
                            </div>
                            <button type="button text-end" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#addModal">Thêm mới
                                quyền</button>
                        </div>

                    </div>
                </div>
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm mới quyền</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formdata">
                                    <div class="card-body">
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">Tên Quyền</label>
                                            <input v-model="new_quyen.ten_quyen" type="text" name="ten_quyen"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">Trạng Thái</label>
                                            <select name="tinh_trang" v-model="new_quyen.trang_thai" class="form-control">
                                                <option value="1">Hoạt Động</option>
                                                <option value="0">Tạm Tắt</option>
                                            </select>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click="newData()" class="btn btn-primary"
                                    data-bs-dismiss="modal">Xác Nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Tên Quyền</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(v , k) in list_quyen">
                                    <tr>
                                        <th class="text-center align-middle">@{{ k + 1 }}</th>
                                        <td class="align-middle">@{{ v.ten_quyen }}</td>
                                        <td class="text-center align-middle">
                                            <button v-on:click="statusQuyen(v)" v-if="v.trang_thai == 1"
                                                class="btn btn-success">Hoạt Động</button>
                                            <button v-on:click="statusQuyen(v)" v-else style="width:105px"
                                                class="btn btn-danger">Tạm Tắt</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-info" v-on:click="chonQuyen(v)">Cấp Quyền</button>
                                            <button class="btn btn-primary ms-2" data-bs-toggle="modal"
                                                v-on:click="list_update = Object.assign({},v)"
                                                data-bs-target="#editModal"><i class="fa-solid fa-pen-to-square"
                                                    style="margin-left: 4px"></i></button>
                                            <button class="btn btn-danger ms-2"
                                                v-on:click="list_delete = Object.assign({},v)" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"><i class="fa-solid fa-trash"
                                                    style="margin-left: 4px"></i></button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Quyền</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa quyền: <b class="text-danger">@{{ list_delete.ten_quyen }}</b> này
                                    không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        v-on:click="deleteQuyen()">Xác
                                        Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Quyền</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Tên Quyền</label>
                                        <input type="text" v-model="list_update.ten_quyen" name="ten_quyen"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Trạng Thái</label>
                                        <select v-model="list_update.trang_thai" class="form-control">
                                            <option value="1">Hoạt Động</option>
                                            <option value="0">Tạm Tắt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button data-bs-dismiss="modal" type="button" v-on:click="update()"
                                        class="btn btn-primary">Xác
                                        Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Phân Quyền
                </div>
                <div class="card-body">
                    <div class="row" v-if="quyen_dang_chon.id > 0">
                        <template v-for="(v, k ) in list_chuc_nang">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input v-model="v.check" class="form-check-input" type="checkbox">
                                    <label class="form-check-label">@{{ v.ten_chuc_nang }}</label>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button v-on:click="capNhatQuyen()" class="btn btn-primary" style="width: 95%">Cập Nhập Phân
                            Quyền</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#phanQuyen',
            data: {
                list_quyen: {},
                list_chuc_nang: [],
                new_quyen: {},
                list_update: {},
                list_delete: {},
                quyen_dang_chon: {},

            },
            created() {
                this.loadQuyen();
                this.loadChucNang();
            },
            methods: {
                chonQuyen(v) {
                    this.quyen_dang_chon = Object.assign({}, v);
                    axios
                        .post('/api/admin/phan-quyen/data-chuc-nang', this.quyen_dang_chon)
                        .then((res) => {
                            this.list_chuc_nang = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                loadQuyen() {
                    axios
                        .post('/api/admin/phan-quyen/data')
                        .then((res) => {
                            this.list_quyen = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                // loadChucNang() {
                //     axios
                //         .post('/api/admin/phan-quyen/data-chuc-nang')
                //         .then((res) => {
                //             this.list_chuc_nang = res.data.data;
                //             console.log(this.list_chuc_nang);
                //         })
                //         .catch((res) => {
                //             $.each(res.response.data.errors, function(k, v) {
                //                 toastr.error(v[0], 'Error');
                //             });
                //         });
                // },
                newData() {
                    axios
                        .post('/api/admin/phan-quyen/create', this.new_quyen)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success !');
                                this.loadQuyen();
                            } else {
                                toastr.error(res.data.message, 'Error !');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                statusQuyen(payload) {
                    axios
                        .post('/api/admin/phan-quyen/status', payload)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success !');
                                this.loadQuyen();
                            } else {
                                toastr.error(res.data.message, 'Error !');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                update() {
                    axios
                        .post('/api/admin/phan-quyen/update', this.list_update)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success !');
                                this.loadQuyen();
                            } else {
                                toastr.error(red.data.message, 'Error !');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                deleteQuyen() {
                    axios
                        .post('/api/admin/phan-quyen/delete', this.list_delete)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success !');
                                this.loadQuyen();
                            } else {
                                toastr.error(red.data.message, 'Error !');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                capNhatQuyen() {
                    var payload = {
                        'quyen': this.quyen_dang_chon,
                        'chuc_nang': this.list_chuc_nang,
                    };
                    axios
                        .post('/api/admin/phan-quyen/add', payload)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
            },
        });
    </script>
@endsection
