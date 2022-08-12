<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutStock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js" integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<link rel="stylesheet" href="{{asset('client/css/client.css')}}">
</head>
<style>
    .dropbtn {
      color: white;
      border: none;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 0px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #ddd;}
    
    .dropdown:hover .dropdown-content {display: block;}
    
    </style>
<body id="offset_top">
    <header>
        <!-- -------- -->
        <!-- -------------------------- -->
        <div class="main_header">
            <div class="header_top">
                <div class="logo">
                    <a href="{{Route('client.home')}}"><img src="{{asset('/images/logo.png')}}" alt="" /></a>
                </div>
                <div class="nav">
                    <nav>
                        <ul class="main_father">
                            <li><a href="{{Route('client.home')}}">Trang chủ</a></li>
                            <li>
                                <a href="{{Route('client.shop')}}">Sản phẩm</a>
                            </li>
                            <li><a href="">Liện hệ</a></li>
                            <li><a href="">Bán chạy</a></li>
                            <li><a href="">Về chúng tôi</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="user">

                    @if (Auth::check())
                    <div class="dropdown">
                        <img width="40px" class="dropbtn" height="40px" src="{{asset(Auth::user()->avt)}}" alt="">
                                <div class="dropdown-content">
                                  <a href="{{Route('client.order.manage_order')}}">Quản lý đơn hàng</a>
                                  <a href="{{Route('client.cart.index')}}">Giỏ hàng</i></a>
                                  <a href="{{Route('auth.logout')}}">Đăng xuất</a>
                                </div>
                              </div>
                    @else
                    <a href="{{Route('auth.login')}}">Đăng Nhập</a> / <a href="{{Route('auth.register')}}">Đăng ký</a>
                    @endif

                </div>
            </div>
        </div>

    </header>
    <main>
        @yield('content')
    </main>
   

</body>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</body><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer">
</script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('client/js/client.js')}}"></script>

</html>
