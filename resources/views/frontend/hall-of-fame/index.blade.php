@extends('frontend.layouts.master')

@section('page_title', 'HALL OF FAME')

@section('custom-css')

@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">

                    <div class="title-box">
                        <h1>HALL OF FAME</h1>
                    </div>

                    <div class="row content-box">
                        <div class="col-md-3">
                            <div class="list-group panel">
                                @foreach($years as $year => $value)
                                    <div class="collapse-halloffame text-left">
                                        <a href="#menu{{$year}}" class="list-group-item panel-heading text-center" data-toggle="collapse" data-parent="#mainmenu">{{ $year }} ({{ count($value) }}) <span class="menu-ico-collapse"><i class="glyphicon glyphicon-menu-right"></i></span></a>
                                        <div class="halloffame-title-sidebar"></div>
                                        <div class="collapse pos-absolute" id="menu{{$year}}">
                                            @foreach($value as $halloffame)
                                                <a href="{{ route('frontend.hall-of-fame.hall-of-fame', ['id' => $halloffame->id]) }}" data-toggle="collapse" class="list-group-item sub-sub-item" data-target="#submenu2"><span class="menu-ico-collapse"><i class="glyphicon glyphicon-menu-right"></i></span> {{$halloffame->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($kois as $koi)
                                    @if($koi->hall_of_fame_id)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                @if(count($koi->media) > 0)  
                                                    <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." style="max-height:200px">
                                                @else
                                                    <img src="{{ asset('frontend/src/img/koi-defalt-img.jpg') }}" alt="..." style="max-height:200px;">                                                
                                                @endif
                                                <div class="caption">
                                                    <h3 class="text-red">{{$koi->name}}</h3>
                                                    <p>OWNER : {{$koi->user['name']}}</p>
                                                    <p>BREEDER :</p>
                                                    <p>HANDLED : </p>
                                                    <p>{{ $koi->hallOfFame->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')

@endsection