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
         <div style="width: 70%; margin:auto; margin-top:5%;">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Adet</th>
                        <th>Fiyat</th>
                        <th>Ödeme Durumu</th>
                        <th>Teslim Durumu</th>
                        <th style="text-align: center;">Resim</th>
                        <th>İptal</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                    <tr>
                        <td style="padding-top: 5%;">{{$order->product_title}}</td>
                        <td style="padding-top: 5%;">{{$order->quantity}}</td>
                        <td style="padding-top: 5%;">{{$order->price}}</td>
                        <td style="padding-top: 5%;">{{$order->payment_status}}</td>
                        <td style="padding-top: 5%;">{{$order->delivery_status}}</td>
                        <td>
                            <img class="img-fluid" src="product/{{$order->image}}">
                        </td>
                        <td style="padding-top: 4%;" >
                            @if ($order->delivery_status=='İşlemde')


                            <a onclick="return onfirm('Bu Siparişi İptal Etme İstediğinize Emin Misiniz?')" class="btn btn-danger" href="{{url('cancel_order', $order->id)}}">İptal</a>
                            @else
                            <p style="color:red">İptal Edilemez</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
         </div>
              <!-- footer start -->
      @include('home.footer')

      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
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
