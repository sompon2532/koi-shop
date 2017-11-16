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
                                            <li>
                                                <a href="{{ route('frontend.shop.shoppingCart') }}"><span class="glyphicon glyphicon-shopping-cart">
                                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                                </a>
                                            </li>  
                                        @if (Auth::guest())
                                            <li><a href="{{ route('login') }}">{{ trans('header.login') }}</a></li>
                                            <li><a href="{{ route('register') }}">{{ trans('header.register') }}</a></li>                                           
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="{{ route('frontend.event.booking') }}">
                                                            MY BOOKING
                                                        </a>
                                                    </li>
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
                                        <li><a href="{{ URL::to('change/th') }}">TH</a></li> 
                                        <li><a href="{{ URL::to('change/en') }}">EN</a></li> 
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

                            <li><a href="{{ url('/') }}">{{ trans('header.home') }}</a></li>

                            @if(count($categories) > 0)
                            <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('header.koi') }}</a>
                                <ul class="dropdown-menu">
                                @foreach($categories->where('group', 'koi') as $category)

                                    <li class="menu-item dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}</a>
                                        @if(count($category->children) > 0)
                                        <ul class="dropdown-menu">
                                            
                                            @foreach($category->children as $category2)    
                                            <li class="menu-item dropdown dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category2->name }}</a>
                                                @if(count($category2->children) > 0)
                                                <ul class="dropdown-menu">
                                                    
                                                    @foreach($category2->children as $category3)
                                                    <li class="menu-item">
                                                        <a href="{{ route('frontend.koi.category', ['category' => $category3->id]) }}">{{ $category3->name }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                @endif 
                                            </li>
                                            @endforeach

                                        </ul>
                                        @endif 
                                    </li>

                                @endforeach
                                </ul>
                            </li>
                            @endif

                            @if(count($categories) > 0)
                            <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('header.koi-products') }}</a>
                                <ul class="dropdown-menu">
                                @foreach($categories->where('group', 'product') as $category)

                                    <li class="menu-item dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}</a>
                                        @if(count($category->children) > 0)
                                        <ul class="dropdown-menu">
                                            
                                            @foreach($category->children as $category2)    
                                            <li class="menu-item dropdown dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category2->name }}</a>
                                                @if(count($category2->children) > 0)
                                                <ul class="dropdown-menu">
                                                    
                                                    @foreach($category2->children as $category3)
                                                    <li class="menu-item">
                                                        <a href="{{ route('frontend.shop.category', ['category' => $category3->id]) }}">{{ $category3->name }}</a>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ul>
                                                @endif 
                                            </li>
                                            @endforeach

                                        </ul>
                                        @endif 
                                    </li>

                                @endforeach
                                </ul>
                            </li>
                            @endif



                           <!--  <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('header.koi') }}</a>
                                <ul class="dropdown-menu">
                                    <li class="menu-item dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">STOCK IN JAPAN</b></a>

                                        <ul class="dropdown-menu">
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">SAKAI</a></li>
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">NARITA</a></li>
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">MOMOTARO</a></li>
                                            <li class="menu-item dropdown dropdown-submenu"><a href="{{ route('frontend.koi.index') }}">DAINICHI</a>
                                                <ul class="dropdown-menu">
                                                    <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">SAKAI</a></li>
                                                    <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">NARITA</a></li>
                                                    <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">MOMOTARO</a></li>
                                                    <li class="menu-item dropdown dropdown-submenu"><a href="{{ route('frontend.koi.index') }}">DAINICHI</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">STOCK IN THAILAND</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">TOP QUALITY</a></li>
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">HIGH QUALITY</a></li>
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">MIDDLE QUALITY</a></li>
                                            <li class="menu-item "><a href="{{-- route('frontend.koi.index') --}}">PET QUALITY</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->

                            <!-- <li><a href="{{ url('/product') }}">KOI PRODUCTS</a></li> -->
                            <!-- <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('header.koi-products') }}</a>
                                <ul class="dropdown-menu">
                                    <li class="menu-item "><a href="{{ url('/koi-product') }}">KOI FOOD</a></li>
                                    <li class="menu-item "><a href="{{ url('/koi-product') }}">KOI NET</a></li>
                                    <li class="menu-item "><a href="{{ url('/koi-product') }}">FILTER</a></li>
                                    <li class="menu-item "><a href="{{ url('/koi-product') }}">MEDICATION</a></li>
                                    <li class="menu-item "><a href="{{ url('/koi-product') }}">TANK/TUB/CANVAS</a></li>
                                </ul>
                            </li> -->
                            <li><a href="http://www.koikichi-auction.com/">{{ trans('header.online-auction') }}</a></li>
                            <li><a href="{{ url('/event') }}">{{ trans('header.events') }}</a></li>
                            <li><a href="{{-- url('/hallofframe') --}}">{{ trans('header.hall-of-fame') }}</a></li>
                            <li><a href="{{-- url('/payment') --}}">{{ trans('header.payment') }}</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


    