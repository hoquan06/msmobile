<div class="section small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Sản phẩm bán chạy</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                    @foreach ($sanPhamTrending as $key=>$value)
                        <div class="item">
                            <div class="product_wrap">
                                <div class="product_img">
                                    <a href="/san-pham/{{$value->slug_san_pham}}-post{{ $value->id }}">
                                        <img src="{{ $value->anh_dai_dien }}">
                                        <img class="product_hover_img" src="{{ $value->anh_dai_dien }}">
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
                                            <div class="product_rate" style="width:68%"></div>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($key>10)
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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
