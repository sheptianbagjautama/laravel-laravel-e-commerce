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
            $(".preloader").delay(800).fadeOut();
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
        @foreach($products as $product)
            <div class="col-md-2">
                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <img class="img-responsive" src="{{ url($product->image) }}" >

                        <h4 class="text-center">{{ $product->name }}</h4>

                        <h3><p class="text-muted text-center">Rp. {{ number_format($product->price, 0) }}</p></h3>

                        <a href="#" class="btn bg-maroon-active btn-block"><b><i class="fa fa-cube"></i> &nbsp; Stock : {{ $product->stock }}</b></a>
                        <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-success btn-block"><b><i class="fa fa-shopping-cart"></i> &nbsp;Add To Cart</b></a>
                        <a href="{{ url('product/detail', $product->id) }}" class="btn btn-dropbox btn-block"><b><i class="fa fa-share-square"></i> Detail</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @endforeach
    </div>
@endsection


@section('bot')
    <script>
        $(document).ready(function () {
           var flash = "{{ Session::has('status') }}";
           if (flash) {
               var status = "{{ Session::get('status') }}";
               swal('success', status, 'success');
           }
        });
    </script>


@endsection





