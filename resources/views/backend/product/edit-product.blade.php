@extends('layouts.admin');

@section('main')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-body row">
            <div class="col-lg-6">
                <h3 class="text-center text-danger"><b>Update Product</b> </h3>
                <div class="form-group">
                    <form action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input hidden type="text" name="id" class="form-control" value="{{ $id }}">
                        <div class="form-group">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $title }}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ $price }}">
                        </div>
                        <div class="form-group">
                            <label for="discount" class="form-label">Discount:</label>
                            <input type="number" class="form-control" name="discount" id="discount" value="{{ $discount }}">
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Category:</label>
                            <select name="category_id" class="form-control" id="category" value="{{ $category_id }}">
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description: </label>
                            <textarea class="form-control" name="description" id="description">{{ $description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="input-file-now-custom-3" class="form-label m-2">Cover Image:</label>
                            <input  type="file" class="form-control m-2" name="cover" id="input-file-now-custom-3" value="{{$cover}}">
                        </div>
                        <div class="form-group">
                            <label for="input-file-now-custom-3" class="form-label m-2">Images:</label>
                            <input  type="file" class="form-control m-2" name="images[]" multiple id="input-file-now-custom-3">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger mt-3">Update</button>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
