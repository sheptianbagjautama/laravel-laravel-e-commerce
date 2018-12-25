@extends('layouts.master')


@section('top')
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
            font-size: larger;
            color: #00a157;
        }
        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
    </style>

    <script>
        $(document).ready(function () {
            var flash = "{{ Session::has('status') }}";
            if (flash) {
                var status = "{{ Session::get('status') }}";
                swal('success', status, 'success');
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            $(".preloader").delay(550).fadeOut();
        })
    </script>
@endsection

@section('content')
    <div class="preloader">
        <div class="loading">
            <img src="{{ asset('loader.gif') }}" width="100">
            <h4><b>Haraf Tunggu</b></h4>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Shopping Cart</h3>&nbsp; {{ count(Cart::content()) }} Item(s)

                </div>

                <div class="box-header with-border">
                    <a href="{{ url('shopping-cart/destroy') }}" class="btn btn-lg btn-danger">Kosongkan Belanja</a>
                    <a href="{{ url('/') }}" class="btn btn-lg btn-info">Lanjutkan Belanja</a>
                    <a href="{{ url('shopping-cart/checkout') }}" class="btn btn-lg btn-success">Checkout</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Description</th>
                            <th width="20%">Quantity/Update</th>
                            <th width="30%">Price</th>
                            <th width="30%">Subtotal</th>
                        </tr>

                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                <div class="input-group col-xs-10">
                                    <input type="text" placeholder="{{ $product->qty }}" class="form-control" style="size: 300px;" disabled>
                                    <span class="input-group-btn">
                                      <button rowId="{{ $product->rowId }}" type="button" class="btn btn-danger kurangi-qty">+ Kurangi</button>

                                      <a href="{{ $product->rowId }}" class="btn btn-success add-qty">+ Tambah</a>
                                    </span>
                                </div>
                            </td>
                            <td>
                                Rp. {{ number_format($product->price, 0) }}
                            </td>
                            <td>
                                RP. {{ number_format($product->subtotal,0) }}
                            </td>
                        </tr>
                        @endforeach

                        <tr class="btn-success">
                            <td colspan="3">Total</td>
                            <td>{{ Cart::subtotal() }}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection


@section('bot')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-qty').click(function(e){
                e.preventDefault();
                var rowId = $(this).attr('href');
                window.location.href = "{{ url('shopping-cart/update') }}"+'/'+rowId;
            });

            $('.kurangi-qty').click(function(e){
                e.preventDefault();
                var rowId = $(this).attr('rowId');
                window.location.href = "{{ url('shopping-cart/kurangi') }}"+'/'+rowId;
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





