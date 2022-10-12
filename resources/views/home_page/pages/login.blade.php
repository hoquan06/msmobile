@extends('home_page.master')
@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng nhập</li>
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
                                    <h3>Đăng nhập</h3>
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
            </div>
        </div>
    </div>
@endsection
{{-- <div>
    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#login").click(function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                var payload = {
                    'email'     : email,
                    'password'  : password,
                };
                $.ajax({
                    url     :   '/agent/login',
                    data    :   payload,
                    type    :   'post',
                    success :   function(res) {
                        if(res.status == 2) {
                            toastr.success('Bạn đã login thành công!');
                            setTimeout(function(){
                                $(location).attr('href','/');
                            }, 2000);
                        } else if(res.status == 1) {
                            toastr.warning("Vui lòng kích hoạt email !!!");
                        } else {
                            toastr.error("Sai tên đăng nhập hoặc mật khẩu. Vui lòng kiểm tra lại!!!");
                        }
                    },
                    error   :   function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });

        });
    </script>
</div> --}}
