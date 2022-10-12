<!doctype html>
<html lang="en">

<head>
    @include('admin.shares.head')
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.shares.top')
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                @include('admin.shares.menu')
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            @yield('title')
                        </div>
                    </div>
                    @yield('content')
                </div>
                @include('admin.shares.foot')
            </div>
        </div>
    </div>
    @include('admin.shares.bot')
    @yield('js')

</body>
</html>
{{-- <div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Nav items -->
    <ul class="navbar-nav">
                                <li class="nav-item">
                <a class="nav-link" href="/admin/account/index">
                    <i class="ni ni-circle-08 text-info"></i>
                    <span class="nav-link-text">Quản lý tài khoản</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/danh-muc/index">
                    <i class="ni ni-bullet-list-67 text-danger"></i>
                    <span class="nav-link-text">Quản lý danh mục</span>
                </a>
            </li>
                            <li class="nav-item">
            <a class="nav-link" href="/admin/san-pham/index">
                <i class="ni ni-basket text-success"></i>
                <span class="nav-link-text">Quản lý sản phẩm</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/nhap-kho/index">
                <i class="ni ni-bag-17 text-warning"></i>
                <span class="nav-link-text">Quản lý nhập kho</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/hoa-don-ban-hang/index">
                <i class="ni ni-delivery-fast text-primary"></i>
                <span class="nav-link-text">Hóa đơn bán hàng</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/hoa-don-nhap-kho/thongke-hoadon">
                <i class="ni ni-chart-bar-32 text-info"></i>
                <span class="nav-link-text">Thống kê</span>
            </a>
        </li>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading p-0 text-muted">
        <span class="docs-normal">Documentation</span>
    </h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
            </a>
        </li>
    </ul>
</div> --}}
