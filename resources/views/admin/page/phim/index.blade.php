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
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">XOÁ PHIM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Bạn có chắc chắn muốn xoá nó ? (Yes / No)</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-danger">Yes</button>
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
                                            <div class="col-md-3"> <label for="" class="mb-2">Tên Phim:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào tên phim">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Slug Phim:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào slug phim">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Hình Ảnh:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào link hình ảnh">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Đạo Diễn:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào tên đạo diễn">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3"> <label for="" class="mb-2">Diễn Viên:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào tên diễn viên">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Thể Loại:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào thể loại">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Thời lượng:
                                                </label>
                                                <input type="number" class="form-control"
                                                    placeholder="Nhập vào thời lượng">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Ngôn ngữ:
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào ngôn ngữ">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3"> <label for="" class="mb-2">Rated: </label>
                                                <input type="text" class="form-control" placeholder="Nhập vào rated">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Trailer: </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập vào trailer">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Bắt Đầu: </label>
                                                <input type="date" class="form-control">
                                            </div>
                                            <div class="col-md-3"> <label for="" class="mb-2">Kết Thúc:
                                                </label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="mb-2">Hiển Thị: </label>
                                                <select name="" id="" class="form-control">
                                                    <option value="0">Hiển Thị</option>
                                                    <option value="1">Không Hiển Thị</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <label for="" class="mb-2">Mô tả: </label>
                                                <textarea name="mo_ta" id="" cols="20" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Cập Nhật</button>
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
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('mo_ta');
            loadData();
        });

        function loadData() {
            axios
                .post('{{ Route('phimData') }}')
                .then((res) => {
                    var data = res.data.data;
                    var noi_dung = '';
                    $.each(data, function(k, v) {
                        noi_dung += '<tr>';
                        noi_dung += '<th class="text-center align-middle">' + (k + 1) + '</th>';
                        noi_dung += '<td class="text-center align-middle">' + v.ten_phim + '</td>';
                        noi_dung +=
                            '<td class="text-center align-middle"><img src="' + v.hinh_anh +
                            '"class="img-thumbnail" alt="..." style="width: 80px;">';
                        noi_dung += '</td>';
                        noi_dung += '<td class="text-center align-middle">' + v.thoi_luong + ' phút </td>';
                        noi_dung += '<td class="text-center align-middle">' + v.bat_dau + '</td>';
                        noi_dung += '<td class="text-center align-middle">' + v.the_loai + '</td>';
                        noi_dung += '<td class="text-center align-middle">' + v.rated + '</td>';
                        noi_dung += '<td class="text-center align-middle">';
                        if (v.hien_thi == 0) {
                            noi_dung +=
                                '<button class="btn btn-primary align-middle" style="width: 140px;" data-bs-toggle="modal" data-bs-target="#updateModal">Hiển Thị</button>';
                        } else {
                            noi_dung +=
                                '<button class="btn btn-secondary align-middle" data-bs-toggle="modal" data-bs-target="#updateModal">Không Hiển Thị</button>';
                        }
                        noi_dung += '</td>';

                        noi_dung += '<td class="text-center align-middle">';
                        noi_dung +=
                            '<button class="btn btn-primary align-middle me-2" data-bs-toggle="modal"  data-bs-target="#updateModal"> <i class="fa-solid fa-pen-to-square" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i>';
                        noi_dung += '</button>';
                        noi_dung +=
                            '<button class="btn btn-danger align-middle" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="fa-regular fa-trash-can" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i>';
                        noi_dung += '</button>';
                        noi_dung += '</td>';
                        noi_dung += '</tr>';
                    });
                    $("#table tbody").html(noi_dung);
                });
        };
        $('#themPhim').click(function() {
            var new_phim = {
                'ten_phim': $("#ten_phim").val(),
                'slug_phim': $("#slug_phim").val(),
                'hinh_anh': $("#hinh_anh").val(),
                'dao_dien': $("#dao_dien").val(),
                'dien_vien': $("#dien_vien").val(),
                'thoi_luong': $("#thoi_luong").val(),
                'the_loai': $("#the_loai").val(),
                'ngon_ngu': $("#ngon_ngu").val(),
                'rated': $("#rated").val(),
                'mo_ta': CKEDITOR.instances['mo_ta'].getData(),
                'trailer': $("#trailer").val(),
                'bat_dau': $("#bat_dau").val(),
                'ket_thuc': $("#ket_thuc").val(),
                'hien_thi': $("#hien_thi").val(),
            }
            axios
                // '/api/admin/phim/create
                .post('{{ Route('phimStore') }}', new_phim)
                .then((res) => {
                    if (res.data.status == true) {
                        toastr.success(res.data.message);
                        $('#themPhimModel').modal('hide');
                    }
                });
            loadData();
        });
    </script>
@endsection
