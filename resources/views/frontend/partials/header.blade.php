    <header>  
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
                        {{-- <!-- <a class="navbar-brand" href="#">Brand</a> --> --}}
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <!-- <div class="container">
                            <div class="row"> -->
                                <div class="col-md-3">
                                    {{-- <!-- <h2>Custom search field</h2>
                                    <div id="custom-search-input">
                                        <div class="input-group col-md-12">
                                            <input type="text" class="form-control input-lg" placeholder="Search" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-info btn-lg" type="button">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div> --> --}}
                                </div>

                                <div class="col-md-9">
                                    <ul class="nav navbar-nav navbar-right">
                                    @if (Auth::guest())
                                        <li><a class="{{ Request::segment(1) == 'login'  ? 'text-red' : '' }}" href="{{ route('login') }}">{{ trans('header.login') }}</a></li>
                                        <li><a class="{{ Request::segment(1) == 'register'  ? 'text-red' : '' }}" href="{{ route('register') }}">{{ trans('header.register') }}</a></li>                                           
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route('frontend.user.myport') }}"><span class="glyphicon glyphicon-heart text-red"></span> {{ trans('header.myport') }}</a></li>                                                
                                                <li><a href="{{ route('frontend.user.favorite') }}"><span class="glyphicon glyphicon-star text-red"></span> {{ trans('header.myfavorite') }}</a></li>                                                
                                                <li><a href="{{ route('frontend.event.booking') }}"><span class="glyphicon glyphicon-bookmark text-red"></span> {{ trans('header.mybooking') }}</a></li>
                                                <li><a href="{{ route('frontend.user.myorder') }}"><span class="glyphicon glyphicon-list-alt text-red"></span> {{ trans('header.myorders') }}</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li>
                                                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <span class="glyphicon glyphicon-log-out text-red"></span> {{ trans('header.logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>                                                                           
                                    @endif
                                        <li><a href="{{ URL::to('change/th') }}"><span class="flag-language"><img src="{{ asset('frontend/src/img/')}}{{ trans('header.flag-th') }}" class="center" alt="" height="15" width="15"></span>TH</a></li> 
                                        <li><a href="{{ URL::to('change/en') }}"><span class="flag-language"><img src="{{ asset('frontend/src/img/')}}{{ trans('header.flag-en') }}" class="center" alt="" height="15" width="15"></span>EN</a></li> 
                                        <li>
                                            <a href="{{ route('frontend.shop.shoppingCart') }}">
                                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                            </a>
                                        </li> 
                                    </ul>
                                </div>
                            <!-- </div> row -->
                        <!-- </div> container -->
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>    

        <div class="top-logo">
            <img src="{{ asset('frontend/src/img/LOGO-Koikichi-Auction.png') }}" class="img-responsive center" alt="" height="150" width="150">
        </div>

        <div class="menu-bar">
            <nav class="navbar navbar-default">
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

                            <li><a class="{{ Request::segment(1) == ''  ? 'text-red' : '' }}" href="{{ url('/') }}">{{ trans('header.home') }}</a></li>
                            
                            @if(count($categories->where('group', 'koi')) > 0)
                            <li class="dropdown  {{ Request::segment(0) == 'koi'  ? 'text-red' : '' }}">
                                <a class="{{ Request::segment(1) == 'koi'  ? 'text-red' : '' }}" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('header.koi') }}<span class="caret"></a>
                                <ul class="dropdown-menu">
                                    @foreach($categories->where('group', 'koi') as $category)
                                        @if(count($category->children) > 0)         
                                        <li class="dropdown-submenu">
                                            <a class="test" tabindex="-1" href="#">{{ $category->name }}</a>
                                            <ul class="dropdown-menu" >
                                                @foreach($category->children as $category2)
                                                    @if(count($category2->children) > 0)
                                                    <li class="dropdown-submenu">
                                                        <a class="test" href="#">{{ $category2->name }}</a>
                                                        <ul class="dropdown-menu">
                                                            @foreach($category2->children as $category3)      
                                                                <li class="menu-item">
                                                                    <a href="{{ route('frontend.koi.category', ['category' => $category3->id]) }}">{{ $category3->name }}</a>
                                                                </li>                                                             
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @else
                                                        <li class="menu-item">
                                                            <a href="{{ route('frontend.koi.category', ['category' => $category2->id]) }}">{{ $category2->name }}</a>
                                                        </li>
                                                    @endif 
                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                            <li class="menu-item">
                                                <a href="{{ route('frontend.koi.category', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                            </li>
                                        @endif 
                                    @endforeach
                                </ul>  
                            </li>
                            @endif
                            @if(count($categories->where('group', 'product')) > 0)
                            <li class="dropdown">
                            <a class="{{ Request::segment(1) == 'product'  ? 'text-red' : '' }}" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('header.koi-products') }}<span class="caret"></a>
                                <ul class="dropdown-menu">
                                    @foreach($categories->where('group', 'product') as $category)
                                        @if(count($category->children) > 0)         
                                        <li class="dropdown-submenu">
                                            <a class="test" tabindex="-1" href="#">{{ $category->name }}</a>
                                            <ul class="dropdown-menu">
                                                @foreach($category->children as $category2)
                                                    @if(count($category2->children) > 0)
                                                    <li class="dropdown-submenu">
                                                        <a class="test" href="#">{{ $category2->name }}</a>
                                                        <ul class="dropdown-menu">
                                                            @foreach($category2->children as $category3)      
                                                                <li class="menu-item">
                                                                    <a href="{{ route('frontend.shop.category', ['category' => $category3->id]) }}">{{ $category3->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @else
                                                        <li class="menu-item">
                                                            <a href="{{ route('frontend.shop.category', ['category' => $category2->id]) }}">{{ $category2->name }}</a>
                                                        </li>
                                                    @endif 
                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                            <li class="menu-item">
                                                <a href="{{ route('frontend.shop.category', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                            </li>
                                        @endif 
                                    @endforeach
                                </ul>  
                            </li>
                            @endif
                            <!-- <li role="separator" class="divider"></li> -->
                            <li><a href="http://www.koikichi-auction.com/" target="_blank">{{ trans('header.online-auction') }}</a></li>
                            <li><a class="{{-- Request::segment(1) == 'event'  ? 'text-red' : '' --}}" href="{{ url('/event') }}">{{ trans('header.events') }}</a></li>
                            <li><a class="{{ Request::segment(1) == 'event'  ? 'text-red' : '' }}" href="{{-- url('/hallofframe') --}}">{{ trans('header.hall-of-fame') }}</a></li>
                            <li><a class="{{ Request::segment(1) == 'payment'  ? 'text-red' : '' }}" href="{{ url('/payment') }}">{{ trans('header.payment') }}</a></li>

                            {{--<!-- @if(count($categories) > 0)
                                <li class="menu-item dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('header.koi') }}<span class="caret"></a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories->where('group', 'koi') as $category)
                                            @if(count($category->children) > 0)                                    
                                                <li class="menu-item dropdown dropdown-submenu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">category1{{ $category->name }}</a>
                                                    <ul class="dropdown-menu">
                                                        @foreach($category->children as $category2)
                                                            @if(count($category2->children) > 0)
                                                                <li class="menu-item dropdown dropdown-submenu">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">category2 {{ $category2->name }}</a>
                                                                    <ul class="dropdown-menu">
                                                                        @foreach($category2->children as $category3)
                                                                            <li class="menu-item">
                                                                                <a href="{{ route('frontend.koi.category', ['category' => $category3->id]) }}">category3 {{ $category3->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                </li>
                                                            @else
                                                                <li class="menu-item">
                                                                    <a href="{{ route('frontend.koi.category', ['category' => $category2->id]) }}">category2 {{ $category2->name }}</a>
                                                                </li>
                                                            @endif 
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="menu-item">
                                                    <a href="{{ route('frontend.koi.category', ['category' => $category->id]) }}">category1 {{ $category->name }}</a>
                                                </li>
                                            @endif 
                                        @endforeach
                                    </ul>
                                </li>
                            @endif --> --}}
                            {{-- <!-- @foreach($categories->where('group', 'product') as $category)
                                @if(count($category->children) > 0)                                    
                                    <li class="dropdown-submenu">
                                        <a href="#" tabindex="-1" class="test">category1{{ $category->name }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach($category->children as $category2)
                                                @if(count($category2->children) > 0)
                                                    <li class="dropdown-submenu">
                                                        <a href="#" tabindex="-1">category2 {{ $category2->name }}</a>
                                                        <ul class="dropdown-menu">
                                                            @foreach($category2->children as $category3)
                                                            
                                                                <li class="menu-item">
                                                                    <a href="{{ route('frontend.shop.category', ['category' => $category3->id]) }}">category3 {{ $category3->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li class="menu-item">
                                                        <a href="{{ route('frontend.shop.category', ['category' => $category2->id]) }}">category2 {{ $category2->name }}</a>
                                                    </li>
                                                @endif 
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="menu-item">
                                        <a href="{{ route('frontend.shop.category', ['category' => $category->id]) }}">category1 {{ $category->name }}</a>
                                    </li>
                                @endif 
                            @endforeach --> --}}
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header> 
    