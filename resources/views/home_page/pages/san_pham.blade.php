@extends('home_page.master')

@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Danh Sách Sản Phẩm</h1>
                    </div>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="order">Mặc định</option>
                                            <option value="price">Giá: Từ thấp đến cao</option>
                                            <option value="price-desc">Giá: Từ cao xuống thấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container loadmore" data-item="8" data-item-show="4" data-finish-message="No More Item to Show" data-btn="Load More">
                        @foreach ($sanPham as $key=>$value)
                            <div class="col-lg-3 col-md-4 col-6 grid_item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="/san-pham/{{$value->slug_san_pham}}-post{{ $value->id }}">
                                            <img src="{{ $value->anh_dai_dien }}" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                @if (Auth::guard('agent')->check())
                                                    <li class="addToCart" data-id="{{ $value->id }}"><a class="icon-basket-loaded"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                @else
                                                    <li class="addToCart" data-toggle="modal" data-target="#myModal"><a class="icon-basket-loaded"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                @endif
                                                {{-- <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li> --}}
                                                @if (Auth::guard('agent')->check())
                                                    <li><a class="addFavourite" data-id="{{ $value->id }}"><i class="icon-heart"></i></a></li>
                                                @else
                                                    <li><a class="addFavourite" data-toggle="modal" data-target="#myModal"><i class="icon-heart"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{ $value->id }}">{{ $value->ten_san_pham }}</a></h6>
                                        <div class="product_price">
                                            <span class="price">{{ number_format($value->gia_khuyen_mai, 0) }}</span>
                                            <del>{{ number_format($value->gia_ban, 0) }}</del>
                                            <div class="on_sale">
                                                <span class="symbol-percent">{{ number_format(($value->gia_ban - $value->gia_khuyen_mai) / $value->gia_ban * 100, 0 )}}%</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                        </div>
                                        <div class="pr_desc">
                                            <p>{{ $value->mo_ta_ngan }}</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                        <div class="list_product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                @if (Auth::guard('agent')->check())
                                                    <li class="add-to-cart addToCart" data-id="{{ $value->id }}"><a class="icon-basket-loaded"> Thêm vào giỏ hàng</a></li>
                                                @else
                                                    <li class="add-to-cart addToCart" data-toggle="modal" data-target="#myModal"><a class="icon-basket-loaded"> Thêm vào giỏ hàng</a></li>
                                                @endif
                                                {{-- <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li> --}}
                                                @if (Auth::guard('agent')->check())
                                                    <li><a class="addFavourite" data-id="{{ $value->id }}"><i class="icon-heart"></i></a></li>
                                                @else
                                                    <li><a class="addFavourite" data-toggle="modal" data-target="#myModal"><i class="icon-heart"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" >
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body text-center">
            <div class="alert alert-success text-center" role="alert">
                Bạn phải đăng nhập để mua sản phẩm!!!
            </div>
            <form method="post">
                <div class="form-group">
                    <input type="email" id="email" required="" class="form-control" placeholder="Nhập Email Của Bạn">
                </div>
                <div class="form-group">
                    <input class="form-control" required="" type="password" id="password" placeholder="Mật Khẩu">
                </div>
                <div class="form-group">
                    <button id="login" type="button" class="btn btn-fill-out btn-block">Đăng nhập</button>
                </div>
                <div class="different_login">
                    <span> hoặc</span>
                </div>
                <ul class="btn-login list_none text-center">
                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                </ul>
                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="/agent/register">Đăng ký</a></div>
            </form>
        </div>
    </div>
</div>
</div>

