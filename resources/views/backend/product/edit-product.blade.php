@extends('layouts.admin');


@section('main')

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Edit Product</h2>
        </div>
        <div class="panel-body row">
            <div class="col-lg-3">
                <p>Cover:</p>
                <form action="/deletecover/{{ $posts->id }}" method="post">
                <button class="btn text-danger">X</button>
                @csrf
                @method('delete')
                </form>
                <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                <br>
                @if (count($posts->images)>0)
                 <p>Images:</p>
                 @foreach ($posts->images as $img)
                 <form action="/deleteimage/{{ $img->id }}" method="post">
                     <button class="btn text-danger">X</button>
                     @csrf
                     @method('delete')
                     </form>
                 <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                 @endforeach
                 @endif

            </div>
            <div class="col-lg-6">
                <h3 class="text-center text-danger"><b>Udate Product</b> </h3>
                <div class="form-group">
                    <form action="/update/{{id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input hidden type="text" name="id" class="form-control" value="{{ $id }}">

                        <div class="form-group">
                            <label for="title" class="form-label">Title:</label>
                            <input required type="text" class="form-control" name="title" id="title" value="{{ title}}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Price:</label>
                            <input required type="number" class="form-control" name="price" id="price" value="{{price}}">
                        </div>
                        <div class="form-group">
                            <label for="discount" class="form-label">Discount:</label>
                            <input required type="number" class="form-control" name="discount" id="discount" value="{{discount}}">
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Category:</label>
            
                            <select name="category_id" class="form-control" id="category">
                                    @foreach($categories as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description: </label>
                            <textarea required class="form-control" name="description" id="description">{{description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="input-file-now-custom-3" class="form-label m-2">Cover Image:</label>
                            <input  type="file" class="form-control m-2" name="cover" id="input-file-now-custom-3">
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
