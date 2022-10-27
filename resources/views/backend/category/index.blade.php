@extends('layouts.admin')

@section('main')
    {{ csrf_field() }}
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Danh sách tài khoản người dùng</h2>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr> 
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                       @foreach($category as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ 'edit-user' }}?id={{ $item->id }}"><button onclick="editUser({{ $item->id }})" class="btn btn-primary">Edit</button></a></td>
                            <td><button onclick="deleteUser({{ $item->id }})" class="btn btn-danger">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
