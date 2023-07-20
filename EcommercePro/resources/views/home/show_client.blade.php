<!DOCTYPE html>
<html>
   <head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>MeriLass HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

      </div>


      <section class="client_section layout_padding">
        <div class="container">

           <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                 <div class="carousel-item active">
                    <div class="box col-lg-10 mx-auto">
                       <div class="img_container">
                          <div class="img-box">
                             <div class="img_box-inner">
                                <img src="images/client.png" alt="">
                             </div>
                          </div>
                       </div>
                       <div class="detail-box">
                          <h5>
                            Gözlük Ölçüsü Nedir ve Gözlük Ölçüsü Nasıl Alınır?
                          </h5>

                          <p style="margin-top: 5%">Yüzünüz için doğru boyutta gözlük seçimi yapmak, hem uyum hem de stil için önemlidir. Doğru ölçülerde seçilen bir güneş gözlüğünü uzun yıllar keyifle ve konforla kullanabilirsiniz.
                          </p>
                       </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="box col-lg-10 mx-auto">
                       <div class="img_container">
                          <div class="img-box">
                             <div class="img_box-inner">
                                <img src="images/client.png" alt="">
                             </div>
                          </div>
                       </div>
                       <div class="detail-box">
                        <h5>
                          Gözlük Ölçüsü Nedir ve Gözlük Ölçüsü Nasıl Alınır?
                        </h5>

                        <p style="margin-top: 5%">Yüzünüz için doğru boyutta gözlük seçimi yapmak, hem uyum hem de stil için önemlidir. Doğru ölçülerde seçilen bir güneş gözlüğünü uzun yıllar keyifle ve konforla kullanabilirsiniz.
                        </p>
                     </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="box col-lg-10 mx-auto">
                       <div class="img_container">
                          <div class="img-box">
                             <div class="img_box-inner">
                                <img src="images/client.png" alt="">
                             </div>
                          </div>
                       </div>
                       <div class="detail-box">
                        <h5>
                          Gözlük Ölçüsü Nedir ve Gözlük Ölçüsü Nasıl Alınır?
                        </h5>

                        <p style="margin-top: 5%">Yüzünüz için doğru boyutta gözlük seçimi yapmak, hem uyum hem de stil için önemlidir. Doğru ölçülerde seçilen bir güneş gözlüğünü uzun yıllar keyifle ve konforla kullanabilirsiniz.
                        </p>
                     </div>
                    </div>
                 </div>
              </div>
              <div class="carousel_btn_box">
                 <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                 <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                 <span class="sr-only">Geri</span>
                 </a>
                 <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                 <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                 <span class="sr-only">İleri</span>
                 </a>
              </div>
           </div>
        </div>
     </section>



      <!-- footer start -->
      @include('home.footer')

      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
