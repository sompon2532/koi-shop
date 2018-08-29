{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'KOI')

@section('custom-css')
<style>
    .btn-favorite {
    background-color: transparent;
    padding: 0px;
}

.star-label {
    top: 0px;
    right: 14px;
}
</style>
@endsection

@section('content')

    <div class="content-box text-center">
        <div class="row"> 
            <div class="col-md-12">
                <div class="title-box">
                    <h1>{{ $koi->name }}</h1>
                </div>
            </div>

            {{-- <!-- <h3 class="text-red"> SAKAI </h3>
            <P>KOI > KOI  IN JAPAN > SAKAI > {{ $koi->name }}</P> --> --}}

                <!-- <div class="row"> -->
            <div class="col-sm-6 col-md-3 col-md-offset-3" style="margin-bottom:15px">
                <div class="hide-max-768px show-min-768px">
                    <div class="slider slider-for thumbnail">
                        @if(count($koi->media) > 0)
                            @foreach($koi->media as $media)
                                <div>
                                    <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                        <img class="example-image" src="{{ asset($media->getUrl()) }}" alt="...">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class=" img-responsive">                                                
                        @endif
                    </div>
                </div>

                <div class="star-label">
                    @if(count($koi->favorite)>0)
                        <form action="{{ route('frontend.user.favorite-del', ['id' => $koi->id, 'type' => 'App\Models\Koi']) }}" method="GET">  
                            <button type="submit" class="btn btn-favorite">
                                <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                            </button> 
                            {{ csrf_field() }}
                        </form>
                    @else
                        <form action="{{ route('frontend.user.favorite-add', ['id' => $koi->id]) }}" method="GET">  
                            <input type="hidden" name="item" value="{{ $koi->id }}">
                            <input type="hidden" name="type" value="App\Models\Koi">
                            <button type="submit" class="btn btn-favorite">
                                <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                            </button> 
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>

                <div class="text-red">
                    <div class="contact-to-order">{{ trans('koi.to-order') }}<br>{{ trans('koi.please-contact') }} </div>
                    <span class="line-contact-to-order">
                        <a href="{{ route('frontend.contact.line') }}">
                            <img src="{{ asset('frontend/src/img/line-logo.png') }}" alt="...">                                    
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 text-left">
                <div class="koi-detail">
                    <p>
                        <span class="heading">{{ trans('koi.code') }}</span>
                        : {{ $koi->koi_id }}</p>
                    <p>
                        <span class="heading">{{ trans('koi.price') }}</span>
                        : {{ number_format($koi->price) }} {{ trans('koi.thb')}}</p>
                    <br>

                    <p class="text-red">{{ trans('koi.detail')}}</p>
                    <p>
                        <span class="heading">{{ trans('koi.oyagoi') }} </span>
                        : {{ $koi->oyagoi }} </p>
                    <p>
                        <span class="heading">{{ trans('koi.strain') }}</span>
                        : {{ $koi->strain->name }} </p>
                    <p>
                        <span class="heading">{{ trans('koi.farm') }}</span>
                        : {{ $koi->farm->name }}</p>
                    <p>
                        <span class="heading">{{ trans('koi.born') }} </span>
                        : {{ $koi->born }}</p>
                    <p>
                        <span class="heading">{{ trans('koi.storage') }}</span>
                        : {{ $koi->store != null ? $koi->store->name : '-' }}</p>

                    @if(count($koi->sizes) > 0)
                        @foreach($koi->sizes as $index => $sizes)
                            <p>
                                <span class="heading">{{ trans('koi.size') }} {{ $index+1 }}</span>
                                : {{ $sizes->size }} ({{$sizes->date}})</p>
                        @endforeach
                    @else
                        <p>
                            <span class="heading">{{ trans('koi.size') }}</span>
                            : -</p>
                    @endif

                    <p>
                        <span class="heading">{{ trans('koi.gender')}}</span>
                        : {{ $koi->sex }}</p>
                    <p>
                        <span class="heading">{{ trans('koi.certificate') }}</span>
                        : {{ $koi->certificate ? trans('koi.yes') : trans('koi.no') }} </p>
                    
                    {{--<!-- @if(count($koi->contests) > 0)
                        @foreach($koi->contests as $index => $contests)
                            <p>{{ trans('koi.contest') }} #{{ $index+1 }} : {{ $contests->contest }} ({{$contests->date}})</p>
                        @endforeach
                    @else
                        <p>{{ trans('koi.contest') }} : -</p>                                    
                    @endif -->--}}

                    @if(count($koi->remarks) > 0)
                        @foreach($koi->remarks as $index => $remarks)
                            <p>
                                <span class="heading">{{ trans('koi.remark') }} {{ $index+1 }}</span>
                                : {{ $remarks->remark }}</p>
                        @endforeach
                    @else
                        <p>
                            <span class="heading">{{ trans('koi.remark') }}</span>
                            : -</p>  
                    @endif
                </div>
            </div>

            @if(count($koi->media) > 1)                            
                <div class="hide-max-768px show-min-768px">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="item">
                            <div class="slider slider-nav">
                                @foreach($koi->media as $media)
                                    <img src="{{ asset($media->getUrl()) }}" class="img-responsive thumbnail">    
                                @endforeach
                            </div>
                        </div> 
                    </div>
                </div>
            @endif

            @if(count($koi->videos) > 0)
                <div class="col-md-12">
                    <section class="lazy slider" data-sizes="50vw">
                        @foreach($koi->videos as $video)
                            <div>
                                <h3 class="text-red">VIDEO ({{ $video->date }})</h3>
                                {!! $video->video !!}
                            </div>
                        @endforeach
                    </section>                                        
                </div>
            @endif
            
        </div>
    </div><!-- content-box -->

@endsection

@section('custom-js')
<script>
 
</script>

@endsection