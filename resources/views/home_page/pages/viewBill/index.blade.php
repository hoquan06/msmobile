@extends('home_page.master')

@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Chi tiết hóa đơn</h1>
                    </div>
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
                                        <th class="product-amount">Số lượng</th>
                                        <th class="product-price">Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($view as $key=>$value)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="{{ $value->anh_dai_dien }}"></a></td>
                                            <td class="product-name" data-title="Product">{{ $value->ten_san_pham }}</td>
                                            <td class="product-amount" data-title="amount">{{ $value->so_luong }}</td>
                                            <td class="product-price" data-title="Price">{{ number_format($value->don_gia) }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <th class="product-price">
                                                @foreach ($tongTien as $key=>$value)
                                                    <td class="product-price"><b>Tổng tiền:</b> {{ number_format($value->thuc_tra) }} VND</td>
                                                @endforeach
                                            </th>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
