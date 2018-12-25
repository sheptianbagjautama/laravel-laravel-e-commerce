@extends('layouts.master')

@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href=" {{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }} ">
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Order</h3>
                </div>

                <div class="box-header">
                    <a href="{{ route('order.pdf') }}" class="btn btn-dropbox" target="_blank"> Export PDF </a>
                    <a href="{{ route('order_lunas.pdf') }}" class="btn btn-dropbox" target="_blank"> Export PDF Paid Orders </a>
                    <a href="{{ route('order.excel') }}" class="btn btn-dropbox"> Export Excel </a>
                    <a href="{{ route('order_lunas.excel') }}" class="btn btn-dropbox"> Export Excel Paid Orders </a>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Penerima</th>
                            <th>Total Bayar</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            {{--<th>Bukti Pembayaran</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>

                        @foreach($orders as $index=>$order)
                            <tbody>
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td class="penerima" order-id="{{ $order->id }}">{{ $order->receiver }}</td>
                                <td > <button class="btn btn-default"><b>Rp. {{ number_format($order->total_price,0) }}</b></button></td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if($order->status == 'belum bayar')
                                        <button type="button" class="btn bg-maroon">{{ ucwords($order->status) }}</button>
                                    @elseif($order->status == 'menunggu verifikasi')
                                        <button type="button" class="btn bg-orange">{{ ucwords($order->status) }}</button>
                                    @elseif($order->status == 'dibayar')
                                        <button type="button" class="btn btn-success">{{ ucwords($order->status) }}</button>
                                    @else
                                        <button type="button" class="btn bg-danger">{{ ucwords($order->status) }}</button>
                                    @endif
                                </td>
                                {{--<td><a href="{{ url('/upload/confirm/'.$order->confirm->image) }}" download="" class="btn btn-info">Download Attachment</a></td>--}}
                                <td>
                                    {{--<a href="{{ route('order.detail', ['id']) }}" class="btn btn-info">Detail</a>--}}
                                    <a class="btn btn-info" href="{{ url('/order/detail', $order->id) }}">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Penerima</th>
                            <th>Total Bayar</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            {{--<th>Bukti Pembayaran</th>--}}
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Pesanan</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Product</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </table>
                    </thead>

                    <tbody id="detail-pesanan">

                    </tbody>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection


@section('bot')
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>

    {{--<script>--}}
    {{--$(function () {--}}
    {{--// $('#myTable').DataTable()--}}
    {{--// $('#categories').DataTable({--}}
    {{--//     'paging'      : true,--}}
    {{--//     'lengthChange': false,--}}
    {{--//     'searching'   : false,--}}
    {{--//     'ordering'    : true,--}}
    {{--//     'info'        : true,--}}
    {{--//     'autoWidth'   : false,--}}
    {{--//     // 'processing'  : true,--}}
    {{--//     // 'serverSide'  : true,--}}
    {{--//--}}
    {{--// })--}}
    {{--})--}}
    {{--</script>--}}

    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();

            $('body').on('click', '.penerima', function(){
                var id = $(this).attr('order-id');

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: "{{ url('invoice/detail') }}"+'/'+id,
                    success: function(data){

                        $.each(data.hasil, function(i,v){
                            var pesanan = '<tr>';

                            pesanan += '<td>';
                            pesanan += i+1;
                            pesanan += '</td>';

                            pesanan += '<td>';
                            pesanan += v.name_product;
                            pesanan += '</td>';

                            pesanan += '<td>';
                            pesanan += v.qty;
                            pesanan += '</td>';

                            pesanan += '<td>';
                            pesanan += v.subtotal;
                            pesanan += '</td>';

                            pesanan += '</tr>';

                            $('#detail-pesanan').append(pesanan);
                        });
                    }
                });

                $('#myModal').modal();
            });
        });
    </script>

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





