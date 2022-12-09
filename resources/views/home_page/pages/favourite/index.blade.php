@extends('home_page.master')

@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Yêu thích</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Yêu thích</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive wishlist_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Tên sản phẩm</th>
                                        <th class="product-price">Giá bán</th>
                                        <th class="product-stock-status">Tình trạng</th>
                                        <th class="product-add-to-cart"></th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$value)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="{{ $value->anh_dai_dien }}"></a></td>
                                            <td class="product-name" data-title="Product"><a href="#">{{ $value->ten_san_pham }}</a></td>
                                            <td class="product-price" data-title="Price">{{ number_format($value->don_gia,) }}</td>
                                            <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">Đang mở bán</span></td>
                                            <td class="addToCart" data-id="{{ $value->san_pham_id }}"><a class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></td>
                                            <td class="product-remove removeFavourite" data-id="{{ $value->san_pham_id }}" data-title="Remove"><a ><i class="ti-close"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
