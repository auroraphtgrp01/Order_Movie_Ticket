@extends('admin.share.master')
@section('content')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase text-danger">DANH SÁCH LỊCH CHIẾU</h6>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#createModal">Thêm
                        Mới</button>
                </div>
                <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">THÊM MỚI</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label>Tên Phim: </label>
                                            <select name="" v-model="tt_themMoi.id_phim" class="form-control"
                                                id="">
                                                <template v-for="(v, k) in list_phim">
                                                    <option v-bind:value="v.id">
                                                        @{{ v.ten_phim }}
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Thời Gian Bắt Đầu </label>
                                            <input class="form-control" type="datetime-local"
                                                v-model="tt_themMoi.gio_bat_dau">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Thời Gian Kết Thúc: </label>
                                            <input class="form-control" type="datetime-local"
                                                v-model="tt_themMoi.gio_ket_thuc">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Phòng Chiếu: </label>
                                            <select name="" v-model="tt_themMoi.id_phong" class="form-control"
                                                id="">
                                                <template v-for="(v, k) in list_phong">
                                                    <option v-bind:value="v.id">@{{ v.ten_phong }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Tình Trạng : </label>
                                            <select name="" v-model="tt_themMoi.trang_thai" class="form-control"
                                                id="">
                                                <option value="0" selected="selected">Tạm Tắt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button v-on:click="createData()" type="button" class="btn btn-primary"
                                    data-bs-dismiss="modal">Thêm Mới</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn có muốn xóa lịch chiếu của phim <b
                                    class="text-danger text-wrap">@{{ del.ten_phim }}</b> này không ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="deleteData()" type="button" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhập</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Tên Phim</label>
                                            <select v-model="tt_update.id_phim" class="form-control">
                                                <template v-for="(v, k) in list_phim">
                                                    <option v-bind:value="v.id">@{{ v.ten_phim }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Thời Gian Bắt Đầu</label>
                                            <input v-model="tt_update.gio_bat_dau" type="datetime-local"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Thời Gian Kết Thúc</label>
                                            <input v-model="tt_update.gio_ket_thuc" type="datetime-local"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Phòng Chiếu</label>
                                            <select v-model="tt_update.id_phong" class="form-control">
                                                <template v-for="(v, k) in list_phong">
                                                    <option v-bind:value="v.id">@{{ v.ten_phong }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" ss="modal">Đóng</button>
                                <button v-on:click="updateData()" data-bs-dismick="updateData()" v- type="button"
                                    class="btn btn-primary">Cập
                                    Nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row mt-3">
            <div class="col-md">
                <div class="card border-top border-0 border-4 border-danger">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <th class="text-center align-middle" style="background-color:#7887d4">#</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Tên Phim</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Thời Gian Bắt
                                        Đầu
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Thời Gian Kết
                                        Thúc
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Phòng Chiếu</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Tình Trạng</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Action</th>
                                </thead>
                                <tbody>
                                    <template v-for="(v, k) in list_data">
                                        <tr>
                                            <th class="text-center align-middle">@{{ k + 1 }}</th>
                                            <th class="text-center align-middle">@{{ v.ten_phim }}</th>
                                            <th class="text-center align-middle">@{{ v.gio_bat_dau }}</th>
                                            <th class="text-center align-middle">@{{ v.gio_ket_thuc }}</th>
                                            <th class="text-center align-middle">@{{ v.ten_phong }}</th>
                                            <th class="text-center align-middle">
                                                <button v-if="v.trang_thai == 1" class="btn btn-primary"
                                                    v-on:click="changeStatus(v)">Đang Hoạt
                                                    Động</button>
                                                <button v-else v-on:click="changeStatus(v)" class="btn btn-danger">Dừng
                                                    Hoạt
                                                    Động</button>
                                            </th>
                                            <th class="text-center align-middle">
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal" v-on:click="tt_update = v">Cập
                                                    Nhật</button>
                                                <button v-on:click="del = v" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">Xoá Bỏ</button>
                                            </th>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
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

                },
                created() {
                    this.loadData();
                },
                methods: {
                    createData() {
                        axios
                            .post('{{ Route('lichChieuStore') }}', this.tt_themMoi)
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
                            .post('{{ Route('lichChieuData') }}')
                            .then((res) => {
                                this.list_phim = res.data.ds_phim;
                                this.list_phong = res.data.ds_phong;
                                this.list_data = res.data.data1;
                            });
                    },
                    changeStatus(payload) {
                        axios
                            .post('{{ Route('lichChieuStatus') }}', payload)
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
                            .post('{{ Route('lichChieuUpdate') }}', this.tt_update)
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
                            .post('{{ Route('lichChieuDelete') }}', this.del)
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
    </script>
@endsection
