        <div class="top-bar">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#">Brand</a> -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- <h2>Custom search field</h2> -->
                                    <!-- <div id="custom-search-input">
                                        <div class="input-group col-md-12">
                                            <input type="text" class="form-control input-lg" placeholder="Search" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-info btn-lg" type="button">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div> -->
                                </div>
                            
                            <!-- <form class="navbar-form navbar-left">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form> -->
                                <div class="col-md-9">
                                    <ul class="nav navbar-nav navbar-right">
                                        @if (Auth::guest())
                                            <li><a href="{{ route('login') }}">LOGIN</a></li>
                                            <li><a href="{{ route('register') }}">REGISTER</a></li>
                                            <li>
                                                <a href="{{-- route('frontend.product.shoppingCart') --}}"><span class="glyphicon glyphicon-shopping-cart">
                                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                                </a>
                                            </li>                                             
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    LOGOUT
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                                    </li>
                                                </ul>
                                            </li>
                                           <!--  <li>
                                                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    LOGOUT
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li> -->                                        
                                                                                      
                                        @endif
                                        <!-- <li><a href="#">TH/EN</a></li>  -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>    

        <div class="top-logo">
                <img src="{{ asset('frontend/src/img/LOGO-Koikichi-Auction.png') }}" class="img-responsive center" alt="" height="150" width="150">
        </div>

        <div class="menu-bar">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <!-- <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Koikichi') }}
                        </a> -->
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-center">
                            <!-- Authentication Links -->
                            <!-- @if (Auth::guest())
                                <li><a href="">Login</a></li>
                                <li><a href="">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href=""
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif -->

                            <li><a href="{{ url('/') }}">HOME</a></li>

                            <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">KOI</a>
                                <ul class="dropdown-menu">
                                    <li class="menu-item dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">STOCK IN JAPAN</b></a>
                                        <!-- <b class="glyphicon glyphicon-menu-right"> -->
                                        <ul class="dropdown-menu">
                                            <li class="menu-item "><a href="#">SAKAI</a></li>
                                            <li class="menu-item "><a href="#">NARITA</a></li>
                                            <li class="menu-item "><a href="#">MOMOTARO</a></li>
                                            <li class="menu-item "><a href="#">DAINICHI</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">STOCK IN THAILAND</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item "><a href="#">TOP QUALITY</a></li>
                                            <li class="menu-item "><a href="#">HIGH QUALITY</a></li>
                                            <li class="menu-item "><a href="#">MIDDLE QUALITY</a></li>
                                            <li class="menu-item "><a href="#">PET QUALITY</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="{{-- url('/stock/product') --}}">KOI PRODUCTS</a></li>
                            <li><a href="http://www.koikichi-auction.com/">ONLINE AUCTION</a></li>
                            <li><a href="{{-- url('/event') --}}">EVENTS</a></li>
                            <li><a href="{{-- url('/hallofframe') --}}">HALL OF FAME</a></li>
                            <li><a href="{{-- url('/payment') --}}">PAYMENT</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    