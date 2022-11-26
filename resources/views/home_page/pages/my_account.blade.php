@extends('home_page.master')
@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Tài khoản</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Sản phẩm đã mua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Thông tin cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/agent/logout"><i class="ti-lock"></i>Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Tài khoản</h3>
                                </div>
                                <div class="card-body">
                                    <p>Từ trang tổng quan tài khoản của bạn. Bạn có thể dễ dàng kiểm tra &amp; và xem <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">các đơn đặt hàng gần đây</a>, quản lý <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">địa chỉ giao hàng và thanh toán</a> <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Đơn hàng</h3>
                                </div>
                                @if (Auth::guard('agent')->check())
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Ngày mua</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bill as $key=>$value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $value->ma_don_hang }}</td>
                                                            <td>{{ Carbon\Carbon::parse($value->created_at)-> format('H:i:s d-m-y') }}</td>
                                                            <td>{{ $value->thuc_tra }}</td>
                                                            <td><a class="btn btn-fill-out btn-sm" data-toggle="modal" data-target="#myAccount">View</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông tin cá nhân</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/agent/update-myaccount">
                                        @csrf
                                        @if (Auth::guard('agent')->check())
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Họ Và Tên <span class="required">*</span></label>
                                                    <input type="text" name="ho_va_ten" id="ho_va_ten" required="" class="form-control" value="{{ Auth::guard('agent')->user()->ho_va_ten }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Số Điện Thoại <span class="required">*</span></label>
                                                    <input type="phone" name="so_dien_thoai" id="so_dien_thoai" required="" class="form-control" value="{{ Auth::guard('agent')->user()->so_dien_thoai }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Địa Chỉ Email <span class="required">*</span></label>
                                                    <input type="email" name="email" id="email" required="" class="form-control" value="{{ Auth::guard('agent')->user()->email }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Địa Chỉ <span class="required">*</span></label>
                                                    <input type="text" name="dia_chi" id="dia_chi" required="" class="form-control" value="{{ Auth::guard('agent')->user()->dia_chi }}">
                                                </div>
                                                {{-- <div class="form-group col-md-12">
                                                    <label>Mật Khẩu Mới <span class="required">*</span></label>
                                                    <input class="form-control" name="password" type="password" id="password">
                                                </div> --}}
                                                {{-- <div class="form-group col-md-12">
                                                    <label>Mật Khẩu Mới <span class="required">*</span></label>
                                                    <input class="form-control" required="" type="password" id="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nhập Lại Mật Khẩu<span class="required">*</span></label>
                                                    <input class="form-control" required="" type="password" id="password">
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <button  class="btn btn-fill-out" type="submit" value="Submit">Cập nhật</button>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="myAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
        <div class="modal-header text-center">
          <h5 >Thông tin cá nhân</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form >
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh dại diện</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewbill as $key=>$value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->ten_san_pham }}</td>
                                        <td><img src="{{ $value->anh_dai_dien}}"></td>
                                        <td>{{ $value->so_luong }}</td>
                                        <td>{{ $value->don_gia }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


