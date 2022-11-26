@extends('admin.master')
@section('title')
    {{-- <div class="page-title-icon">
        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
    </div>
    <h3>Quản Lý Danh Mục Sản Phẩm</h3> --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Thêm Mới Danh Mục Sản Phẩm</h5>
                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $key => $value)
                            <div class="alert alert-danger" role="alert">
                                {{ $value }}
                            </div>
                        @endforeach

                    @endif --}}
                    <form autocomplete="off">
                        <div class="position-relative form-group">
                            <label>Tên Danh Mục</label>
                            <input id="ten_danh_muc" placeholder="Nhập vào tên danh mục" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label>Slug Danh Mục</label>
                            <input id="slug_danh_muc" placeholder="Nhập vào slug danh mục" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label>Hình Ảnh</label>
                            <div class="input-group">
                                <input id="hinh_anh" class="form-control" type="text">
                                <input type="button" class="btn-info lfm" data-input="hinh_anh" data-preview="holder" value="Chọn ảnh">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="position-relative form-group">
                            <label>Danh Mục Cha</label>
                            <select id="id_danh_muc_cha" class="form-control">
                                <option value=0>Đóng Sản Phẩm</option>
                                {{-- <option value="">Danh Mục Root</option>
                                    @foreach ($danh_muc_cha as $key => $value)
                                        <option value={{ $value->id }}>{{ $value->ten_danh_muc }}</option>
                                    @endforeach --}}
                            </select>
                        </div>
                        <div class="position-relative form-group">
                            <label>Tình Trạng</label>
                            <select id="is_open" class="form-control">
                                <option value=1>Đang Mở Bán</option>
                                <option value=0>Đóng Sản Phẩm</option>
                            </select>
                        </div>
                        <button class="mt-1 btn btn-primary" id="themMoiDanhMuc">Thêm Mới Danh Mục</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body text-center"><h5 class="card-title">Danh Sách Danh Mục</h5>
                    <table class="mb-0 table table-bordered" id="tableDanhMuc">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Danh Mục</th>
                                <th class="text-center">Danh Mục Cha</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap text-center">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Xóa Danh Mục Sản Phẩm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa? Điều này không thể hoàn tác.
                <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idDeleteDanhMuc" hidden>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="accpectDelete" class="btn btn-danger" data-dismiss="modal">Xóa Danh Mục</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Chỉnh Sửa Danh Mục Sản Phẩm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <input type="text" id="id_edit" hidden>
                <div class="position-relative form-group">
                    <label>Tên Danh Mục</label>
                    <input id="ten_danh_muc_edit" placeholder="Nhập vào tên danh mục" type="text" class="form-control ten_danh_muc">
                </div>
                <div class="position-relative form-group">
                    <label>Slug Danh Mục</label>
                    <input id="slug_danh_muc_edit" placeholder="Nhập vào slug danh mục" type="text" class="form-control slug_danh_muc">
                </div>
                <div class="position-relative form-group">
                    <label>Hình Ảnh</label>
                    <div class="input-group">
                        <input id="hinh_anh_edit" class="form-control" type="text">
                        <input type="button" class="btn-info lfm" data-input="hinh_anh_edit" data-preview="holder_edit" value="Chọn ảnh">
                    </div>
                    <img id="holder_edit" style="margin-top:15px;max-height:100px;">
                </div>
                <div class="position-relative form-group">
                    <label>Danh Mục Cha</label>
                    <select id="id_danh_muc_cha_edit"class="form-control">

                    </select>
                </div>
                <div class="position-relative form-group">
                    <label>Tình Trạng</label>
                    <select id="is_open_edit"class="form-control">
                        <option value=1>Đang Mở Bán</option>
                        <option value=0>Đóng Sản Phẩm</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" id="closeModalUpdate" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="accpectUpdate" class="btn btn-success">Cập Nhật Danh Mục</button>
            </div>
        </div>
        </div>
    </div>
