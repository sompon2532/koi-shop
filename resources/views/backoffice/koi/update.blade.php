@extends('layouts.backoffice.main')

@section('title', 'Admin | Koi')

@section('head')
    <h1>
        KOI
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('koi.index') }}"><i class="fa fa-archive"></i> KOI</a></li>
        <li class="active">Edit</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12" id="app">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit KOI</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('koi.update', ['koi' => $koi->id]) }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user" class="col-sm-3 control-label">Owner</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="user_id" id="user">
                                    <option value="">-------- Select owner --------</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $koi->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                Name (TH) <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]" value="{{ $koi->translate('th')->name }}" id="nameTh"
                                       placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">-------- Select category --------</option>
                                    @php
                                        $traverse = function ($categories, $prefix = '') use (&$traverse, $koi) {
                                            foreach ($categories as $category) {
                                                $selected = ($koi->category_id == $category->id) ? 'selected' : '';
                                                echo '<option value="'. $category->id . '"' . $selected . '>' . $prefix . $category->name . '</option>';

                                                $traverse($category->children, $prefix.'- ');
                                            }
                                        };

                                        $traverse($categories);
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="koiId" class="col-sm-3 control-label">
                                KOI ID 
                                {{-- <span class="text-danger">*</span> --}}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="koi_id" value="{{ $koi->koi_id }}" id="koiId"
                                       placeholder="Koi ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="strain" class="col-sm-3 control-label">Variety</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="strain_id" id="strain">
                                    @foreach ($strains as $strain)
                                        <option value="{{ $strain->id }}" {{ $strain->id == $koi->strain_id ? 'selected' : '' }}>{{ $strain->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="born" class="col-sm-3 control-label">
                                Year 
                                {{-- <span class="text-danger">*</span> --}}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="born" value="{{ $koi->born }}" id="born"
                                       placeholder="Born">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="store" class="col-sm-3 control-label">Store</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="store_id" id="store">
                                    <option value="">-------- Choose Store --------</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}" {{ $store->id == $koi->store_id ? 'selected' : '' }}>{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sex" class="col-sm-3 control-label">เพศ</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sex" id="sex">
                                    <option value="male" {{ $koi->sex == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $koi->sex == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="unknown" {{ $koi->sex == 'unknown' ? 'selected' : '' }}>Unknown</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                Name (EN) <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]" value="{{ $koi->translate('en')->name }}" id="nameEn"
                                       placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="event" class="col-sm-3 control-label">Event</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="event_id" id="event">
                                    <option value="">-------- Select event --------</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}" {{ $koi->event_id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="farm" class="col-sm-3 control-label">Farm</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="farm_id" id="farm">
                                    @foreach ($farms as $farm)
                                        <option value="{{ $farm->id }}" {{ $farm->id == $koi->farm_id ? 'selected' : '' }}>{{ $farm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="oyagoi" class="col-sm-3 control-label">
                                Oyagoi 
                                {{-- <span class="text-danger">*</span> --}}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="oyagoi" value="{{ $koi->oyagoi }}" id="oyagoi"
                                       placeholder="Oyagoi">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">
                                Price 
                                {{-- <span class="text-danger">*</span> --}}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" value="{{ $koi->price }}" id="price"
                                       placeholder="Price">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unit" class="col-sm-3 control-label">
                                Unit 
                                {{-- <span class="text-danger">*</span> --}}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="unit" value="{{ $koi->unit }}" id="unit"
                                       placeholder="Unit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="certificate" class="col-sm-3 control-label">
                                Certificate
                            </label>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <input type="checkbox" class="minimal-red" name="certificate" value="1" {{ $koi->certificate ? 'checked' : '' }} id="certificate">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Size -->
                    <div class="col-md-6">
                        <div class="form-group" v-for="(size, index) in sizes">
                            <label class="col-sm-3 control-label">
                                Size @{{ index + 1 }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sizes[]" v-model="size.size" placeholder="Size">
                                <i class="minus fa fa-minus-circle" v-on:click="remove('size', index)" v-show="sizes.length > 1"></i>
                            </div>

                            <label class="col-sm-3 control-label">
                                Date
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="date_sizes[]" v-model="size.date" placeholder="   Date" style="border-top: none; border-radius: 0">
                            </div>
                        </div>
                        <i class="add fa fa-plus-circle" v-on:click="add('size')"></i>
                    </div>

                    <!-- Contest -->
                    <div class="col-md-6">
                        <div class="form-group" v-for="(contest, index) in contests">
                            <label class="col-sm-3 control-label">
                                Award @{{ index + 1 }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="contests[]" v-model="contest.contest" placeholder="Contest">
                                <i class="minus fa fa-minus-circle" v-on:click="remove('contest', index)" v-show="contests.length > 1"></i>
                            </div>

                            <label class="col-sm-3 control-label">
                                Date
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="date_contests[]" v-model="contest.date" placeholder="   Date" style="border-top: none; border-radius: 0">
                            </div>
                        </div>
                        <i class="add fa fa-plus-circle" v-on:click="add('contest')"></i>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Vidoe -->
                    <div class="col-md-6">
                        <div class="form-group" v-for="(video, index) in videos">
                            <label class="col-sm-3 control-label">
                                Video @{{ index + 1 }}
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="videos[]" v-model="video.video" rows="5" placeholder="Video ..."></textarea>
                                <i class="minus fa fa-minus-circle" v-on:click="remove('video', index)" v-show="videos.length > 1"></i>
                            </div>

                            <label class="col-sm-3 control-label">
                                Date
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="date_videos[]" v-model="video.date" placeholder="   Date" style="border-top: none; border-radius: 0">
                            </div>
                        </div>
                        <i class="add fa fa-plus-circle" v-on:click="add('video')"></i>
                    </div>

                    <!-- Remark -->
                    <div class="col-md-6">
                        <div class="form-group" v-for="(remark, index) in remarks">
                            <label class="col-sm-3 control-label">
                                Remark @{{ index + 1 }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="remarks[]" v-model="remark.remark" placeholder="Remark">
                                <i class="minus fa fa-minus-circle" v-on:click="remove('remark', index)" v-show="remarks.length > 1"></i>
                            </div>

                            <label class="col-sm-3 control-label">
                                Date
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="date_remarks[]" v-model="remark.date" placeholder="   Date" style="border-top: none; border-radius: 0">
                            </div>
                        </div>
                        <i class="add fa fa-plus-circle" v-on:click="add('remark')"></i>
                    </div>

                    <div class="clearfix"></div>

                    @include('backoffice.partials.image', ['images' => $koi->media, 'collection' => 'koi'])

                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
@endsection

@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                sizes: {!! $koi->sizes->count() ? $koi->sizes : json_encode([['size' => '']]) !!},
                contests: {!! $koi->contests->count() ? $koi->contests : json_encode([['contest' => '']]) !!},
                videos: {!! $koi->videos->count() ? $koi->videos : json_encode([['video' => '']]) !!},
                remarks: {!! $koi->remarks->count() ? $koi->remarks : json_encode([['remark' => '']]) !!}
            },
            methods: {
                add: function(type) {
                    if (type == 'size') {
                        this.sizes.push({size: ''})
                    }
                    else if (type == 'contest') {
                        this.contests.push({contest: ''})
                    }
                    else if (type == 'video') {
                        this.videos.push({video: ''})
                    }
                    else if (type == 'remark') {
                        this.remarks.push({remark: ''})
                    }

                    setTimeout(function() {
                        $(".datepicker").datepicker({
                            autoclose: true,
                            format: 'dd/mm/yyyy',
                            todayHighlight: true,
                        });
                    })
                },
                remove: function(type, index) {
                    if (type == 'size') {
                        this.sizes.splice(index, 1)
                    }
                    else if (type == 'contest') {
                        this.contests.splice(index, 1)
                    }
                    else if (type == 'video') {
                        this.videos.splice(index, 1)
                    }
                    else if (type == 'remark') {
                        this.remarks.splice(index, 1)
                    }
                }
            }
        })

        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    </script>
@endpush