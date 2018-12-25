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
                    <h3 class="box-title">{{ $title }}</h3>
                </div>


                    @if(session('status'))
                    <div class="box-header">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i> Success! &nbsp;
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif


                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th></th>
                            <th width="250px"></th>
                        </tr>
                        </thead>

                        @php
                            $no = 1;
                        @endphp

                        @foreach($products as $product)
                        <tbody>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>Rp. {{ number_format($product->price,0) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td><img class="rounded-square" width="50" height="50" src="{{ url($product->image) }}" alt=""></td>
                            <td>
                                @if($product->status == 'publish')
                                    <a class="btn bg-maroon"><b>{{ ucwords($product->status) }}</b></a>
                                @else
                                    <a class="btn bg-orange"><b>{{ ucwords($product->status) }}</b></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn btn-info">Detail</a>
                            </td>

                            <td>
                                <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="post" onsubmit="return confirm('Delete this posts permanently ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th></th>
                            <th width="250px"></th>
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
@endsection


@section('bot')
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'processing'  : true,
                'serverSide'  : true,

            })
        })
    </script>
@endsection





