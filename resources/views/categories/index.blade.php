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
                    <table id="categories" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th width="10px"></th>
                            <th width="300px"></th>
                        </tr>
                        </thead>

                        @php
                        $no = 1;
                        @endphp

                        @foreach($categories as $category)
                            <tbody>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $category->name }}</td>
                                <td><a class="btn bg-teal-active"><b>{{ $category->slug }}</b></a></td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn bg-navy">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="post" onsubmit="return confirm('Delete this posts permanently ?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn bg-red-active" value="Delete">
                                        {{--<button class="btn btn-danger" type="submit">Delete</button>--}}
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th width="10px"></th>
                            <th width="300px"></th>
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
            // $('#categories').DataTable()
            $('#categories').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                // 'processing'  : true,
                // 'serverSide'  : true,

            })
        })
    </script>
@endsection





