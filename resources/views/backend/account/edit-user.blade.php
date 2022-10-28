@extends('layouts.admin');
@section('main')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">
                Edit User Information

            </h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('update-user') }}" method="post">
                {{ csrf_field() }}
                <input hidden type="text" name="id" class="form-control" value="{{ $id }}">
                <div class="form-group">
                    <label for="fullname" class="form-label">Fullname:</label>
                    <input required type="text" class="form-control" name="name" id="fullname" value="{{ $name }}">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">email:</label>
                    <input required type="text" class="form-control" name="email" id="email" value="{{ $email }}">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input required type="password" class="form-control" name="password" id="password" value="{{ $password }}">
                </div>
                <div class="form-group">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input required type="number" class="form-control" name="phone_number" id="phone_number" value="{{ $phone_number }}">
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input required type="text" class="form-control" name="address" id="address" value="{{ $address }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
