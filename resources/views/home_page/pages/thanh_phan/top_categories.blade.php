<div class="section small_pb small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Thương hiệu hàng đầu</h2>
                </div>
                <p class="text-center leads">Top những thương hiệu hàng đầu với những sản phẩm sở hữu chức năng đột phá về công nghệ.</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12">
                <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "5"}, "991":{"items": "6"}}'>
                    @foreach ($menuCon as $key=>$value)
                        <div class="item">
                            <div class="categories_box">
                                <a href="/danh-muc/{{$value->slug_danh_muc}}-post{{ $value->id }}">
                                    <img src="{{ $value->hinh_anh }}"/>
                                    <span>{{ $value->ten_danh_muc }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
