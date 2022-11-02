@extends('layouts.admin');


@section('main')

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Add Banner</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title" class="form-label">Title:</label>
                    <input required type="text" class="form-control" name="title" id="title" >
                </div>
                <div class="form-group">
                    <label for="thumbnail" class="form-label">Thumbnail:</label>
                    <input required type="file" class="form-control" name="thumbnail" id="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">

                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description: </label>
                    <textarea required class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
