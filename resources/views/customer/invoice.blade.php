@extends('layouts.master')


@section('top')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Invoice</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Name Product</th>
                            <th width="20%">Qty</th>
                            <th width="30%">Subtotal</th>
                        </tr>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>
                                    Rp. {{ $product->subtotal() }}
                                </td>
                                {{--<td>--}}
                                    {{--RP. {{ number_format($product->subtotal,0) }}--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach

                        <tr class="btn-success">
                            <td colspan="2">Total</td>
                            <td>{{ $total }}</td>
                        </tr>

                        <tr class="btn-info">
                            <td colspan="3">
                                Silahkan anda transfer ke BRI :<br>
                                Atas Nama<b><i>Sheptian Bagja Utama</i></b></br>
                                No.Rekening<b><i>2378491237</i></b>
                            </td>
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





