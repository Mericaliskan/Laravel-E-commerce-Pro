<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .table{
            color: whitesmoke;
            margin-top: 40px;
        }
        .font-size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size{
            width: 150px;
            height: 150px;
        }

        .th_deg{
            padding:30px;


        }
        .td {
            max-width: 300px;
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 80px; /* Adjust the height as needed */
        line-height: 1.4;
        white-space:
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

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}
                </div>
                @endif

                <h2 class="font-size">All Products</h2>
                <div class="">
                    <table class="table table-hover">
                        <thead>
                            <tr class="th_color">
                                <th class="th_deg" style=" color: whitesmoke;">Product title</title></th>
                                <th class="th_deg" style=" color: whitesmoke;">Description</th>
                                <th class="th_deg" style=" color: whitesmoke;">Quantity</th>
                                <th class="th_deg" style=" color: whitesmoke;">Category</th>
                                <th class="th_deg" style=" color: whitesmoke;">Price</th>
                                <th class="th_deg" style=" color: whitesmoke;">Discount Price</th>
                                <th class="th_deg" style=" color: whitesmoke;">Product Image</th>
                                <th class="th_deg" style=" color: whitesmoke;">Delete</th>
                                <th class="th_deg" style=" color: whitesmoke;">Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>
                                    <img class="img_size" src="/product/{{$product->image}}">
                                </td>
                                <td><a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this')" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                                <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>

                            </tr>
                            @endforeach
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
