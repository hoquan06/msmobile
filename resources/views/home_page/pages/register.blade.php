@extends('home_page.master')
@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng ký</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng ký</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content">
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Tạo tài khoản</h3>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" id="ho_va_ten" required="" class="form-control" placeholder="Nhập Họ Tên Của Bạn">
                                </div>
                                <div class="form-group">
                                    <input type="phone" id="so_dien_thoai" required="" class="form-control" placeholder="Nhập Số Điện Thoại">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" required="" class="form-control" placeholder="Nhập Email Của Bạn">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" id="password" placeholder="Mật Khẩu">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" id="re_password" placeholder="Nhập Lại Mật Khẩu">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="dia_chi" required="" class="form-control" placeholder="Nhập Địa Chỉ Của Bạn">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="agree" value="">
                                            <label class="form-check-label" for="agree"><span>Tôi đồng ý với <a href="">điều khoản & dịch vụ.</a></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="register" type="button" class="btn btn-fill-out btn-block">Đăng ký</button>
                                </div>
                                <div class="different_login">
                                    <span> hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Bạn đã có tài khoản? <a href="/agent/login">Đăng nhập</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    {{-- <div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="/assets_agent/js/jquery-3.6.0.min.js"></script>
        <script src="/assets_agent/js/popper.min.js"></script>
        <script src="/assets_agent/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets_agent/owlcarousel/js/owl.carousel.min.js"></script>
        <script src="/assets_agent/js/magnific-popup.min.js"></script>
        <script src="/assets_agent/js/waypoints.min.js"></script>
        <script src="/assets_agent/js/parallax.js"></script>
        <script src="/assets_agent/js/jquery.countdown.min.js"></script>
        <script src="/assets_agent/js/imagesloaded.pkgd.min.js"></script>
        <script src="/assets_agent/js/isotope.min.js"></script>
        <script src="/assets_agent/js/jquery.dd.min.js"></script>
        <script src="/assets_agent/js/slick.min.js"></script>
        <script src="/assets_agent/js/jquery.elevatezoom.js"></script>
        <script src="/assets_agent/js/scripts.js"></script>
        @jquery
        @toastr_js
        @toastr_render
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#register").click(function(e) {
                    var payload = {
                        'ho_va_ten'     : $("#ho_va_ten").val(),
                        'so_dien_thoai' : $("#so_dien_thoai").val(),
                        'email'         : $("#email").val(),
                        'password'      : $("#password").val(),
                        're_password'   : $("#re_password").val(),
                        'dia_chi'       : $("#dia_chi").val(),
                        'agree'         : $('#agree').get(0).checked,
                    };

                    console.log(payload);

                    $.ajax({
                        url     :   '/agent/register',
                        type    :   'post',
                        data    :   payload,
                        success :   function(res) {
                            if(res.status){
                                console.log(res.status);
                                toastr.success("Bạn đã đăng kí tài khoản thành công.Vui lòng kiểm tra Email để kích hoạt tài khoản!!!");
                                setTimeout(function(){
                                    $(location).attr('href','http://127.0.0.1:8000/agent/login');
                                }, 2000);
                            }
                        },
                        error   :   function(res) {
                            var danh_sach_loi = res.responseJSON.errors;
                            $.each(danh_sach_loi, function(key, value){
                                toastr.error(value[0]);
                            });
                        },
                    });
                });
            });
        </script>
    </div> --}}




