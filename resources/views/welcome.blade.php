@extends('layouts.master')


@section('top')
@endsection

@section('content')
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-2">
            <!-- Profile Image -->
            <div class="box">
                <div class="box-body box-profile">
                    <img width="100px" height="100px" class="img-responsive" src="{{ url($product->image) }}" >

                    <h4 class="text-center" >{{ $product->name }}</h4>

                    <button class="bg bg-maroon-active"><h4><p class="text-muted text-center">{{ $product->price }}</p></h4></button>

                    <a href="#" class="btn btn-success btn-block"><b>Add To Cart</b></a>
                    <a href="#" class="btn btn-dropbox btn-block"><b>Detail</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        @endforeach

        {{--<div class="col-md-2">--}}
            {{--<!-- Profile Image -->--}}
            {{--<div class="box">--}}
                {{--<div class="box-body box-profile">--}}
                    {{--<img class="img-responsive" src="{{ asset('a.jpg') }}" >--}}

                    {{--<h3 class="profile-username text-center">Gamis Intan Syari'i</h3>--}}

                    {{--<h4><p class="text-muted text-center">Rp. 200000</p></h4>--}}
                    {{--<a href="#" class="btn btn-success btn-block"><b>Add To Cart</b></a>--}}
                    {{--<a href="#" class="btn btn-dropbox btn-block"><b>Detail</b></a>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--<!-- /.box -->--}}
        {{--</div>--}}

        {{--<div class="col-md-2">--}}
            {{--<!-- Profile Image -->--}}
            {{--<div class="box">--}}
                {{--<div class="box-body box-profile">--}}
                    {{--<img class="img-responsive" src="{{ asset('a.jpg') }}" >--}}

                    {{--<h3 class="profile-username text-center">Gamis Intan Syari'i</h3>--}}

                    {{--<h4><p class="text-muted text-center">Rp. 200000</p></h4>--}}
                    {{--<a href="#" class="btn btn-success btn-block"><b>Add To Cart</b></a>--}}
                    {{--<a href="#" class="btn btn-dropbox btn-block"><b>Detail</b></a>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--<!-- /.box -->--}}
        {{--</div>--}}

        {{--<div class="col-md-2">--}}
            {{--<!-- Profile Image -->--}}
            {{--<div class="box">--}}
                {{--<div class="box-body box-profile">--}}
                    {{--<img class="img-responsive" src="{{ asset('a.jpg') }}" >--}}

                    {{--<h3 class="profile-username text-center">Gamis Intan Syari'i</h3>--}}

                    {{--<h4><p class="text-muted text-center">Rp. 200000</p></h4>--}}
                    {{--<a href="#" class="btn btn-success btn-block"><b>Add To Cart</b></a>--}}
                    {{--<a href="#" class="btn btn-dropbox btn-block"><b>Detail</b></a>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--<!-- /.box -->--}}
        {{--</div>--}}
    </div>
@endsection


@section('bot')
@endsection





