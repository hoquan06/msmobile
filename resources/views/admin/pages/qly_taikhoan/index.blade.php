@extends('admin.master')
@section('title')
@endsection

@section('content')
    <div>
        <div class="table-response">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Tài Khoản Khách Hàng</h5>
                    <table class="mb-0 table table-bordered" id="tableSanPham">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">#</th>
                                <th class="text-nowrap text-center">Họ Và Tên</th>
                                <th class="text-nowrap text-center">Số điện thoại</th>
                                <th class="text-nowrap text-center">Email</th>
                                <th class="text-nowrap text-center">Địa Chỉ</th>
                                <th class="text-nowrap text-center">Ngày tạo</th>
                                <th class="text-nowrap text-center">Tình Trạng</th>
                                <th class="text-nowrap text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap text-center">
                            @foreach ($taiKhoan as $key=>$value)
                                <tr>
                                    <td class="text-nowrap text-center">{{ $key + 1 }}</td>
                                    <td class="text-nowrap text-center">{{ $value->ho_va_ten }}</td>
                                    <td class="text-nowrap text-center">{{ $value->so_dien_thoai }}</td>
                                    <td class="text-nowrap text-center">{{ $value->email }}</td>
                                    <td class="text-nowrap text-center">{{ $value->dia_chi }}</td>
                                    <td class="text-nowrap text-center">{{ Carbon\Carbon::parse($value->created_at)-> format('H:i:s d/m/y') }}</td>
                                    <td class="text-nowrap text-center">
                                        @if ($value->is_email == 1)
                                            <button class="btn btn-success">Đã xác thực</button>
                                        @else
                                            <button class="btn btn-danger">Chưa xác thực</button>
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if ($value->is_block == 0)
                                            <button class="btn btn-primary doiTrangThai" data-id="{{ $value->id }}">Khóa</button>
                                        @else
                                            <button class="btn btn-danger doiTrangThai" data-id="{{ $value->id }}">Mở Khóa</button>
                                        @endif
                                        <button class="btn btn-info" data-id="{{ $value->id }}">Xem thông tin</button>
                                        <button class="btn btn-danger delete" data-id_delete="{{ $value->id }}" data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
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
        <h5 class="modal-title">Xóa Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            Bạn có chắc chắn muốn xóa? Điều này không thể hoàn tác.
            <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idDeleteKhachHang" hidden>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="acceptDelete" class="btn btn-danger" data-dismiss="modal">Xóa Khách Hàng Này</button>
        </div>
    </div>
    </div>
</div>
@section('js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var row;
            $(".delete").click(function(){
                row = $(this).closest('tr');
                var getId = $(this).data('id_delete');
                $("#idDeleteKhachHang").val(getId);
            });

            $("#acceptDelete").click(function(){
                var id = $("#idDeleteKhachHang").val();
                $.ajax({
                    url     :   '/admin/tai-khoan/delete/' + id,
                    type    :   'get',
                    success :   function(res) {
                        if(res.status) {
                            toastr.success('Đã xóa khách hàng thành công!');
                            row.remove();
                        } else {
                            toastr.error('Khách hàng này không tồn tại!');
                        }
                    },
                });
            });

            $(".doiTrangThai").click(function(){
                var id = $(this).data('id');
                var self = $(this);
                $.ajax({
                    url     :  '/admin/tai-khoan/doi-trang-thai/' + id,
                    type    :   'get',
                    success : function(res){
                        if(res.status){
                            toastr.success('Cập nhật thành công!!!');
                            if(res.block){
                                self.html("Mở Khóa");
                                self.removeClass("btn-primary");
                                self.addClass("btn-danger");
                            }else{
                                self.html("Khóa");
                                self.removeClass("btn-danger");
                                self.addClass("btn-primary");
                            }
                        }else{
                            toastr.error('Đã xảy ra lỗi!!!');
                        }
                    }
                });
            });
        });
    </script>
@endsection
