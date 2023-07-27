@extends('admin.share.master')
@section('content')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase text-danger">DANH SÁCH ADMIN</h6>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#themAccModal">Thêm
                        Mới</button>
                </div>
                {{-- <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
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
                                            <input class="form-control" type="text" v-model="tt_themMoi.ten_phim">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Thời Gian Bắt Đầu </label>
                                            <input class="form-control" type="date" v-model="tt_themMoi.gio_bat_dau">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Thời Gian Kết Thúc: </label>
                                            <input class="form-control" type="date" v-model="tt_themMoi.gio_ket_thuc">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Phòng Chiếu: </label>
                                            <select name="" v-model="tt_themMoi." class="form-control"
                                                id="">
                                                <option value="0">DZ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Tình Trạng : </label>
                                            <select name="" v-model="tt_themMoi.trang_thai" class="form-control"
                                                id="">
                                                <option value="0">DZ</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button v-on:click="capNhatDonVi()" type="button" class="btn btn-primary"
                                    data-bs-dismiss="modal">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="modal fade" id="themAccModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Khoản Mới</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-2">User Name</label>
                                        <input v-model="them_moi.username" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào user names">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Họ Và Tên</label>
                                        <input v-model="them_moi.ho_va_ten" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào user names">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Email</label>
                                        <input v-model="them_moi.email" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-2">Mật Khẩu</label>
                                        <input v-model="them_moi.password" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào họ và tên">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Quyền</label>
                                        <select class="form-control mb-2" v-model="them_moi.id_quyen">
                                            <option value="1">Admin</option>
                                            <option value="2">Kế Toán</option>
                                            <option value="3">Nhân Viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-2">Ngày Sinh</label>
                                        <input v-model="them_moi.ngay_sinh" type="date" class="form-control mb-2"
                                            placeholder="Nhập vào ngày sinh">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Quê Quán</label>
                                        <textarea v-model="them_moi.que_quan" rows="1" class="form-control mb-2" placeholder="Nhập vào quê quán"></textarea>
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Is Block</label>
                                        <select class="form-control mb-2" v-model="them_moi.is_block">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-2">Số Điện Thoại</label>
                                        <input v-model="them_moi.so_dien_thoai" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào số điện thoại">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Căng Cước Công Dân</label>
                                        <input v-model="them_moi.cccd" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào căng cước công dân">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Giới tính</label>
                                        <select class="form-control mb-2" v-model="them_moi.gioi_tinh">
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" v-on:click="createAdmin()">Thêm
                                    Mới</button>
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
                                    <th class="text-center align-middle" style="background-color:#7887d4">User Name</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Họ Và Tên
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Quyền
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Quê Quán</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Số Điện Thoại
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Ngày Sinh</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Giới Tính</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">CCCD</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Block</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Action</th>
                                </thead>
                                <tbody>
                                    <template v-for="(v, k) in list_admin">
                                        <tr>
                                            <th class="text-center align-middle">@{{ k + 1 }}</th>
                                            <th class="text-center align-middle">@{{ v.username }}</th>
                                            <th class="text-center align-middle">@{{ v.ho_va_ten }}</th>
                                            <th class="text-center align-middle">
                                                <div v-if="(v.id_quyen == 1)">Admin</div>
                                                <div v-else-if="(v.id_quyen == 2)">Kế Toán</div>
                                                <div v-else>Nhân Viên</div>
                                            </th>
                                            <th class="text-center align-middle">@{{ v.que_quan }}</th>
                                            <th class="text-center align-middle">
                                                @{{ v.so_dien_thoai }}
                                            </th>
                                            <th class="text-center align-middle">
                                                @{{ v.ngay_sinh }}
                                            </th>
                                            <th class="text-center align-middle">
                                                <div v-if="v.gioi_tinh == 0">Nam</div>
                                                <div v-else>Nữ</div>
                                            </th>
                                            <th class="text-center align-middle">
                                                @{{ v.cccd }}
                                            </th>
                                            <th class="text-center align-middle">
                                                <button v-on:click="changStatus(v)" v-if="v.is_block == 1"
                                                    class="btn btn-secondary" style="width: 100px">Block</button>
                                                <button v-on:click="changStatus(v)" v-else class="btn btn-danger"
                                                    style="width: 100px">Unblock</button>
                                            </th>
                                            <th class="text-center align-middle">
                                                <button data-bs-toggle="modal" v-on:click="tt_capNhat = v"
                                                    data-bs-target="#editAccModal"
                                                    class="btn btn-success me-2 text-center">Cập Nhật</button>
                                                <button class="btn btn-danger"data-bs-toggle="modal"
                                                    data-bs-target="#delAccModal" v-on:click="tt_xoa = v"
                                                    style="width: 90px">Xoá Bỏ</button>
                                            </th>
                                        </tr>
                                    </template>
                                    {{--  --}}
                                </tbody>
                            </table>

                            <div class="modal fade" id="delAccModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div
                                                class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                        <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa
                                                            <b>@{{ tt_xoa.username }}</b> này không?
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="deleteAcc()" type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editAccModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT TÀI KHOẢN</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="mb-2">User Name</label>
                                                    <input v-model="tt_capNhat.username" type="text"
                                                        class="form-control mb-2" placeholder="Nhập vào user names">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Họ Và Tên</label>
                                                    <input v-model="tt_capNhat.ho_va_ten" type="text"
                                                        class="form-control mb-2" placeholder="Nhập vào user names">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Email</label>
                                                    <input v-model="tt_capNhat.email" type="text"
                                                        class="form-control mb-2" placeholder="Nhập vào email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label class="mb-2">Mật Khẩu</label>
                                                    <input v-model="tt_capNhat.password" type="text"
                                                        class="form-control mb-2" placeholder="Nhập vào họ và tên">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Quyền</label>
                                                    <select class="form-control mb-2" v-model="tt_capNhat.id_quyen">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Kế Toán</option>
                                                        <option value="3">Nhân Viên</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label class="mb-2">Ngày Sinh</label>
                                                    <input v-model="tt_capNhat.ngay_sinh" type="date"
                                                        class="form-control mb-2" placeholder="Nhập vào ngày sinh">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Quê Quán</label>
                                                    <textarea v-model="tt_capNhat.que_quan" rows="1" class="form-control mb-2" placeholder="Nhập vào quê quán"></textarea>
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Is Block</label>
                                                    <select class="form-control mb-2" v-model="tt_capNhat.is_block">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label class="mb-2">Số Điện Thoại</label>
                                                    <input v-model="tt_capNhat.so_dien_thoai" type="text"
                                                        class="form-control mb-2" placeholder="Nhập vào số điện thoại">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Căng Cước Công Dân</label>
                                                    <input v-model="tt_capNhat.cccd" type="text"
                                                        class="form-control mb-2"
                                                        placeholder="Nhập vào căng cước công dân">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Giới tính</label>
                                                    <select class="form-control mb-2" v-model="tt_capNhat.gioi_tinh">
                                                        <option value="1">Nam</option>
                                                        <option value="0">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="updateAdmin()" type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Cập Nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    list_admin: {},
                    them_moi: {},
                    tt_xoa: {},
                    tt_capNhat: {}
                },
                created() {
                    this.loadData();
                },
                methods: {
                    loadData() {
                        axios
                            .post('{{ Route('adminData') }}')
                            .then((res) => {
                                this.list_admin = res.data.data;
                            });
                    },
                    createAdmin() {
                        axios
                            .post('{{ Route('adminStore') }}', this.them_moi)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success !');
                                    this.loadData();
                                    $("#themAccModal").modal('hide');
                                } else {
                                    toastr.error('Error !');
                                }
                            });
                    },
                    deleteAcc() {
                        axios
                            .post('{{ Route('adminDelete') }}', this.tt_xoa)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success !');
                                    this.loadData();
                                } else {
                                    toastr.error(res.data.message, 'Error !');
                                }
                            });
                    },
                    changStatus(payload) {
                        axios
                            .post('{{ Route('adminStatus') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success !');
                                    this.loadData();
                                } else {
                                    toastr.error(res.data.message, 'Error !');
                                }
                            });
                    },
                    updateAdmin() {
                        axios
                            .post('{{ Route('adminUpdate') }}', this.tt_capNhat)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success !');
                                    this.loadData();
                                    $("#editAccModal").modal('hide');
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
