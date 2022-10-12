<div class="bottom_header dark_skin main_menu_uppercase border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                <div class="categories_wrap">
                    <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                        <span>Tất Cả Danh Mục </span><i class="linearicons-menu"></i>
                    </button>
                    <div id="navCatContent" class="navbar collapse">
                        <ul>
                            @foreach ($menuCha as $value_cha)
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" data-toggle="dropdown" href="/danh-muc/{{$value_cha->slug_danh_muc}}-post{{ $value_cha->id }}">{{ $value_cha->ten_danh_muc }}</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach ($menuCon as $value_con)
                                                @if($value_con->id_danh_muc_cha == $value_cha->id)
                                                    <li>
                                                        <a class="dropdown-item nav-link nav_item" href="/danh-muc/{{ $value_con->id }}">{{ $value_con->ten_danh_muc }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="more_categories">Xem Thêm...</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="pr_search_icon">
                        <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                    </div>
                    <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                        <ul class="navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-item nav-link nav_item" href="/">Trang Chủ</a>
                            </li>
                            @foreach ($menuCha as $value_cha)
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="/danh-muc/{{$value_cha->slug_danh_muc}}-post{{ $value_cha->id }}">{{ $value_cha->ten_danh_muc }}</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach ($menuCon as $value_con)
                                            @if($value_con->id_danh_muc_cha == $value_cha->id)
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item" href="/danh-muc/{{ $value_con->id }}">{{ $value_con->ten_danh_muc }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                            <li><a class="nav-link nav_item" href="contact.html">Liên Hệ</a></li>
                        </ul>
                    </div>
                    <div class="contact_phone contact_support">
                        <i class="linearicons-phone-wave"></i>
                        <span>+84 905 68 68 68</span>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
