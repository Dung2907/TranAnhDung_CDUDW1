<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang chủ</title>
   <link rel="stylesheet" href={{asset('bootstrap/css/bootstrap.min.css')}}>
   <link rel="stylesheet" href={{asset('fontawesome/css/all.min.css')}}>
   <link rel="stylesheet" href={{asset('css/frontend.css')}}>
   <script src={{asset('bootstrap/js/bootstrap.bundle.min.js')}}></script>
        @yield('header')
    </head>
    <body>
        <section class="hdl-header">
            <div class="container">
               <div class="row">
                  <div class="col-6 col-sm-6 col-md-2 py-1">
                     <a href="index.html">
                        <img src="{{ asset('images/logo.png')}}" class="img-fluid" alt="Logo">
                     </a>
                  </div>
                  <div class="col-12 col-sm-9 d-none d-md-block col-md-5 py-3">
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text bg-main" id="basic-addon2">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 d-none d-md-block col-md-4 text-center py-2">
                     <div class="call-login--register border-bottom">
                        <ul class="nav nav-fills py-0 my-0">
                           <li class="nav-item">
                              <a class="nav-link" href="login.html">
                                 <i class="fa fa-phone-square" aria-hidden="true"></i>
                                0979136447
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="login.html">Đăng nhập</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="register.html">Đăng ký</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="profile.html">Trần Anh Dũng</a>
                           </li>
                        </ul>
                     </div>
                     <div class="fs-6 py-2">
                        ĐỔI TRẢ HÀNG HOẶC HOÀN TIỀN <span class="text-main">TRONG 3 NGÀY</span>
                     </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-1 text-end py-4 py-md-2">
                     <a href="cart.html">
                        <div class="box-cart float-end">
                           <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                           <span>1</span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </section>
        <main>
        @yield('content')
        </main>
   <!-- Footer Start -->
   <section class="hdl-footer pb-4">
    <div class="container">
       <div class="row">
          <div class="col-md-4 pt-4">
             <h3 class="widgettilte">CHÚNG TÔI LÀ AI ?</h3>
             <p class="pt-1">
                Copyright@ 2024 DienloiShop là hệ thống bán sĩ và lẽ thời trang nam, nữ, trẻ em và quần áo thể thao,
                mong muốn đem đến chất lượng tốt nhất cho khách hàng.
             </p>
             <p class="pt-1">
                Địa chỉ:1273/5 Khu phố 2, Phường Bình Chiểu ,Tp Thủ Đức,Tp Hồ Chí Minh
             </p>
             <p class="pt-1">
                Điện thoại:0979136447(call, zalo) - Email: anhdungtran2015@gmail.com
             </p>
             <h3 class="widgettilte">MẠNG XÃ HỘI</h3>
             <div class="social my-3">
                <div class="facebook-icon">
                   <a href="#">
                      <i class="fab fa-facebook-f"></i>
                   </a>
                </div>
                <div class="instagram-icon">
                   <a href="#">
                      <i class="fab fa-instagram"></i>
                   </a>
                </div>
                <div class="google-icon">
                   <a href="#">
                      <i class="fab fa-google"></i>
                   </a>
                </div>
                <div class="youtube-icon">
                   <a href="#">
                      <i class="fab fa-youtube"></i>
                   </a>
                </div>
             </div>
          </div>
          <div class="col-md-4 pt-4">
             <h3 class="widgettilte">
                <strong>Liên hệ</strong>
             </h3>
             <ul class="footer-menu">
                <li><a href="index.html">Trang chủ</a></li>
                <li><a href="post_page.html">Giới thiệu</a></li>
                <li><a href="product.html">Sản phẩm</a></li>
                <li><a href="post_topic.html">Bài viết</a></li>
                <li><a href="contact.html">Liên hệ</a></li>
             </ul>
          </div>
          <div class="col-md-4 pt-4 text-end">
             <h3 class="fs-5 text-end">
                <strong>Lượt truy cập</strong>
             </h3>
             <p class="my-1">9888 lượt</p>
          </div>
       </div>
    </div>
 </section>
 <section class="dhl-copyright bg-dark py-3">
    <div class="container text-center text-white">
       copyright by AnhDung - Phone:0979136447
    </div>
 </section>
</body>
@yield('footer')
</html>