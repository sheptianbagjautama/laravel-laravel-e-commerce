@extends('layouts.master')


@section('top')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h2>Confirm Details</h2>

                </div>
                <table class="table table-bordered table-hover">
                    <tr style="font-size: larger">
                    <td>Penerima</td>
                    <td>{{ $identity->order->receiver }}</td>
                    </tr>

                    <tr style="font-size: larger">
                        <td>Alamat</td>
                        <td>{{ $identity->order->address }}</td>
                    </tr>
                </table>


                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <tr style="font-size: large;" class="btn-success" >
                            <th width="5%">Image Product</th>
                            <th width="10%">Name Product</th>
                            <th width="3%">Qty</th>
                            <th width="30%">Subtotal</th>
                        </tr>

                        @foreach($details as $detail)
                            <tr>
                                <td align="center" >
                                    <a href="{{url($detail->product->image) }}" target="_blank"><img src="{{ url($detail->product->image) }}" width="100px"></a>
                                </td>
                                <td align="center" style="font-size: medium">{{ $detail->product->name }}</td>
                                <td align="center" style="font-size: medium">{{ $detail->qty }}</td>
                                <td align="center" style="font-size: medium">
                                    Rp. {{ number_format($detail->subtotal,0) }}
                                </td>
                                {{--<td>--}}
                                {{--RP. {{ number_format($product->subtotal,0) }}--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach

                        <tr class="btn-success">
                            <td colspan="3" align="center" style="font-size: medium">Total</td>
                            <td align="center" style="font-size: medium">Rp. {{ number_format($detail->order->total_price,0) }}</td>
                        </tr>
                    </table>
                    <br>
                    <a href="{{ url('confirmAdmin/terima/'.$detail->order_id) }}" class="btn btn-lg bg-navy btn-block">Terima</a>
                    <a href="{{ url('confirmAdmin/tolak/'.$detail->order_id)}}" class="btn btn-lg bg-red-active btn-block">Tolak</a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection


@section('bot')
    <script>
        $(document).ready(function(){
            var flash = "{{ Session::has('status') }}";
            if(flash){
                var status = "{{ Session::get('status') }}";
                swal('success', status, 'success');
            }
        });
    </script>
@endsection





