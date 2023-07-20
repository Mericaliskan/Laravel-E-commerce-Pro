<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
        }
        .table{

            margin-top: 2%;
            color: whitesmoke;
            overflow-x: auto;
        }

        .table td, .table th{
      white-space: nowrap;
    }
    .table-responsive{
      overflow-x: auto;
    }
    .table-hover tbody tr:hover td {
    color: green;
}




    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="title_deg">All Orders</h1>


                <div style="padding-left: 400px; padding-bottom:30px;">

                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color: black;" name="search" placeholder="Ara">
                        <input type="submit" value="Ara" class="btn btn-outline-primary">
                    </form>

                </div>


                <div class="table-responsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th style="color: whitesmoke;">AdSoyad</th>
                                <th style="color: whitesmoke;">Email</th>
                                <th style="color: whitesmoke;">Adres</th>
                                <th style="color: whitesmoke;">Telefon</th>
                                <th style="color: whitesmoke;">Ürün Adı</th>
                                <th style="color: whitesmoke;">Adet</th>
                                <th style="color: whitesmoke;">Ücret</th>
                                <th style="color: whitesmoke;">Ödeme Drumu</th>
                                <th style="color: whitesmoke;">Teslim Durumu</th>
                                <th style="color: whitesmoke;">Resim</th>
                                <th style="color: whitesmoke;">Durum</th>
                                <th style="color: whitesmoke;">PDF</th>
                                <th style="color: whitesmoke;">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->product_title}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_status}}</td>
                                <td>
                                    <img src="/product/{{$order->image}}">
                                </td>
                                <td>
                                    @if ($order->delivery_status=='İşlemde')

                                    <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Bu ürünü göndermek istediğine emin misin?')" class="btn btn-success">Gönder</a>

                                    @else

                                    <p style="color: green;">Teslim Edildi</p>

                                    @endif

                                </td>
                                <td>
                                    <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">PDF</a>
                                </td>
                                <td>
                                    <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Email</a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="16" style="text-align: center;">Veri Bulunamadı</td>
                            </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
