<style>


    @media (max-width: 576px) {
            .option_container, .options{
                max-height: 384px;
               height: 100%;
               max-width: 441px;
               width: 100%;
            }
            .option_container .row{
                margin-top: 0px;
            }
        }
    </style>

    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">


                <div style="max-width: 100%; width:500px;">
                    <form action="{{url('product_search')}}" method="GET">

                        <input style="max-width: 80%;" type="text" name="search" placeholder="Ara">

                        <input type="submit" value="search">
                    </form>

                </div>
            </div>

            @if (session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

             {{session()->get('message')}}
         </div>
         @endif

            <div class="row">
                @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box product-box" style="height: 100%;">
                        <div class="option_container">
                            <div class="options" >
                                <a href="{{ url('product_details', $products->id) }}" style="margin-top:50px;" class="option1">
                                    Product Details
                                </a>
                                <form style="margin: 10%;" action="{{url('add_cart',$products->id)}}" method="Post">
                                    @csrf
                                    <div class="row" style="margin-top: 50%;">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width:100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" href="{{url('show_cart')}}" value="Sepete Ekle">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $products->image }}" alt="" style="height: 100%; width:100%; object-fit: cover;">
                        </div>
                        <div class="detail-box">
                            <div class="text-container">
                                <h5>{{ $products->title }}</h5>
                                @if ($products->discount_price != null)
                                    <h6 class="discount-price" style="color: red;">İndirimli Fiyat: ₺{{ $products->discount_price }}</h6>
                                    <h6 class="original-price">Fiyat: <span>₺{{ $products->price }}</span></h6>
                                @else
                                    <h6 class="original-price" style="color: red;">Fiyat: ₺{{ $products->price }}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <span style="padding-top: 20px">
                    {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
                </span>
            </div>
        </div>
    </section>

    <style>
        ..product_section .box{
            height: 100%;
            min-height: 300px; /* Set a minimum height for consistent appearance */
        display: flex;
        flex-direction: column;
        }

        .product-section .detail-box {
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .product-section .text-container {
            flex: 1;
        }

        .product-section .text-container .product-title {
            margin-bottom: 10px;
        }

        .product-section .text-container h6 {
            margin-bottom: 5px;
        }

        .product-section .discount-price {
            color: red;
        }

        .product-section .original-price {
            color: blue;
        }

        .product-section .original-price span {
            text-decoration: line-through;
            color: inherit;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
