

    <style>
        .expanded-nav {
            max-height: 300px;
            transition: max-height 0.3s ease-in-out;
        }
        .search-form {
            display: flex;
            align-items: center;
        }
        .search-input {
            margin-right: 5px;
        }

    </style>


<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Ana Sayfa <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('products')}}">Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_us') }}">Hikayemiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_client') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_cart')}}">Sepet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_order')}}">Siparişler</a>
                    </li>
                </ul>
                <form class="form-inline" action="{{url('search_product')}}" method="GET">
                    <div class="search-form">
                        <input id="searchInput" class="form-control search-input ml-sm-2 d-none" type="text" name="search" placeholder="Ara">
                        <button id="searchButton" class="btn my-2 my-sm-0 nav_search-btn" type="button" value="search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
                @if (Route::has('login'))
                    @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <x-app-layout>
                            </x-app-layout>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-danger" id="loginBtn" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            &nbsp;
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                    @endauth
                @endif
            </div>
        </nav>
    </div>
</header>

<script>
    document.getElementById("searchButton").addEventListener("click", function() {
        var searchInput = document.getElementById("searchInput");
        searchInput.classList.toggle("d-none");
        var navbarCollapse = document.getElementById("navbarSupportedContent");
        navbarCollapse.classList.toggle("expanded-nav");
        if (!searchInput.classList.contains("d-none")) {
            searchInput.focus();
        }
    });
</script>

