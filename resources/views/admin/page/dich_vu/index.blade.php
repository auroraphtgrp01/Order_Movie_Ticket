@extends('admin.share.master')
@section('content')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase text-danger">DANH SÁCH DỊCH VỤ</h6>
            </div>
            <div class="ms-auto">
                <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả Dịch Vụ</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-wrap">
                                    @{{ tt.mo_ta }}
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                        <input type="text" id="ho_va_ten" class="form-control"
                                            placeholder="Nhập vào tên">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Ngày Sinh: </label>
                                        <input type="date" id="ngay_sinh" class="form-control">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <label for="" class="mb-2">Email: </label>
                                        <input type="email" id="email" class="form-control"
                                            placeholder="Nhập vào Email">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Số Điện Thoại: </label>
                                        <input type="text" id="so_dien_thoai" class="form-control"
                                            placeholder="Nhập vào Số Điện Thoại">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <label for="" class="mb-2">Địa Chỉ: </label>
                                        <input type="text" id="dia_chi" class="form-control"
                                            placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-6"> <label for="" class="mb-2">Password: </label>
                                        <input type="text" id="dia_chi" class="form-control"
                                            placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="mb-2">Block: </label>
                                        <select name="" id="block" class="form-control">
                                            <option value="0">Block</option>
                                            <option value="1">Unblock</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="mb-2">Tình Trạng: </label>
                                        <select name="" id="e_tinh_trang" class="form-control">
                                            <option value="1">Đang Hoạt Động</option>
                                            <option value="0">Dừng Hoạt Động</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="acpUp" data-bs-dismiss="modal" class="btn btn-danger">Cập
                                    Nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Dịch Vụ</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input v-model="tt_cap_nhat.id" type="hidden" class="form-control mb-2">
                                <label class="mb-2">Tên Dịch Vụ</label>
                                <input v-model="tt_cap_nhat.ten_dich_vu" type="text" class="form-control mb-2"
                                    placeholder="Nhập vào tên dịch vụ">
                                <label class="mb-2">Mô Tả</label>
                                <textarea v-model="tt_cap_nhat.mo_ta" cols="30" rows="5" class="form-control mb-2"></textarea>
                                <label class="mb-2">Giá Bán</label>
                                <input v-model="tt_cap_nhat.gia_ban" type="number" class="form-control mb-2"
                                    placeholder="Nhập vào giá bán">
                                <label class="mb-2">Hình Ảnh</label>
                                <input v-model="tt_cap_nhat.hinh_anh" type="text" class="form-control mb-2"
                                    placeholder="Nhập vào hình ảnh">
                                <label class="mb-2">Đơn Vị</label>
                                <select v-model="tt_cap_nhat.id_don_vi" class="form-control mb-2">
                                    @foreach ($don_vi as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->ten_don_vi }}</option>
                                    @endforeach
                                </select>
                                <label class="mb-2">Tình Trạng</label>
                                <select v-model="tt_cap_nhat.tinh_trang" class="form-control mb-2">
                                    <option value="1">Còn Kinh Doanh</option>
                                    <option value="0">Dừng Kinh Doanh</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button v-on:click="updateTT()" type="button" class="btn btn-primary">Cập
                                    Nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row mt-3">
            <div class="col-4">
                <div class="card border-primary border-bottom border-3 border-0">
                    <div class="card-header mt-2">
                        <h6>Thêm Mới Dịch Vụ</h6>
                    </div>
                    <div class="card-body">
                        <label class="mb-2">Tên Dịch Vụ</label>
                        <input type="text" v-model="themMoi.ten_dich_vu" class="form-control mb-2"
                            placeholder="Nhập vào tên dịch vụ">
                        <label class="mb-2">Mô Tả</label>
                        <textarea cols="30" v-model="themMoi.mo_ta" rows="5" class="form-control mb-2"></textarea>
                        <label class="mb-2">Giá Bán</label>
                        <input type="number" v-model="themMoi.gia_ban" class="form-control mb-2"
                            placeholder="Nhập vào giá bán">
                        <label class="mb-2">Hình Ảnh</label>
                        <input type="text" v-model="themMoi.hinh_anh" class="form-control mb-2"
                            placeholder="Nhập vào hình ảnh">
                        <label class="mb-2">Đơn Vị</label>
                        <select v-model="themMoi.id_don_vi" class="form-control mb-2">
                            @foreach ($don_vi as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->ten_don_vi }}</option>
                            @endforeach
                        </select>
                        <label class="mb-2">Tình Trạng</label>
                        <select v-model="themMoi.tinh_trang" class="form-control mb-2">
                            <option value="1">Còn Kinh Doanh</option>
                            <option value="0">Dừng Kinh Doanh</option>
                        </select>
                    </div>
                    <div class="card-footer text-end">
                        <button v-on:click="themDichVu()" class="btn btn-primary">Thêm Dịch Vụ</button>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card border-top border-0 border-4 border-danger">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        #</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Tên Dịch Vụ</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Hình Ảnh</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Đơn Giá
                                    </th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Đơn Vị</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Mô Tả</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Tình Trạng</th>
                                    <th class="text-center align-middle" style="background-color:#7887d4">
                                        Action</th>
                                </thead>
                                <tbody>
                                    <template v-for="(v, k) in list_dich_vu">
                                        <tr>
                                            <th class="text-center align-middle">
                                                @{{ k + 1 }}
                                            </th>
                                            <th class="text-center align-middle">
                                                @{{ v.ten_dich_vu }}
                                            </th>
                                            <th class="text-center align-middle">
                                                <img v-bind:src="v.hinh_anh" class="img-thumbnail" alt="..."
                                                    style="width: 100px;">
                                            </th>
                                            <th class="text-center align-middle">
                                                @{{ format(v.gia_ban) }}
                                            </th>
                                            <th class="text-center align-middle">
                                                @{{ v.ten_don_vi }}
                                            </th>
                                            <th class="text-center align-middle">
                                                <i data-bs-toggle="modal" v-on:click="tt = v"
                                                    data-bs-target="#detailModal"
                                                    class="fa-solid text-success fa-circle-info fa-2x "></i>
                                            </th>
                                            <th class="text-center align-middle">
                                                <button v-on:click="doiTT(v)" v-if="v.tinh_trang == 1"
                                                    class="btn btn-primary">Đang Kinh
                                                    Doanh</button>
                                                <button v-on:click="doiTT(v)" v-else class="btn btn-danger">Dừng Kinh
                                                    Doanh</button>
                                            </th>
                                            <th class="text-center align-middle">
                                                <button data-bs-toggle="modal" v-on:click="tt_cap_nhat = v"
                                                    data-bs-target="#editModal" class="btn btn-info m-1">
                                                    <i style="margin-right: 0px !important"
                                                        class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button data-bs-toggle="modal" v-on:click="tt = v"
                                                    data-bs-target="#deleteModal" class="btn btn-danger m-1">
                                                    <i data-bs-toggle="modal" style="margin-right: 0px !important"
                                                        class="fa-solid fa-trash"></i>
                                                </button>
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
                                            <h5 class="modal-title" id="exampleModalLabel">XOÁ DỊCH VỤ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">Bạn có chắc chắn muốn dịch vụ <b
                                                class="text-danger">@{{ tt.ten_dich_vu }}</b>?
                                            (Yes / No)</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">No</button>
                                            <button v-on:click="deleteTT()" type="button" data-bs-dismiss="modal"
                                                class="btn btn-danger">Yes</button>
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
    <script src="/JS_Admin/services.js"></script>
@endsection
