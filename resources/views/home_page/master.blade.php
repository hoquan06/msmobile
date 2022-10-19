<!DOCTYPE html>
<html lang="en">
<head>
    @include('home_page.shares.header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
</head>
<body>
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    @include('home_page.shares.top')
    @yield('content')
    {{-- @include('home_page.pages.thanh_phan.slide') --}}

    <div class="main_content">
        {{-- @include('home_page.pages.thanh_phan.slide_below')
        @include('home_page.pages.thanh_phan.top_categories')
        @include('home_page.pages.thanh_phan.exclusive_products')
        @include('home_page.pages.thanh_phan.trending_product')
        @include('home_page.pages.thanh_phan.latest_news')
        @include('home_page.pages.thanh_phan.logo')
        @include('home_page.pages.thanh_phan.contact') --}}
    </div>
    @include('home_page.shares.footer')
    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    @include('home_page.shares.bottom')
    @jquery
    @toastr_js
    @toastr_render
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @yield('js')
    <script>
        $(document).ready(function() {
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
                            toastr.success('Bạn đã đăng nhập thành công!');
                            setTimeout(function(){
                                $(location).attr('href','/');;
                            }, 2000);
                        } else if(res.status == 1) {
                            toastr.warning("Bạn cần phải kích hoạt email");
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
                $.ajax({
                    url     :   '/agent/register',
                    type    :   'post',
                    data    :   payload,
                    success :   function(res) {
                        if(res.status){
                            console.log(res.status);
                            toastr.success("Bạn đã đăng kí tài khoản thành công.Vui lòng kiểm tra Email để kích hoạt tài khoản!!!");
                            setTimeout(function(){
                                $(location).attr('href','/agent/login');
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

            $("#registerEmail").click(function(e){
                var payload = {
                    'email' :   $("#emailSubscribe").val(),
                };
                axios
                    .post('/subscribe', payload)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success("Bạn đã đăng ký thông tin thành công!");
                        }
                    });
            });
            $(".addToCart").click(function(){
                var san_pham_id = $(this).data('id');
                var payload = {
                    'san_pham_id'   : san_pham_id,
                    'so_luong'      : 1,
                };
                axios
                    .post('/add-to-cart', payload)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success("Đã thêm vào giỏ hàng!");
                        } else {
                            toastr.error("Bạn cần đăng nhập trước!");
                        }
                    })
                    .catch((res) => {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    });
                // {
                //     $.ajax({
                //     url     :   '/add-to-cart',
                //     type    :   'post',
                //     data    :   payload,
                //     success :   function(res) {
                //         if(res.data.status) {
                //             toastr.success("Đã thêm vào giỏ hàng!");
                //         } else {
                //             toastr.error("Bạn cần đăng nhập trước!");
                //         }
                //     },
                //     error   :   function(res) {
                //         var danh_sach_loi = res.responseJSON.errors;
                //         $.each(danh_sach_loi, function(key, value){
                //             toastr.error(value[0]);
                //         });
                //     },
                //     });
                // }
            });
        });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6343f6b254f06e12d89952fd/1gf0nnbdb';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
