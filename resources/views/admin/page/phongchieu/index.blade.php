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
                                '<td class="text-center align-middle"> <button class="btn btn-primary">Sử Dụng Được</button></td>';
                        } else {
                            noi_dung +=
                                '<td class="text-center align-middle"> <button class="btn btn-secondary" style="width: 135px;">Bảo Trì</button></td>';
                        }
                        noi_dung +=
                            '<td class="text-center align-middle"><button class="btn btn-primary align-middle me-2" data-bs-toggle="modal"data-bs-target="#updateModal"> <i class="fa-solid fa-pen-to-square"style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i></button>'
                        noi_dung +=
                            '<button class="btn btn-danger align-middle" data-bs-toggle="modal"  data-bs-target="#deleteModal"> <i class="fa-regular fa-trash-can" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i></button>'
                        noi_dung += '</td>'
                        noi_dung += '</tr>'
                    });
                    $("#table tbody").html(noi_dung);
                });
        }
    </script>
@endsection
