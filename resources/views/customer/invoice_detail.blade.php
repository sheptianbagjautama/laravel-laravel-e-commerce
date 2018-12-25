@extends('layouts.master')


@section('top')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Invoice Details</h3>

                </div>
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
                                <td align="center" ><img src="{{ url($detail->product->image) }}" width="100px"></td>
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