@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('.lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function toSlug(str) {
                str = str.toLowerCase();
                str = str
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '');
                str = str.replace(/[đĐ]/g, 'd');
                str = str.replace(/([^0-9a-z-\s])/g, '');
                str = str.replace(/(\s+)/g, '-');
                str = str.replace(/-+/g, '-');
                str = str.replace(/^-+|-+$/g, '');
                return str;
            }
            function loadTable(){
                $.ajax({
                    url     :   '/admin/danh-muc-san-pham/data',
                    type    :   'get',
                    success :   function(res) {
                        var list_danh_muc = res.list;
                        var content_table = '';
                        $.each(list_danh_muc, function(key, value) {
                            if(value.ten_danh_muc_cha === null) {
                                var ten_danh_muc_cha = 'Root';
                            } else {
                                var ten_danh_muc_cha = value.ten_danh_muc_cha;
                            }
                            if(value.is_open) {
                                var class_button = 'btn-primary';
                                var text_button  = 'Đang Mở Bán';
                            } else {
                                var text_button  = 'Đóng Sản Phẩm';
                                var class_button = 'btn-danger';
                            }
                            content_table += '<tr>';
                            content_table += '<th class="text-center" scope="row">' + (key + 1) +'</th>';
                            content_table += '<td> ' + value.ten_danh_muc +' </td>';
                            content_table += '<td> ' + ten_danh_muc_cha + ' </td>';
                            content_table += '<td class="text-center">';
                            content_table += '<button data-id="'+ value.id +'" class="doiTrangThai btn '+ class_button +'">';
                            content_table +=  text_button;
                            content_table += '</button></td>';
                            content_table += '<td class="text-center">';
                            content_table += '<button class="btn btn-danger delete mr-1" data-iddelete="'+ value.id +'" data-toggle="modal" data-target="#deleteModal">Xóa</button>';
                            content_table += '<button class="btn btn-primary edit mr-1" data-idedit=' + value.id + ' data-toggle="modal" data-target="#editModal">Chỉnh sửa</button>';
                            content_table += '</td>';
                            content_table += '</tr>';
                        });
                        var list_cha = res.danh_muc_cha;
                        var content_select = '<option value="">Danh Mục Root</option>';

                        $.each(list_cha, function(key, value) {
                            content_select += '<option value=' + value.id + '>' + value.ten_danh_muc + '</option>';
                        });
                        $("#id_danh_muc_cha").html(content_select);
                        $("#id_danh_muc_cha_edit").html(content_select);
                        $("#tableDanhMuc tbody").html(content_table);
                    },
                });
            }

            loadTable();
            $("#ten_danh_muc").keyup(function(){
                var tenDanhMuc = $("#ten_danh_muc").val();
                var slugDanhMuc = toSlug(tenDanhMuc);
                $("#slug_danh_muc").val(slugDanhMuc);
                // $("#slug_danh_muc").val(toSlug($("#ten_danh_muc").val()));
            });
            $(".ten_danh_muc").keyup(function(){
                var tenDanhMuc = $(".ten_danh_muc").val();
                var slugDanhMuc = toSlug(tenDanhMuc);
                $(".slug_danh_muc").val(slugDanhMuc);
                // $("#slug_danh_muc").val(toSlug($("#ten_danh_muc").val()));
            });
            $('body').on('click','.doiTrangThai',function(){
                var idDanhMuc = $(this).data('id');
                var self = $(this);
                $.ajax({
                    url     :     '/admin/danh-muc-san-pham/doi-trang-thai/' + idDanhMuc,
                    type    :     'get',
                    success :     function(res) {
                        if(res.trangThai) {
                            toastr.success('Đã đổi trạng thái thành công!');
                            // Tình trạng mới là true
                            // loadTable();
                            if(res.tinhTrangDanhMuc == true){
                                self.html('Đang Mở Bán');
                                self.removeClass('btn-danger');
                                self.addClass('btn-primary');
                            } else {
                                self.html('Đóng Sản Phẩm');
                                self.removeClass('btn-primary');
                                self.addClass('btn-danger');
                            }
                        } else {
                            toastr.error('Vui lòng không can thiệp hệ thống!');
                        }
                    },
                });
            });

            $('body').on('click','.delete',function(){
                var getId = $(this).data('iddelete');
                $("#idDeleteDanhMuc").val(getId);
            });

            $("#accpectDelete").click(function(){
                var id = $("#idDeleteDanhMuc").val();
                $.ajax({
                    url     :   '/admin/danh-muc-san-pham/delete/' + id,
                    type    :   'get',
                    success :   function(res) {
                        if(res.status) {
                            toastr.success('Đã xóa danh mục thành công!');
                            loadTable();
                        } else {
                            toastr.error('Danh mục không tồn tại!');
                        }
                    },
                });
            });
            $('body').on('click','.edit',function(){
                var id = $(this).data('idedit');
                $.ajax({
                    url     :   '/admin/danh-muc-san-pham/edit/' + id,
                    type    :   'get',
                    success :   function(res) {
                        if(res.status) {
                            $("#ten_danh_muc_edit").val(res.data.ten_danh_muc);
                            $("#slug_danh_muc_edit").val(res.data.slug_danh_muc);
                            $("#hinh_anh_edit").val(res.data.hinh_anh);
                            $("#holder_edit").attr("src", res.data.hinh_anh);
                            $("#id_danh_muc_cha_edit").val(res.data.id_danh_muc_cha);
                            $("#is_open_edit").val(res.data.is_open);
                            $("#id_edit").val(res.data.id);
                        } else {
                            toastr.error('Danh mục sản phẩm không tồn tại!');
                            window.setTimeout(function() {
                                $('#closeModal').click();
                            }, 1000 );
                        }
                    },
                });
            });

            $("#accpectUpdate").click(function(){
                var val_ten_danh_muc    = $("#ten_danh_muc_edit").val();
                var val_slug_danh_muc   = $("#slug_danh_muc_edit").val();
                var val_hinh_anh        = $("#hinh_anh_edit").val();
                var val_id_danh_muc_cha = $("#id_danh_muc_cha_edit").val();
                var val_is_open         = $("#is_open_edit").val();
                var val_id              = $("#id_edit").val();

                var payload = {
                    'ten_danh_muc'      :   val_ten_danh_muc,
                    'slug_danh_muc'     :   val_slug_danh_muc,
                    'hinh_anh'          :   val_hinh_anh,
                    'id_danh_muc_cha'   :   val_id_danh_muc_cha,
                    'is_open'           :   val_is_open,
                    'id'                :   val_id,
                };

                // Gửi payload lên trên back-end ajax
                $.ajax({
                    url     :   '/admin/danh-muc-san-pham/update',
                    type    :   'post',
                    data    :   payload,
                    success :   function(res) {
                        if(res.status) {
                            toastr.success('Danh mục sản phẩm đã được cập nhật!');
                            $('#closeModalUpdate').click();
                            loadTable();
                            $('#holder_edit').attr('src', '');
                        }
                    },
                    error   :   function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    },
                });
            });
            $("#themMoiDanhMuc").click(function(e){
                e.preventDefault();

                var payload = {
                    'ten_danh_muc'      :   $("#ten_danh_muc").val(),
                    'slug_danh_muc'     :   $("#slug_danh_muc").val(),
                    'hinh_anh'          :   $("#hinh_anh").val(),
                    'id_danh_muc_cha'   :   $("#id_danh_muc_cha").val(),
                    'is_open'           :   $("#is_open").val(),
                };

                $.ajax({
                    url     :   '/admin/danh-muc-san-pham/index',
                    type    :   'post',
                    data    :    payload,
                    success :    function(res) {
                        toastr.success("Đã thêm mới danh mục thành công!!!");
                        loadTable();
                        // $('#createDanhMuc').trigger("reset");
                        $('#holder').attr('src', '');
                        $("#ten_danh_muc").val('');
                        $("#slug_danh_muc").val('');
                        $("#hinh_anh").val('');
                        $("#id_danh_muc_cha").val('');
                        $("#is_open").val('');
                    },
                    error   :    function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>
@endsection
