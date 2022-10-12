<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item background_bg active" data-img-src="/photos/shares/sl1.png"></div>
            <div class="carousel-item background_bg" data-img-src="/photos/shares/sl2.png"></div>
            <div class="carousel-item background_bg" data-img-src="/photos/shares/sl3.png"></div>
        </div>
        {{-- <div id="slider" class="nivoSlider">
            @for($i = 1; $i < 6; $i++)
                @php
                    $name = 'slide_' . $i;
                @endphp
                @if(isset($config->$name) && Str::length($config->$name) > 0)
                    <a href="/">
                        <img src="{{ $config->$name }}" data-thumb="{{ $config->$name }}">
                    </a>
                @endif
            @endfor
        </div> --}}
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
