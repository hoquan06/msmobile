@extends('admin.master')

@section('content')
<div>
    <div class="table-response">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title text-center">Quản Lý Đơn Hàng</h5>
                <table class="mb-0 table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center">#</th>
                            <th class="text-nowrap text-center">Tên Người Đặt</th>
                            <th class="text-nowrap text-center">Địa Chỉ</th>
                            <th class="text-nowrap text-center">Mã Đơn Hàng</th>
                            <th class="text-nowrap text-center">Ngày Đặt Hàng</th>
                            <th class="text-nowrap text-center">Email</th>
                            <th class="text-nowrap text-center">Trạng Thái</th>
                            <th class="text-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach ($donHang as $key=>$value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ho_va_ten }}</td>
                                <td>{{ $value->dia_chi }}</td>
                                <td>{{ $value->ma_don_hang }}</td>
                                <td>{{ Carbon\Carbon::parse($value->created_at)->format('H:i:s d/m/y') }}</td>
                                <td>{{ $value->email }}</td>
                                <td>Đang xử lý</td>
                                <td>
                                    <button class="btn btn-success" data-id="{{ $value->id }}">Xem</button>
                                    <button class="btn btn-danger delete" data-iddelete="{{ $value->id }}" data-toggle="modal" data-target="#deleteModal">Xóa</button>
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
                var getID = $(this).data('iddelete');
                $("#idDeleteDonHang").val(getID);
            });
            $("#acceptDelete").click(function(){
                var id = $("#idDeleteDonHang").val();
                $.ajax({
                    url     : '/admin/don-hang/delete/' + id,
                    type    : 'get',
                    success : function(res){
                        if(res.status){
                            toastr.success("Đã xóa đơn hàng thành công!!!");
                            row.remove();
                        }else{
                            toastr.error("Đã xảy ra lỗi!!!");
                        }
                    },
                });
            });
        });
    </script>
@endsection

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Xóa Đơn Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            Bạn có chắc chắn muốn xóa? Điều này không thể hoàn tác.
            <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idDeleteDonHang" hidden>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="acceptDelete" class="btn btn-danger" data-dismiss="modal">Xóa Đơn Hàng Này</button>
        </div>
    </div>
    </div>
</div>
