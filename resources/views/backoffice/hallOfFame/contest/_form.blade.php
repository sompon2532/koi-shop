<div class="form-group">
  <label for="" class="col-sm-2 control-label">ชื่องานประกวด</label>
  <div class="col-sm-8">
    <input type="text" name="title" class="form-control" id="" placeholder="งานประกวด" value="{{ !empty($contest) ? $contest->title : old('title') }}">
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">รายละเอียดงานประกวด</label>
  <div class="col-sm-8">
    <textarea class="form-control" name="detail" rows="8">{{ !empty($contest) ? $contest->detail : old('detail') }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="" class="col-sm-2 control-label">วันที่จัดงานประกวด</label>
  <div class="col-sm-3">
    <div class='input-group'>
      <input type="text" name="contest_date" class="form-control datepicker" id="" value="{{ !empty($contest) ? $contest->contest_date : old('contest_date') }}">
      <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    @if( !empty($contest) )
      <span style="font-size: 14px;">วันที่กำหนดไว้ <span class="text-info">{{ $contest->contest_date }}</span></span>
    @endif
  </div>
</div>

@section('custom-js')
  <script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
          format: 'DD/MM/YYYY',
          locale: 'en'
        });
    });
  </script>
@stop
