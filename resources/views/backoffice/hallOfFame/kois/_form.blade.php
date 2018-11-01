<div class="form-group">
  <label for="" class="col-sm-2 control-label">Event</label>
  <div class="col-sm-8">
    <select class="form-control" name="contest" style="padding: 0 0 0 10px;">
      @if( !empty($koi) )
        @foreach($contests as $index => $contest)
          @if( $koi->contest_id == $contest->id )
            <option value="{{ $contest->id }}" selected>{{ $contest->title }}</option>
          @else
            <option value="{{ $contest->id }}">{{ $contest->title }}</option>
          @endif
        @endforeach
      @else
        @foreach($contests as $index => $contest)
          <option value="{{ $contest->id }}">{{$contest->title}}</option>
        @endforeach
      @endif
    </select>
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">Award</label>
  <div class="col-sm-8">
    <input type="text" name="award" class="form-control" id="award" placeholder="Award" value="{{ !empty($koi) ? $koi->award : old('award') }}">
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">Owner</label>
  <div class="col-sm-8">
    <input type="text" name="owner" class="form-control" id="award" placeholder="Owner" value="{{ !empty($koi) ? $koi->owner : old('owner') }}">
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">Breeder</label>
  <div class="col-sm-8">
    <input type="text" name="breeder" class="form-control" id="award" placeholder="Breeder" value="{{ !empty($koi) ? $koi->breeder : old('breeder') }}">
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">Dealer</label>
  <div class="col-sm-8">
    <input type="text" name="dealer" class="form-control" id="award" placeholder="Dealer" value="{{ !empty($koi) ? $koi->dealer : old('dealer') }}">
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">Handled</label>
  <div class="col-sm-8">
    <input type="text" name="handled" class="form-control" id="award" placeholder="Handled" value="{{ !empty($koi) ? $koi->handled : old('handled') }}">
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">Image</label>
  <div class="col-sm-10">
    <input type="file" name="image" class="form-control choose_file" id="" placeholder="">
    <button type="button" class="btn btn-warning button-upload">Choose Image</button>
    @if( !empty($koi) )
      <input type="text" name="imageName" class="text-show" value="{{ $koi->image }}">
      <div id="image-preview">
        <img src="{{ URL::asset("hallOfFame/$koi->image") }}" alt="" width="450"/>
      </div>
    @else
      <input type="text" name="imageName" class="text-show" value="">
      <div id="image-preview">
        <img src="" alt="" />
      </div>
    @endif

    @if( !empty($event) )
      <input type="hidden" name="event_id" value="{{ $event->id }}">
    @endif
  </div>
</div>

@section('custom-js')

@stop
