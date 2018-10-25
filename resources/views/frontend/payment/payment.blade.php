{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'PAYMENT')

@section('custom-css')
<style>
    /* ::-webkit-file-upload-button {
        color: #ff0000;
        padding: .5em 1em;
        border: #ff0000 2px solid;
        background-color: #ffffff;
        border-radius: 0;
    } */
    .order-detail {
        display: table;
        margin: 0 auto;
    }
</style>

@endsection

@section('content')
<form action="{{ route('frontend.payment.payment', ['id' => $order->id]) }}" method="post" id="checkout-form"  enctype="multipart/form-data">
    <div class="content-box text-center">
        <div class="row"> 
            <div class="col-md-12">

                <div class="col-md-12 text-center">
                    <div class="title-lf">
                        <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
                    </div>
                    <div class="title-m">
                        <div class="title-inm">
                            <h1 class="text-thick">CHECKOUT</h1>
                        </div>
                    </div>
                    <div class="title-rg">
                        <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>ORDER :</p>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                <p>#{{ $order->id }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>NAME :</p>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                <p>{{ $order->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>ADDRESS :</p>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                <p>{{ $order->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>TEL. :</p>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                <p>{{ $order->tel }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{--<!-- <div class="col-md-offset-1 col-md-12">
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">BANK</div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">ACCOUNT NAME</div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">ACCOUNT TYPE</div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">BRANCH</div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">ACCOUNT NO.</div>
                    </div>
                    <div class="col-md-offset-1 col-md-12">
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">
                            <input type="radio" name="bank" id="bank" value="ธนาคารกสิกรไทย" checked>
                            ธนาคารกสิกรไทย
                        </div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">
                            ธนัยชนถ ลิมปนุสรณ์
                        </div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">
                            ออมทรัพย์
                        </div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">
                            ท่าน้ำราชวงศ์
                        </div>
                        <div class="col-md-2" style="background-color:#ddd;padding:8px;line-height:1.42857143;vertical-align:top;">
                            606-2-01458-8
                        </div>
                    </div> -->--}}
                    <div class="col-md-12">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th class="text-center">BANK</th>
                                <th class="text-center">ACCOUNT NAME</th>
                                <th class="text-center">ACCOUNT TYPE</th>
                                <th class="text-center">BRANCH</th>
                                <th class="text-center">ACCOUNT NO.</th>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="bank" id="bank" value="ธนาคารกสิกรไทย" checked>
                                        ธนาคารกสิกรไทย
                                    </label>
                                </td>
                                <td>ธนัยชนถ ลิมปนุสรณ์ </td>
                                <td>ออมทรัพย์</td>
                                <td>ท่าน้ำราชวงศ์</td>
                                <td>606-2-01458-8</td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="bank" id="bank" value="ธนาคารกรุงเทพ">
                                        ธนาคารกรุงเทพ
                                    </label>
                                </td>
                                <td>ธนัยชนถ ลิมปนุสรณ์ </td>
                                <td>ออมทรัพย์</td>
                                <td>ท่าน้ำราชวงศ์</td>
                                <td>606-2-01458-8</td>
                            </tr>
                        </table>
                    </div>
                </div>

                    <h2 class="text-red">SHIPPING ADDRESS</h2>
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group form-payment">
                                <label class="col-md-3" for="name">IMAGE :</label>
                                <div class="col-md-9">
                                    <input class="col-md-12" type="file" name="image" id="image" value="" required>                                        
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group form-payment">
                                <label class="col-md-3" for="address">TOTAL : </label>
                                <div class="col-md-9">
                                    <input type="text" id="total" class="form-control" required name="total">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div class="form-group form-payment">
                                <label class="col-md-3" for="name">DATE TIME :</label>
                                <div class="col-md-9">
                                    <input type='text' class="form-control" id='datetimepicker4' required name="datetime"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-red form-payment">SEND</button>
                </div>
            </div>
    </div>
</form>
@endsection

@section('custom-js')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datepicker').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss',
        });
    });
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> -->

@endsection