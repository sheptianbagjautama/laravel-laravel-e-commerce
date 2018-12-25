@extends('layouts.master')

@section('top')
@endsection


@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ \App\User::count() }}</h3>

                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-child"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ \App\Product::count() }}</h3>

                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ \App\Category::count() }}</h3>

                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-dot-circle-o"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ \App\Confirm::count() }}</h3>

                    <p>Confirm</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-comments"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    @endif

    @if(\Illuminate\Support\Facades\Auth::user()->role == 'customer')
        <div class="row">
            <div class="col-lg-12 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ \App\Order::count() }}</h3>

                        <h4>Transaksi</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-child"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i>
                    Halo {{ ucwords(\Illuminate\Support\Facades\Auth::user()->name) }}, status anda sedang login
                </div>
            </div>
        </div>
    @endif
@endsection

@section('bot')
@endsection
