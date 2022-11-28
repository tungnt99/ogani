@extends('layouts.admin');
<script type="text/javascript">
        Dropzone.options.dropzone =
        {
            maxFilesize: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
    </script>

@section('main')

<div class="container">
    @if(session('status'))
        <h4 class="alert alert-success">{{ session('status') }}</h4>
    @endif
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Add Product</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Title:</label>
                    <input required type="text" class="form-control" name="title" id="title" >
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Price:</label>
                    <input required type="number" class="form-control" name="price" id="price" >
                </div>
                <div class="form-group">
                    <label for="discount" class="form-label">Discount:</label>
                    <input type="number" class="form-control" name="discount" id="discount" >
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description: </label>
                    <textarea class="form-control" name="description" id="description" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category_id" class="form-control" id="category">
                        <option value="">-- Select Category --</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="m-2"> Image</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                </div>
                <div class="form-group">
                    <label class="m-2">Cover  cImages</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

