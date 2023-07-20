<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->

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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<style>
    /* Add your custom styles here */


    .zoom-container {
        position: relative;
        display: inline-block;
    }

    .img-left img {
        width: 100%;
        max-width: 90%;
        transition: transform .2s;
        transform-origin: top left;
        display: inline-block;
        margin: 20px;
    }

    .img-left:hover {
        transform: scale(1.1);
    }

    .product-details {
        padding: 30px;
        border-radius: 5px;
    }

    .product-details h5 {
        font-size: 24px;
        margin-bottom: 15px;
    }

    .product-details .discount-price {
        color: red;
    }

    .product-details .original-price {
        text-decoration: line-through;

        margin-bottom: 10px;
    }

    .product-details p {
        margin-bottom: 5px;
    }

    .product-details .btn-primary {
        margin-top: 15px;
    }

    textarea {
        border-radius: 3px;
    }
    textarea:focus {
        border-color: black;
        outline: none;
    }

    /* Responsive styles for screens up to 576px wide */
    @media (max-width: 576px) {
        .img-left img {
            width: 100%;
            max-width: 100%;
        }


        .product-details {
            padding: 10px;
        }
    }

    /* Responsive styles for screens between 577px and 767px wide */
    @media (min-width: 577px) and (max-width: 767px) {
        .img-left img {
            width: 100%;
            max-width: 90%;
        }

        .product-details {
            padding: 20px;
        }
    }
</style>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div style="height: 100%;" class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="zoom-container">
                                    <div class="img-box img-left">
                                        <img src="/product/{{ $product->image }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-auto">
                                <div class="detail-box">
                                    <h5>{{ $product->title }}</h5>
                                    @if ($product->discount_price != null)
                                        <h6 class="discount-price">
                                            Discount price: ₺{{ $product->discount_price }}
                                        </h6>
                                        <h6 class="original-price">
                                            Price: <span class="line-through">₺{{ $product->price }}</span>
                                        </h6>
                                    @else
                                        <h6 class="original-price">
                                            Price: ₺{{ $product->price }}
                                        </h6>
                                    @endif
                                    <p><strong>Ürün Kategorisi: </strong> {{ $product->category }}</p>
                                    <p><strong>Ürün Detayı: </strong> {{ $product->description }}</p>
                                    <p><strong>Ürün Adeti: </strong> {{ $product->quantity }}</p>
                                    <form action="{{ url('add_cart', $product->id) }}" method="Post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" name="quantity" value="1" min="1"
                                                    style="width:100%">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" value="Sepete Ekle">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comment system starts here -->

        <div style="text-align:center; padding-bottom:30px;">
            <h1 style="font-size: 30px; text-align:center; padding-top:20px; padding-bottom:20px;">
                Yorum Yap
            </h1>
            <form action="{{url('add_comment')}}" method="POST">
                @csrf
                <textarea style="height:40%; width:60%; border-radius:15px;" placeholder="Ürün hakkında yorum bırakın.." name="comment"></textarea>
                <br>
                <input type="submit" class="btn btn-danger" value="Gönder">
            </form>
        </div>
        <div style="padding-left: 20%; ">
            <h1 style="font-size:20px; padding-bottom:20px;">Bütün Yorumlar</h1>
            @foreach ($comment as $comment)
            <div style="margin-top:1%">
                <b>{{$comment->name}}</b>
                <p>{{$comment->comment}}</p>

                <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Cevapla</a>

                    @foreach ($reply as $rep )
                @if ($rep->comment_id==$comment->id)
                <div style="padding-left:3%; padding-bottom:10px;  padding-bottom:10px;">

                    <b>{{$rep->name}}</b>
                    <p>{{$rep->reply}}</p>
                <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Cevapla</a>

                </div>
                @endif


                    @endforeach


            </div>
            @endforeach


            <div style="margin-bottom: 1%; display:none;" class="replyDiv">
                <form action="{{url('add_reply')}}" method="POST">
                    @csrf
                <input type="text" id="commentId" name="commentId" hidden="">
                <textarea style="margin-top:1%;height: 30%; width:30%;  border-radius:15px;" name="reply" placeholder="Yorumu yanıtla.."></textarea>
                <br>
                <button type="submit" class="btn btn-outline-danger">Yanıtla</button>
                <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Kapat</a>
                </form>

            </div>
        </div>


        <!-- Comment system ends here -->

    </div>

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->


    <div class="cpy_">
        <p class="mx-auto">
            © 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
    </div>
    <script type="text/javascript">
    function reply(caller){
        document.getElementById('commentId').value=$(caller).attr('data-Commentid')
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }
    function reply_close(caller){

        $('.replyDiv').hide();
    }

        </script>
          <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>

    <!-- jQuery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>
