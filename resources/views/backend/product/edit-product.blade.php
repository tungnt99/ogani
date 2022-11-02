@extends('layouts.admin');


@section('main')

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Edit Blog</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden type="text" name="id" class="form-control" value="{{ $id }}">

                <div class="form-group">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $title }}">
                </div>
                <div class="form-group">
                    <label for="thumbnail" class="form-label">Thumbnail:</label>
                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Price:</label>
                    <input required type="number" class="form-control" name="price" id="price" value="{{ price }}">
                </div>
                <div class="form-group">
                    <label for="discount" class="form-label">Discount:</label>
                    <input required type="number" class="form-control" name="discount" id="discount" value="{{ discount }}">
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">Category:</label>
                    @foreach($categories as $item)
                        <select name="category_id" id="category">
                            <option value="{{ $item->category_id }}">{{ $item->category_id }}</option>
                        </select>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description: </label>
                    <input class="form-control" name="description" id="description" value="{{ $description }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
