     
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
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                                        <li><a href="{{ route('frontend.user.profile') }}"><span class="glyphicon glyphicon-user text-red"></span> {{ trans('header.profile') }}</a></li>                                                
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
                </div>
            </nav>
        </div><!-- /.top-bar -->

        <div class="top-logo">
            <div class="container">
                <!-- <img src="{{ asset('frontend/src/img/LOGO-header.jpg') }}" class="img-responsive center" alt="" > -->
                <img src="{{ asset('frontend/src/img/LOGO-header.jpg') }}" class="img-responsive" alt="" >
            </div>
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
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav navbar-center">

                            <li><a class="{{ Request::segment(1) == ''  ? 'text-red' : '' }}" href="{{ url('/') }}">{{ trans('header.home') }}</a></li>

                            @if(count($categories->where('group', 'koi')) > 0)
                                <li class="dropdown  {{ Request::segment(0) == 'koi'  ? 'text-red' : '' }}">
                                    <a class="{{ Request::segment(1) == 'koi'  ? 'text-red' : '' }}" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('header.koi') }}<span class="caret"></a>
                                    <ul class="dropdown-menu">
                                        @php
                                            $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                                foreach ($categories as $category) {
                                                    if($category->group == 'koi'){
                                                        if(count($category->children) > 0) {
                                                            echo $prefix = '<li class="dropdown-submenu"><a class="test" href="#">'.$category->name.'</a><ul class="dropdown-menu" >';
                                                            $traverse($category->children, $prefix);
                                                            echo '</ul>';
                                                            echo '</li>';
                                                        }
                                                        else {
                                                            echo $prefix = '<li class="menu-item"><a href="'.route('frontend.koi.category', ['category' => $category->id]).'">'.$category->name.'</a></li>';
                                                        }
                                                    }
                                                }
                                            };
                                            $traverse($categories);
                                        @endphp
                                    </ul> 
                                </li>
                            @else
                                <li><a class="{{ Request::segment(1) == 'koi'  ? 'text-red' : '' }}" href="{{ route('frontend.koi.index') }}">{{ trans('header.koi') }}</a></li>                                
                            @endif 

                            @if(count($categories->where('group', 'product')) > 0)
                                <li class="dropdown  {{ Request::segment(0) == 'koi'  ? 'text-red' : '' }}">
                                    <a class="{{ Request::segment(1) == 'product'  ? 'text-red' : '' }}" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('header.koi-products') }}<span class="caret"></a>
                                    <ul class="dropdown-menu">
                                        @php
                                            $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                                foreach ($categories as $category) {
                                                    if($category->group == 'product'){
                                                        if(count($category->children) > 0) {
                                                            echo $prefix = '<li class="dropdown-submenu"><a class="test" href="#">'.$category->name.'</a><ul class="dropdown-menu" >';
                                                            $traverse($category->children, $prefix);
                                                            echo '</ul>';
                                                            echo '</li>';
                                                        }
                                                        else {
                                                            echo $prefix = '<li class="menu-item"><a href="'.route('frontend.shop.category', ['category' => $category->id]).'">'.$category->name.'</a></li>';
                                                        }
                                                    }
                                                }
                                            };
                                            $traverse($categories);
                                        @endphp
                                    </ul>
                                </li>
                            @else
                                <li><a class="{{ Request::segment(1) == 'product'  ? 'text-red' : '' }}" href="{{ route('frontend.shop.index') }}">{{ trans('header.koi-products') }}</a></li>                                
                            @endif 

                            <li><a href="http://www.koikichi-auction.com/" target="_blank">{{ trans('header.online-auction') }}</a></li>
                            <li><a class="{{-- Request::segment(1) == 'event'  ? 'text-red' : '' --}}" href="{{ url('/event') }}">{{ trans('header.events') }}</a></li>
                            {{-- <!-- <li><a class="{{ Request::segment(1) == 'hall-of-fame'  ? 'text-red' : '' }}" href="{{ url('/hall-of-fame') }}">{{ trans('header.hall-of-fame') }}</a></li> --> --}}
                            <li><a href="{{ route("frontend.hall-of-fame.index") }}">{{ trans('header.hall-of-fame') }}</a></li>
                            <li><a class="{{ Request::segment(1) == 'payment'  ? 'text-red' : '' }}" href="{{ url('/payment') }}">{{ trans('header.payment') }}</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    
    