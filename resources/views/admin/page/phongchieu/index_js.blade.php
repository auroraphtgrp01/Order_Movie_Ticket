@extends('admin.share.master')
@section('content')
    <div class="row">
        <div class="col-4">
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
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-microphone"></i></span>
                                <input type="text" class="form-control border-start-0" id="tenPhong"
                                    placeholder="Tên phòng">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Loại Máy: </label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-message"></i></span>
                                <input type="text" class="form-control border-start-0" id="loaiMay"
                                    placeholder="Loại máy">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName1" class="form-label">Hàng Ngang</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-user"></i></span>
                                <input type="text" class="form-control border-start-0" id="hangNgang"
                                    placeholder="Hàng ngang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName2" class="form-label">Hàng Dọc</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-user"></i></span>
                                <input type="text" class="form-control border-start-0" id="hangDoc"
                                    placeholder="Hàng dọc">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Loại Phòng: </label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class="bx bxs-lock-open"></i></span>
                                <input type="text" class="form-control border-start-0" id="loaiPhong"
                                    placeholder="Loại phòng">
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="hidden" id="id_check">
                            <label for="inputAddress3" class="form-label">Tình Trạng</label>
                            <select name="" id="tinhTrang" class="form-control">
                                <option value="0">Sử Dụng</option>
                                <option value="1">Bảo Trì</option>
                            </select>
                        </div>

                        <div class="col-12 text-end">
                            <button type="button" id="btn_new" class="btn btn-danger px-5">THÊM MỚI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">XOÁ PHÒNG CHIẾU ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Bạn có chắc chắn muốn xoá phim <b class="text-danger" id="phimDel"></b>?
                            (Yes / No)</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <button type="button" id="acpDel" data-bs-dismiss="modal"
                                class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">TẠO GHẾ CHO PHÒNG ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <input type="hidden" name="", id="id_phong_can_tao_ghe">
                        <div class="modal-body text-center">Bạn có chắc chắn muốn tạo <b class="text-danger"
                                id="tong_ghe">xx</b> ghế. <br>
                            Bao gồm <b class="text-danger" id="ghe_hang_ngang"></b> hàng
                            ngang và <b class="text-danger" id="ghe_hang_doc"></b> hàng dọc?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <button type="button" id="tao_ghe" data-bs-dismiss="modal"
                                class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" id="e_id" type="hidden">
                            <h5 class="modal-title" id="exampleModalLabel">CHỈNH SỬA PHÒNG CHIẾU</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6"> <label for="" class="mb-2">Tên Phòng: </label>
                                    <input type="text" id="e_ten_phong" class="form-control"
                                        placeholder="Nhập vào tên phòng">
                                </div>
                                <div class="col-md-6"> <label for="" class="mb-2">Loại Máy: </label>
                                    <input type="text" id="e_loai_may" class="form-control"
                                        placeholder="Nhập vào loại máy">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"> <label for="" class="mb-2">Hàng Ngang: </label>
                                    <input type="text" id="e_hang_ngang" class="form-control"
                                        placeholder="Nhập vào tên hàng ngang">
                                </div>
                                <div class="col-md-6"> <label for="" class="mb-2">Hàng Dọc: </label>
                                    <input type="text" id="e_hang_doc" class="form-control"
                                        placeholder="Nhập vào hàng dọc">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"> <label for="" class="mb-2">Loại Phòng: </label>
                                    <input type="text" id="e_loai_phong" class="form-control"
                                        placeholder="Nhập vào loại phòng">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="mb-2">Tình Trạng: </label>
                                    <select name="" id="e_tinh_trang" class="form-control">
                                        <option value="0">Sử Dụng Được</option>
                                        <option value="1">Bảo Trì</option>
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
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <th class="text-center align-middle" style="background-color:#7887d4">#</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Tên Phòng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Loại Máy</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Hàng Ngang</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Hàng Dọc</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Loại Phòng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Tình Trạng</th>
                                <th class="text-center align-middle" style="background-color:#7887d4">Action</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
    <script>
        $(document).ready(function() {
            loadData();
        });
        $('#btn_new').click(function() {
            var new_room = {
                'ten_phong': $("#tenPhong").val(),
                'loai_may': $("#loaiMay").val(),
                'hang_ngang': $("#hangNgang").val(),
                'hang_doc': $("#hangDoc").val(),
                'tinh_trang': $("#tinhTrang").val(),
                'loai_phong': $("#loaiPhong").val(),
            }
            axios
                .post('{{ Route('phongchieuStore') }}', new_room)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message);
                    }
                });
            loadData();
        });

        function loadData() {

            axios
                .post('{{ Route('phongchieuData') }}')
                .then((res) => {
                    var data = res.data.data;
                    var noi_dung = '';
                    $.each(data, function(k, v) {
                        noi_dung += '<tr>'
                        noi_dung += '<th class="text-center align-middle">' + (k + 1) + '</th>'
                        noi_dung += '<td class="text-center align-middle">' + v.ten_phong + '</td>'
                        noi_dung += '<td class="text-center align-middle">' + v.loai_may + '</td>'
                        noi_dung += '<td class="text-center align-middle">' + v.hang_ngang + '</td>'
                        noi_dung += '<td class="text-center align-middle">' + v.hang_doc + '</td>'
                        noi_dung += '<td class="text-center align-middle">' + v.loai_phong + '</td>'
                        if (v.tinh_trang == 0) {
                            noi_dung +=
                                '<td class="text-center align-middle"> <button data-btn="' + v.id +
                                '" class="status btn btn-primary">Sử Dụng Được</button></td>';
                        } else {
                            noi_dung +=
                                '<td class="text-center align-middle"> <button data-btn="' + v.id +
                                '" class="status btn btn-secondary" style="width: 135px;">Bảo Trì</button></td>';
                        }
                        noi_dung +=
                            '<td class="text-center align-middle"><button  data-id ="' + v.id +
                            '" class="edit_btn btn btn-primary align-middle me-2" data-bs-toggle="modal"data-bs-target="#updateModal"> <i class="fa-solid fa-pen-to-square"style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i></button>'
                        noi_dung +=
                            '<button class="dele_btn btn btn-danger align-middle" data-id="' + v.id +
                            '" data-bs-toggle="modal"  data-bs-target="#deleteModal"> <i class="fa-regular fa-trash-can" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i></button>'
                        noi_dung +=
                            '<a href="/admin/ghe-chieu/' + v.id +
                            '" class="btn btn-info ms-2 align-middle"> <i class="fa-regular fa-trash-can" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i></a>'
                        noi_dung +=
                            '<button data-id ="' + v.id +
                            '" class="create btn btn-success ms-2 align-middle" data-bs-toggle="modal"data-bs-target="#createModal"> <i class="fa-regular fa-trash-can" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i></button>'
                        noi_dung += '</td>'
                        noi_dung += '</tr>'
                    });
                    $("#table tbody").html(noi_dung);
                });

        }
        $("body").on('click', '.status', function() {
            var id = {
                'id': $(this).data('btn'),
            }
            axios
                .post('{{ Route('phongchieuStatus') }}', id)
                .then((res) => {
                    if (res.data.status == 1) {
                        toastr.success(res.data.message, "Success");
                        loadData();
                    } else {
                        toastr.error(res.data.message, "Error");
                    }
                });
            // toastr.success(id);

        });
        $("body").on('click', '.dele_btn', function() {
            var payload = {
                'id': $(this).data('idbtn'),
            };
            axios
                .post('{{ Route('phongchieuInfo') }}', payload)
                .then((res) => {
                    if (res.data.status == 1) {
                        $("#id_check").val(res.data.data.id);
                        $("#phimDel").text(res.data.data.ten_phong);
                        loadData();
                    } else {
                        toastr.error(res.data.message, "Error");
                    }
                });
        });
        $("body").on('click', '#acpDel', function() {
            var payload = {
                'id': $("#id_check").val(),
            };
            axios
                .post('{{ Route('phongchieuDelete') }}', payload)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, "Success !");
                        loadData();
                    } else {
                        toastr.error(res.data.message, "Error !");

                    }
                });
        })
        $("#tao_ghe").click(function() {
            var id = $("#id_phong_can_tao_ghe").val();
            var payload = {
                'id': id,
            };
            axios
                .post('{{ Route('gheChieuStore') }}', payload)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message, 'Success');
                    } else {
                        toastr.error(res.data.message, 'Error');
                    }
                });
        });

        $("body").on('click', '.edit_btn', function() {
            var id1 = $(this).data('id');
            payload = {
                'id': id1,
            };
            axios
                .post('{{ Route('phongchieuInfo') }}', payload)
                .then((res) => {
                    if (res.data.status) {
                        $("#e_id").val(res.data.data.id);
                        $("#e_ten_phong").val(res.data.data.ten_phong);
                        $("#e_loai_may").val(res.data.data.loai_may);
                        $("#e_hang_ngang").val(res.data.data.hang_ngang);
                        $("#e_hang_doc").val(res.data.data.hang_doc);
                        $("#e_loai_phong").val(res.data.data.loai_phong);
                        $("#e_tinh_trang").val(res.data.data.tinh_trang);
                    }
                });
        });
        $("body").on('click', '#acpUp', function() {
            var new_room = {
                'id': $("#e_id").val(),
                'ten_phong': $("#e_ten_phong").val(),
                'loai_may': $("#e_loai_may").val(),
                'hang_ngang': $("#e_hang_ngang").val(),
                'hang_doc': $("#e_hang_doc").val(),
                'tinh_trang': $("#e_tinh_trang").val(),
                'loai_phong': $("#e_loai_phong").val(),
            }
            console.log(new_room);

            axios
                .post('{{ Route('phongchieuUpdate') }}', new_room)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message);
                        loadData();
                    } else {
                        toastr.error(res.data.message)
                    }
                });
        });
        $("body").on('click', '.create', function() {
            var id = $(this).data('id');
            var payload = {
                'id': id,
            };
            axios
                .post('{{ Route('phongchieuInfo') }}', payload)
                .then((res) => {
                    if (res.data.status) {
                        var tong_ghe = res.data.data.hang_doc * res.data.data.hang_ngang;
                        $("#tong_ghe").text(tong_ghe);
                        $("#ghe_hang_ngang").text(res.data.data.hang_ngang);
                        $("#ghe_hang_doc").text(res.data.data.hang_doc);
                        $("#id_phong_can_tao_ghe").val(res.data.data.id);
                    } else {
                        toastr.error(res.data.message, Error);
                        setTimeout(() => {
                            $('#createModal').modal('hide');
                        }, 500);
                    }
                });
        });
    </script>
@endsection
