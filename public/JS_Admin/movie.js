$(document).ready(function () {
    CKEDITOR.replace('mo_ta');
    CKEDITOR.replace('e_mo_ta');
    loadData();
});

function loadData() {
    axios
        .post('/api/admin/phim/data')
        .then((res) => {
            var data = res.data.data;
            var noi_dung = '';
            $.each(data, function (k, v) {
                noi_dung += '<tr>';
                noi_dung += '<th class="text-center align-middle">' + (k + 1) + '</th>';
                noi_dung += '<td class="text-center align-middle">' + v.ten_phim + '</td>';
                noi_dung +=
                    '<td class="text-center align-middle"><img src="' + v.hinh_anh +
                    '"class="img-thumbnail" alt="..." style="width: 80px;">';
                noi_dung += '</td>';
                noi_dung += '<td class="text-center align-middle">' + v.the_loai + '</td>';
                noi_dung += '<td class="text-center align-middle">';
                if (v.hien_thi == 0) {
                    noi_dung +=
                        '<button data-id="' + v.id +
                        '" class="status btn btn-primary align-middle" style="width: 140px;" >Hiển Thị</button>';
                } else {
                    noi_dung += '<button data-id="' + v.id +
                        '" class="status btn btn-secondary align-middle" >Không Hiển Thị</button>';
                }
                noi_dung += '</td>';
                noi_dung += '<td class="text-center align-middle">';
                noi_dung +=
                    '<button data-id="' + v.id +
                    '" class="edit btn btn-primary align-middle me-2" data-bs-toggle="modal"  data-bs-target="#updateModal"> <i class="fa-solid fa-pen-to-square" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i>';
                noi_dung += '</button>';
                noi_dung +=
                    '<button data-id="' + v.id +
                    '" class="del btn btn-danger align-middle" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="fa-regular fa-trash-can" style="margin-right:0px; font-size: 1rem;vertical-align:baseline;"></i>';
                noi_dung += '</button>';
                noi_dung += '</td>';
                noi_dung += '</tr>';
            });
            $("#table tbody").html(noi_dung);
        });
};
$('#themPhim').click(function () {
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
        .post('/api/admin/phim/create', new_phim)
        .then((res) => {
            if (res.data.status == true) {
                toastr.success(res.data.message);
                $('#themPhimModel').modal('hide');
            }
        });
    loadData();
});


$("body").on('click', '.status', function () {
    // toastr.success("ID là: " + id);
    var payload = {
        'id': $(this).data('id')
    };
    axios
        .post('/api/admin/phim/status', payload)
        .then((res) => {
            if (res.data.status) {
                toastr.success(res.data.message, 'Success');
                loadData();
            } else {
                toastr.error(res.data.message, 'Error');
            }
        });
})
$("body").on('click', '.del', function () {
    var id = $(this).data('id');
    var payload = {
        'id': id,
    }
    axios
        .post('/api/admin/phim/info', payload)
        .then((res) => {
            if (res.data.status) {
                $("#phimDel").text(res.data.data.ten_phim);
                $("#id_text").val(res.data.data.id);
            } else {
                toastr.error(res.data.message, "Error");
                setTimeout(() => {
                    $('#themPhimModel').modal('hide');
                }, 500);
            }
        });

});
//
$("body").on('click', '.edit', function () {
    var id = $(this).data('id');
    var payload = {
        'id': id,
    }
    axios
        .post('/api/admin/phim/info', payload)
        .then((res) => {
            if (res.data.status) {
                $("#e_id").val(res.data.data.id);
                $("#e_ten_phim").val(res.data.data.ten_phim);
                $("#e_slug_phim").val(res.data.data.slug_phim);
                $("#e_hinh_anh").val(res.data.data.hinh_anh);
                $("#e_dao_dien").val(res.data.data.dao_dien);
                $("#e_dien_vien").val(res.data.data.dien_vien);
                $("#e_thoi_luong").val(res.data.data.thoi_luong);
                $("#e_the_loai").val(res.data.data.the_loai);
                $("#e_ngon_ngu").val(res.data.data.ngon_ngu);
                $("#e_rated").val(res.data.data.rated);
                $("#e_trailer").val(res.data.data.trailer);
                $("#e_mo_ta").val(res.data.data.mo_ta);
                $("#e_bat_dau").val(res.data.data.bat_dau);
                $("#e_ket_thuc").val(res.data.data.ket_thuc);
                $("#e_hien_thi").val(res.data.data.hien_thi);
                $("#e_mo_ta").val(res.data.data.mo_ta);
                CKEDITOR.instances.e_mo_ta.setData(res.data.data.mo_ta);
            } else {
                toastr.error(res.data.message, "Error");
                setTimeout(() => {
                    $('#themPhimModel').modal('hide');
                }, 500);
            }
        });
});
$("body").on('click', '#acpDel', function () {
    var id_check = {
        'id': $("#id_text").val(),
    };
    axios
        .post('/api/admin/phim/delete', id_check)
        .then((res) => {
            if (res.data.status) {
                toastr.success(res.data.message, 'Sucess !');
                loadData();
            } else {
                toastr.error(res.data.message, 'Error !');
            }
        });
});

$("body").on('click', '#aUpdate', function () {
    var new_phim = {
        'id': $("#e_id").val(),
        'ten_phim': $("#e_ten_phim").val(),
        'slug_phim': $("#e_slug_phim").val(),
        'hinh_anh': $("#e_hinh_anh").val(),
        'dao_dien': $("#e_dao_dien").val(),
        'dien_vien': $("#e_dien_vien").val(),
        'thoi_luong': $("#e_thoi_luong").val(),
        'the_loai': $("#e_the_loai").val(),
        'ngon_ngu': $("#e_ngon_ngu").val(),
        'rated': $("#e_rated").val(),
        'mo_ta': CKEDITOR.instances['e_mo_ta'].getData(),
        'trailer': $("#e_trailer").val(),
        'bat_dau': $("#e_bat_dau").val(),
        'ket_thuc': $("#e_ket_thuc").val(),
        'hien_thi': $("#e_hien_thi").val(),
    }
    axios
        .post('/api/admin/phim/update', new_phim)
        .then((res) => {
            if (res.data.status == true) {
                toastr.success(res.data.message);
                $('#updateModal').modal('hide');
                loadData();
            } else {
                toastr.error(res.data.message)
            }
        });
});
