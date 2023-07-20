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
      <style type="text/css">

.total_deg{
    text-align: center;
}

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         @if (session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

             {{session()->get('message')}}
         </div>
         @endif

         <div class="table-responsive" style="width: 70%; margin:auto; margin-top:5%;">
            <table class="table table-hover" >
                <thead>
                <tr>
                    <th>Ürün Adı</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                    <th>Resim</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php $totalprice=0; ?>
                @foreach ($cart as $cart)
                <tbody>
                    <tr>
                        <td style="padding-top: 5%;">{{$cart->product_title}}</td>
                        <td style="padding-top: 5%;">{{$cart->quantity}}</td>
                        <td style="padding-top: 5%;">₺{{$cart->price}}</td>
                        <td><img class="img-fluid" style="max-width: 200px; max-height: 200px;" src="/product/{{$cart->image}}"></td>
                        <td style="padding-top: 4%;"><a class="btn btn-danger" onclick="return confirm('Bu ürünü sepetinden kaldırmak istediğine emin misin?')" href="{{url('remove_cart',$cart->id)}}">Ürünü Sil</a></td>
                    </tr>
                </tbody>

                <?php $totalprice=$totalprice + $cart->price ?>

                @endforeach


            </table>
            <div>
                <h1 class="total_deg">Total Price: ₺{{$totalprice}}</h1>
            </div>
            <div style="text-align:center; margin-bottom:30px;">
                <h1 style="font-size: 25px; padding-bottom:15px;">Siparişi Tamamla</h1>
                <a href="{{url('cash_order')}}" class="btn btn-danger">Kapıda Ödeme</a>
                <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Kart ile Ödeme </a>
            </div>
        </div>


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
