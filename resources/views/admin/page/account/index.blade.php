@extends('admin.share.master')
@section('content')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase text-danger">DANH SÁCH TÀI KHOẢN</h6>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#themTaiKhoan">Thêm Mới
                        Tài Khoản</button>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                            <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa
                                                <b>@{{ tt_xoa.ho_va_ten }}</b> này không?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="xoaTaiKhoan()" type="button" class="btn btn-primary"
                                    data-bs-dismiss="modal">Xác Nhận Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="themTaiKhoan" tabindex="-1" aria-labelledby="themTaiKhoan" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">THÊM TÀI KHOẢN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6"> <label for="" class="mb-2">Họ và Tên: </label>
                                        <input type="text" id="ho_va_ten" v-model="them_moi.ho_va_ten"
                                            class="form-control" placeholder="Nhập vào tên">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Ngày Sinh: </label>
                                        <input type="date" v-model="them_moi.ngay_sinh" id="ngay_sinh"
                                            class="form-control">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <label for="" class="mb-2">Email: </label>
                                        <input type="email" v-model="them_moi.email" id="email" class="form-control"
                                            placeholder="Nhập vào Email">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Số Điện Thoại: </label>
                                        <input type="text" v-model="them_moi.so_dien_thoai" id="so_dien_thoai"
                                            class="form-control" placeholder="Nhập vào Số Điện Thoại">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <label for="" class="mb-2">Địa Chỉ: </label>
                                        <input type="text" v-model="them_moi.dia_chi" id="dia_chi" class="form-control"
                                            placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Password: </label>
                                        <input type="text" v-model="them_moi.password" id="dia_chi"
                                            class="form-control" placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="mb-2">Block: </label>
                                        <select name="" id="block" class="form-control"
                                            v-model="them_moi.is_block">
                                            <option value="0">Block</option>
                                            <option value="1">Unblock</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="mb-2">Tình Trạng: </label>
                                        <select name="" id="e_tinh_trang" class="form-control"
                                            v-model="them_moi.tinh_trang">
                                            <option value="1">Đang Hoạt Động</option>
                                            <option value="0">Dừng Hoạt Động</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="acpUp" data-bs-dismiss="modal" class="btn btn-danger"
                                    v-on:click="themTaiKhoan()">Thêm
                                    Mới</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateTaiKhoan" tabindex="-1" aria-labelledby="updateTaiKhoan"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">UPDATE TÀI KHOẢN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6"> <label for="" class="mb-2">Họ và Tên: </label>
                                        <input type="text" id="ho_va_ten" v-model="tt_update.ho_va_ten"
                                            class="form-control" placeholder="Nhập vào tên">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Ngày Sinh: </label>
                                        <input type="date" v-model="tt_update.ngay_sinh" id="ngay_sinh"
                                            class="form-control">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <label for="" class="mb-2">Email: </label>
                                        <input type="email" v-model="tt_update.email" id="email"
                                            class="form-control" placeholder="Nhập vào Email">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Số Điện Thoại: </label>
                                        <input type="text" v-model="tt_update.so_dien_thoai" id="so_dien_thoai"
                                            class="form-control" placeholder="Nhập vào Số Điện Thoại">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <label for="" class="mb-2">Địa Chỉ: </label>
                                        <input type="text" v-model="tt_update.dia_chi" id="dia_chi"
                                            class="form-control" placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Password: </label>
                                        <input type="text" v-model="tt_update.password" id="dia_chi"
                                            class="form-control" placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="mb-2">Block: </label>
                                        <select name="" id="block" class="form-control"
                                            v-model="tt_update.is_block">
                                            <option value="0">Block</option>
                                            <option value="1">Unblock</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="mb-2">Tình Trạng: </label>
                                        <select name="" id="e_tinh_trang" class="form-control"
                                            v-model="tt_update.tinh_trang">
                                            <option value="1">Đang Hoạt Động</option>
                                            <option value="0">Dừng Hoạt Động</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="acpUp" data-bs-dismiss="modal" class="btn btn-danger"
                                    v-on:click="updateTaiKhoan()">Cập Nhật</button>
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
                                    <th class="text-center align-middle" style="background-color:#7887d4">Họ Và Tên</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Email</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Số Điện Thoại
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Is Block</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Tình Trạng</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">Action</th>
                                </thead>
                                <tbody>
                                    <template v-for="(value, key) in list_tai_khoan">
                                        <tr class="align-middle">
                                            <th class="text-center align-middle">@{{ key + 1 }}</th>
                                            <th class="text-center align-middle">@{{ value.ho_va_ten }}</th>
                                            <th class="text-center align-middle">@{{ value.email }}</th>
                                            <th class="text-center align-middle">@{{ value.so_dien_thoai }}</th>
                                            <th class="text-center align-middle">
                                                <button class="btn btn-warning" v-if="value.is_block==0"
                                                    v-on:click="doiTrangThaiBlock(value)"
                                                    style="width: 100px;">Block</button>

                                                <button class="btn btn-primary" v-else
                                                    v-on:click="doiTrangThaiBlock(value)"style="width: 100px;">Unblock</button>
                                            </th>
                                            <th class="text-center align-middle">
                                                <button class="btn btn-danger" v-if="value.tinh_trang == 0"
                                                    v-on:click="doiTrangThaiTinhTrang(value)">Dừng Hoạt
                                                    Động</button>
                                                <button class="btn btn-primary" v-on:click="doiTrangThaiTinhTrang(value)"
                                                    v-else>Đang Hoạt Động</button>
                                            </th>
                                            <th class="text-center align-middle">
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#updateTaiKhoan"
                                                    v-on:click="tt_update = Object.assign({}, value)">Cập Nhật</button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" v-on:click="tt_xoa= value">Xoá
                                                    Bỏ</button>
                                            </th>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">XOÁ PHIM</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">Bạn có chắc chắn muốn xoá phim <b class="text-danger"
                                                id="phimDel"></b>?
                                            (Yes / No)</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">No</button>
                                            <button type="button" id="acpDel" data-bs-dismiss="modal"
                                                class="btn btn-danger">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger">CHỈNH SỬA PHIM</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="text" id="e_id">
                                                <div class="col-md-3"> <label for="" class="mb-2">Tên Phim:
                                                    </label>
                                                    <input id="e_ten_phim" type="text" class="form-control"
                                                        placeholder="Nhập vào tên phim">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Slug Phim:
                                                    </label>
                                                    <input id="e_slug_phim" type="text" class="form-control"
                                                        placeholder="Nhập vào slug phim">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Hình Ảnh:
                                                    </label>
                                                    <input id="e_hinh_anh" type="text" class="form-control"
                                                        placeholder="Nhập vào link hình ảnh">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Đạo Diễn:
                                                    </label>
                                                    <input id="e_dao_dien" type="text" class="form-control"
                                                        placeholder="Nhập vào tên đạo diễn">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-3"> <label for="" class="mb-2">Diễn Viên:
                                                    </label>
                                                    <input id="e_dien_vien" type="text" class="form-control"
                                                        placeholder="Nhập vào tên diễn viên">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Thể Loại:
                                                    </label>
                                                    <input id="e_the_loai" type="text" class="form-control"
                                                        placeholder="Nhập vào thể loại">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Thời lượng:
                                                    </label>
                                                    <input id="e_thoi_luong" type="number" class="form-control"
                                                        placeholder="Nhập vào thời lượng">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Ngôn ngữ:
                                                    </label>
                                                    <input id="e_ngon_ngu" type="text" class="form-control"
                                                        placeholder="Nhập vào ngôn ngữ">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-3"> <label for="" class="mb-2">Rated:
                                                    </label>
                                                    <input id="e_rated" type="text" class="form-control"
                                                        placeholder="Nhập vào rated">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Trailer:
                                                    </label>
                                                    <input id="e_trailer" type="text" class="form-control"
                                                        placeholder="Nhập vào trailer">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Bắt Đầu:
                                                    </label>
                                                    <input id="e_bat_dau" type="date" class="form-control">
                                                </div>
                                                <div class="col-md-3"> <label for="" class="mb-2">Kết Thúc:
                                                    </label>
                                                    <input id="e_ket_thuc" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-3">
                                                    <label for="" class="mb-2">Hiển Thị: </label>
                                                    <select name="" id="e_hien_thi" class="form-control">
                                                        <option value="0">Hiển Thị</option>
                                                        <option value="1">Không Hiển Thị</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-9">
                                                    <label for="" class="mb-2">Mô tả: </label>
                                                    <textarea name="mo_ta" id="e_mo_ta" cols="20" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="aUpdate" class="btn btn-primary">Cập
                                                Nhật</button>
                                            <input type="hidden" id="id_text">
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
    <script src="/JS_Admin/account.js"></script>
@endsection
