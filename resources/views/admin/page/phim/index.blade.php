@extends('admin.share.master')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase text-danger">DANH SÁCH PHIM</h6>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#themPhimModel">Thêm Mới
                    Phim</button>
            </div>
            <div class="modal fade" id="themPhimModel" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title fs-3">THÊM MỚI PHIM</div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-3"> <label for="" class="mb-2">Tên Phim: </label>
                                    <input type="text" id="ten_phim" class="form-control"
                                        placeholder="Nhập vào tên phim">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Slug Phim: </label>
                                    <input type="text" id="slug_phim" class="form-control"
                                        placeholder="Nhập vào slug phim">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Hình Ảnh: </label>
                                    <input type="text" id="hinh_anh" class="form-control"
                                        placeholder="Nhập vào link hình ảnh">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Đạo Diễn: </label>
                                    <input type="text" id="dao_dien" class="form-control"
                                        placeholder="Nhập vào tên đạo diễn">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3"> <label for="" class="mb-2">Diễn Viên: </label>
                                    <input type="text" id="dien_vien" class="form-control"
                                        placeholder="Nhập vào tên diễn viên">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Thể Loại: </label>
                                    <input type="text" id="the_loai" class="form-control"
                                        placeholder="Nhập vào thể loại">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Thời lượng: </label>
                                    <input type="number" id="thoi_luong" class="form-control"
                                        placeholder="Nhập vào thời lượng">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Ngôn ngữ: </label>
                                    <input type="text" id="ngon_ngu" class="form-control"
                                        placeholder="Nhập vào ngôn ngữ">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3"> <label for="" class="mb-2">Rated: </label>
                                    <input type="text" id="rated" class="form-control" placeholder="Nhập vào rated">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Trailer: </label>
                                    <input type="text" id="trailer" class="form-control"
                                        placeholder="Nhập vào trailer">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Bắt Đầu: </label>
                                    <input type="date" id="bat_dau" class="form-control">
                                </div>
                                <div class="col-md-3"> <label for="" class="mb-2">Kết Thúc: </label>
                                    <input type="date" id="ket_thuc" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label for="" class="mb-2">Hiển Thị: </label>
                                    <select name="" id="hien_thi" class="form-control">
                                        <option value="0">Hiển Thị</option>
                                        <option value="1">Không Hiển Thị</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <label for="" class="mb-2">Mô tả: </label>
                                    <textarea name="mo_ta" id="mo_ta" cols="20" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="themPhim" class="btn btn-primary">Thêm Phim</button>
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
                                <th class="text-center align-middle" style="background-color:#7887d4">Hình Ảnh</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Thời Lượng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Ngôn Ngữ</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Thể Loại</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Rated</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Hiển Thị</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Action</th>
                            </thead>
                            <tbody>
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
                                            <div class="col-md-3"> <label for="" class="mb-2">Rated: </label>
                                                <input id="e_rated" type="text" class="form-control"
                                                    placeholder="Nhập vào rated">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Trailer: </label>
                                                <input id="e_trailer" type="text" class="form-control"
                                                    placeholder="Nhập vào trailer">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Bắt Đầu: </label>
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
                                        <button type="button" id="aUpdate" class="btn btn-primary">Cập Nhật</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="/JS_Admin/movie.js"></script>
@endsection
