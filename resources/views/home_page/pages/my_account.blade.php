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
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
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
                                    <h3>Orders</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#1234</td>
                                                    <td>March 15, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$78.00 for 1 item</td>
                                                    <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông tin cá nhân</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" name="enq" action="/agent/update-myaccount">
                                        @csrf
                                        @if (Auth::guard('agent')->check())
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Họ Và Tên <span class="required">*</span></label>
                                                    <input type="text" id="ho_va_ten" required="" class="form-control" value="{{ Auth::guard('agent')->user()->ho_va_ten }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Số Điện Thoại <span class="required">*</span></label>
                                                    <input type="phone" id="so_dien_thoai" required="" class="form-control" value="{{ Auth::guard('agent')->user()->so_dien_thoai }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Địa Chỉ Email <span class="required">*</span></label>
                                                    <input type="email" id="email" required="" class="form-control" value="{{ Auth::guard('agent')->user()->email }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Địa Chỉ <span class="required">*</span></label>
                                                    <input type="text" id="dia_chi" required="" class="form-control" value="{{ Auth::guard('agent')->user()->dia_chi }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Mật Khẩu Cũ <span class="required">*</span></label>
                                                    <input class="form-control" required="" type="password" id="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Mật Khẩu Mới <span class="required">*</span></label>
                                                    <input class="form-control" required="" type="password" id="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nhập Lại Mật Khẩu<span class="required">*</span></label>
                                                    <input class="form-control" required="" type="password" id="password">
                                                </div>
                                                <div class="col-md-12">
                                                    <button  class="btn btn-fill-out" name="submit" value="Submit">Lưu</button>
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
