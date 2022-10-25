{{-- <!doctype html>
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
</html> --}}


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        @include('admin.shares.head')
    </head>
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
        @include('admin.shares.top')
            @include('admin.shares.menu')
            <div class="app-content content ">
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <section id="dashboard-ecommerce">
                            <div class="row match-height">
                                @yield('title')
                            </div>
                            <div class="row match-height">
                                @yield('content')
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>
            @include('admin.shares.foot')
        @include('admin.shares.bot')
        @yield('js')
    </body>
</html>
