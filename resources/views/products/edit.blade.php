@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>

            <div class="box-header with-border">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Success! &nbsp;
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('product.update', ['id' => $product->id])  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="box-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $product->name }}" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ $product->price }}" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter stock" value="{{ $product->stock }}" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter image" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <img class="rounded-square" width="250"  src="{{ url($product->image) }}" alt="">

                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option {{ $product->status == 'publish' ? 'selected' : '' }} value="publish">Publish</option>
                            <option {{ $product->status == 'draft' ? 'selected' : '' }} value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
@endsection


@section('top')
@endsection
