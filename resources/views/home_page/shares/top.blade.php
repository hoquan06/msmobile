<header class="header_wrap">
	<div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="header_offer">
                    		<span>Miễn Phí Ship Phạm Vi Toàn Quốc</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Tải ứng dụng</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="/assets/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="/assets/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="/assets/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
    	<div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="/">
                    <img class="logo_light" src="/assets/images/logo_light.png" alt="logo">
                    <img class="logo_dark" src="/assets/images/logo_dark.png" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen">
                                        <option value="">Tất Cả Danh Mục</option>
                                        @foreach ($menuCha as $value_cha)
                                            <option value="">{{ $value_cha->ten_danh_muc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Nhập tên sản phẩm..." required="" type="text">
                            <button type="submit" class="search_btn3">Tìm Kiếm</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
                    <li><a class="nav-link cart_trigger" href="/cart"><i class="linearicons-bag2"></i><span class="amount"></a>
                    @if (Auth::guard('agent')->check())
                    <li>
                        <a href="/agent/myaccount" class="nav-link"><i class="linearicons-user"></i>
                            <span class="my-cart">
                                <span>
                                    <strong>{{ Auth::guard('agent')->user()->ho_va_ten }}</strong>
                                </span>
                            </span>
                            <li><a href="/agent/logout" class="nav-link"><i class="linearicons-exit"></i></a></li>
                        </a>
                    </li>
                    @else
                        <li class="mr-2">
                            <a href="/agent/register"><i class="lnr lnr-user"></i>
                            <span class="my-cart align-middle">Đăng ký</span>
                            </a>
                        </li>
                        <li>
                            <a href="/agent/login"><i class="lnr lnr-user"></i>
                            <span class="my-cart align-middle">Đăng nhập</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @include('home_page.shares.menu')
</header>
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
                @if (Auth::guard('agent')->check())
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input class="form-control" aria-describedby="emailHelp" value="{{ Auth::guard('agent')->user()->ho_va_ten }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input class="form-control" aria-describedby="emailHelp" value="{{ Auth::guard('agent')->user()->so_dien_thoai }}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" aria-describedby="emailHelp" value="{{ Auth::guard('agent')->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input class="form-control" aria-describedby="emailHelp" value="{{ Auth::guard('agent')->user()->dia_chi }}">
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                    </div>
                @else
                    <li class="mr-2">
                        <a href="/agent/register"><i class="lnr lnr-user"></i>
                        <span class="my-cart align-middle">Đăng ký</span>
                        </a>
                    </li>
                    <li>
                        <a href="/agent/login"><i class="lnr lnr-user"></i>
                        <span class="my-cart align-middle">Đăng nhập</span>
                        </a>
                    </li>
                @endif
            </form>
        </div>
    </div>
</div>
</div>

