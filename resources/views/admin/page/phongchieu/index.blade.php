@extends('admin.share.master')
@section('content')
    <div class="row" id="app">
        {{-- MODAL UPDATE --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Phòng Chiếu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="mb-2">Tên Phòng Chiếu</label>
                        <input v-model="edit.ten_phong" type="text" class="form-control mb-2"
                            placeholder="Nhập vào tên phòng">
                        <label class="mb-2">Loại Máy Chiếu</label>
                        <input v-model="edit.loai_may_chieu" type="text" class="form-control mb-2"
                            placeholder="Nhập vào loại máy chiếu">
                        <label class="mb-2">Hàng Ngang</label>
                        <input v-model="edit.hang_ngang" type="number" class="form-control mb-2"
                            placeholder="Nhập vào số ghế hàng ngang">
                        <label class="mb-2">Hàng Dọc</label>
                        <input v-model="edit.hang_doc" type="number" class="form-control mb-2"
                            placeholder="Nhập vào số ghế hàng dọc">
                        <label class="mb-2">Tình Trạng</label>
                        <select class="form-control mb-2" v-model="edit.tinh_trang">
                            <option value="1">Đang Hoạt Động</option>
                            <option value="0">Dừng Hoạt Động</option>
                        </select>
                        <label class="mb-2">Loại Phòng</label>
                        <select class="form-control mb-2" v-model="edit.loai_phong">
                            <option value="Phòng 2D">Phòng 2D</option>
                            <option value="Phòng 3D">Phòng 3D</option>
                            <option value="Phòng IMAX">Phòng IMAX</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="update()">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phim</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                    <div class="text-dark text-wrap">Bạn có chắc chắn muốn xóa phòng <b
                                            class="text-danger">@{{ del.ten_phong }}</b> này không!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="deleteTT()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                            Nhận
                            Xóa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tạo Ghế Cho Phòng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                    <div class="text-dark text-wrap">
                                        Bạn có muốn tạo <b class="text-danger">@{{ create.hang_ngang * create.hang_doc }}</b>
                                        ghế. <br> Bao gồm <b class="text-danger">@{{ create.hang_ngang }}</b>
                                        hàng ngang và <b class="text-danger">@{{ create.hang_doc }}</b>
                                        hàng dọc không?!</div>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-danger"><b>Giá Vé: </b></h6>
                        <input type="text" class="form-control" v-model="gia_mac_dinh">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="createGhe()" type="button" v-on:click="createGhe()" class="btn btn-primary"
                            data-bs-dismiss="modal">Xác
                            Nhận Tạo Ghế</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                        </div>
                        <h5 class="mb-0 text-danger">THÊM MỚI PHÒNG CHIẾU</h5>
                    </div>
                    <hr>
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">Tên Phòng: </label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="bx bxs-microphone"></i></span>
                                <input v-model="createDS.ten_phong" type="text" class="form-control border-start-0"
                                    id="tenPhong" placeholder="Tên phòng">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Loại Máy: </label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-message"></i></span>
                                <input v-model="createDS.loai_may_chieu" type="text"
                                    class="form-control border-start-0" id="loaiMay" placeholder="Loại máy">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName1" class="form-label">Hàng Ngang</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-user"></i></span>
                                <input type="text" v-model="createDS.hang_ngang" class="form-control border-start-0"
                                    id="hangNgang" placeholder="Hàng ngang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName2" class="form-label">Hàng Dọc</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-user"></i></span>
                                <input type="text" v-model="createDS.hang_doc" class="form-control border-start-0"
                                    id="hangDoc" placeholder="Hàng dọc">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Loại Phòng: </label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="bx bxs-lock-open"></i></span>
                                <select v-model="createDS.loai_phong" name="" id=""
                                    class="form-control">
                                    <option value="Phòng 2D">Phòng 2D</option>
                                    <option value="Phòng 3D">Phòng 3D</option>
                                    <option value="Phòng IMAX">Phòng IMAX</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="hidden" id="id_check">
                            <label for="inputAddress3" class="form-label">Tình Trạng</label>
                            <select name="" v-model="createDS.tinh_trang" id="tinhTrang" class="form-control">
                                <option value="0">Đang Hoạt Động</option>
                                <option value="1">Dừng Hoạt Động</option>
                            </select>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" id="btn_new" class="btn btn-danger px-5"
                                v-on:click="createPC()">THÊM
                                MỚI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <th class="text-center align-middle" style="background-color:#7887d4">#</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Tên Phòng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Loại Máy</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Loại Phòng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Tình Trạng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Hàng Ngang</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Hàng Dọc</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Action</th>
                            </thead>
                            <tbody>
                                <template v-for="(v, k) in list_phong_chieu">
                                    <tr>
                                        <th class="text-center align-middle">@{{ k + 1 }}</th>
                                        <th class="text-center align-middle">@{{ v.ten_phong }}</th>
                                        <th class="text-center align-middle">@{{ v.loai_may_chieu }}</th>
                                        <th class="text-center align-middle">@{{ v.loai_phong }}</th>
                                        <th class="text-center align-middle">
                                            <button v-on:click="doiTT(v)" v-if="v.tinh_trang == 1"
                                                class="btn btn-warning">Đang
                                                Hoạt
                                                Động</button>
                                            <button v-on:click="doiTT(v)" v-else class="btn btn-danger">Dừng Hoạt
                                                Động</button>
                                        </th>
                                        <th class="text-center align-middle">@{{ v.hang_ngang }}</th>
                                        <th class="text-center align-middle">@{{ v.hang_doc }}</th>
                                        <th class="text-center align-middle">
                                            <button class="btn btn-primary ms-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal" v-on:click="edit = v">Cập Nhật</button>
                                            <button class="btn btn-danger ms-2" data-bs-toggle="modal"
                                                data-bs-target="#delModal" v-on:click="del = v">Xoá Bỏ</button>
                                            <button class="btn btn-warning ms-2" data-bs-toggle="modal"
                                                data-bs-target="#createModal" v-on:click="create = v">Tạo Ghế</button>
                                            <a class="btn btn-info ms-2" v-bind:href="'/admin/ghe-chieu/'+ v.id">Ghế
                                                Chiếu</a>
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
@endsection
@section('js')
    <script>
        $(document).ready(function() {
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
                            .post('{{ Route('phongchieuData') }}', )
                            .then((res) => {
                                this.list_phong_chieu = res.data.data;
                            });
                    },
                    createPC() {
                        axios
                            .post('{{ Route('phongchieuStore') }}', this.createDS)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success !');
                                    this.loadData();
                                }
                            });
                    },
                    doiTT(payload) {
                        axios
                            .post('{{ Route('phongchieuStatus') }}', payload)
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
                            .post('{{ Route('phongchieuUpdate') }}', this.edit)
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
                            .post('{{ Route('phongchieuDelete') }}', this.del)
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
                            .post('{{ Route('gheChieuStore') }}', this.create)
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
    </script>
@endsection
