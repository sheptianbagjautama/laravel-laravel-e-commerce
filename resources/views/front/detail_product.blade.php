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
        <div class="col-md-6">
            <!-- Profile Image -->
            <div class="box">
                <div class="box-body box-profile">
                    <img class="img-responsive" src="{{ url($product->image) }}" >

                    {{--<h4 class="text-center">{{ $product->name }}</h4>--}}

                    {{--<h3><p class="text-muted text-center">Rp. {{ number_format($product->price, 0) }}</p></h3>--}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        {{--<h3>Product</h3>--}}
                        <h1>{{ $product->name }}</h1> <a class="btn bg-maroon-active">{{ $product->category->name }}</a>
                        {{--<h3>Price</h3>--}}
                        <h3>Rp. {{ number_format($product->price,0) }}</h3>
                        <button class="btn btn-info"><h4>Stock Product {{ $product->stock }} Pcs</h4></button>

                        <h3>Description</h3>
                        <h4>{{ $product->description }}</h4>
                        <br>
                        <p><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-success btn-block"><b>Add To Cart</b></a>
                            <a href="#" class="btn btn-dropbox btn-block"><b>Detail</b></a></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
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





