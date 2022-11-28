@extends('layouts.admin');
@section('main')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">
                Input Student Information

            </h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('account.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fullname" class="form-label">Fullname:</label>
                    <input required type="text" class="form-control" name="name" id="fullname" >
                </div>
                <div class="form-group">
                    <label class="m-2">Cover  cImages</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input required type="text" class="form-control" name="email" id="email" >
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input required type="password" class="form-control" name="password" id="password" >
                </div>
                <div class="form-group">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input required type="number" class="form-control" name="phone_number" id="phone_number">
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input required type="text" class="form-control" name="address" id="address">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
