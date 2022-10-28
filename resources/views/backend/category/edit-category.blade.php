@extends('layouts.admin');
@section('main')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">
                Edit Category
            </h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('update-category') }}" method="post">
                {{ csrf_field() }}
                <input hidden type="text" name="id" class="form-control" value="{{ $id }}">
                <div class="form-group">
                    <label for="fullname" class="form-label">Fullname:</label>
                    <input required type="text" class="form-control" name="name" id="fullname" value="{{ $name }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
