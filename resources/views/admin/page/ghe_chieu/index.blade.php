@extends('admin.share.master')
@section('content')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase">DANH SÁCH GHẾ</h6>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <div class="card border-primary border-bottom border-3 border-0">
                    <div class="card-body">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th colspan="100%" class="bg-warning text-center align-middle">
                                        <h5 class="mt-2 text-danger"><b>MÀN CHIẾU</b></h5>
                                    </th>
                                </tr>
                                <tr style="height: 70px">
                                    <td colspan="100%"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="i in phong_chieu.hang_doc">
                                    <tr>
                                        <template v-for="j in phong_chieu.hang_ngang">
                                            <th class="text-center align-middle">
                                                <template v-for="(v, k) in list_ghe">
                                                    <template v-if="k == ((i - 1) * phong_chieu.hang_ngang + j - 1)">
                                                        <i v-on:click="doiTinhTrang(v)" v-if="v.tinh_trang == 1"
                                                            class="fa-solid fa-couch fa-2x"></i>
                                                        <i v-on:click="doiTinhTrang(v)" v-else
                                                            class="text-danger fa-solid fa-couch fa-2x"></i>
                                                        <br>
                                                        <span v-on:click="edit = v" data-bs-toggle="modal"
                                                            data-bs-target="#updateModal">
                                                            @{{ v.ten_ghe }} / @{{ v.gia_mac_dinh }}
                                                        </span>
                                                    </template>
                                                </template>
                                            </th>
                                        </template>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Giá Mặc Định</label>
                                                <input v-model="edit.gia_mac_dinh" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mt-3">
                                                <div class="col">
                                                    <label class="mb-2">Tình Trạng</label>
                                                    <select v-model="edit.tinh_trang" class="form-control">
                                                        <option value="1">Hiển Thị</option>
                                                        <option value="0">Tạm Tắt</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button v-on:click="capNhapGheChieu()" type="button" class="btn btn-primary">Cập
                                            Nhật</button>
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
    <script src="/JS_Admin/chairMovie.js"></script>
@endsection
