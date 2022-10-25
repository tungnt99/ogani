@extends('layouts.admin');
@section('main')

    {{ csrf_field() }}
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Danh sách sinh viên</h2>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th></th>
                            <th></th>
                        </tr> 
                    </thead>
                    {{-- <tbody>
                        @php
                            $count = 1;
                        @endphp
                       @foreach($users as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td><a href="{{ 'input-student' }}?id={{ $item->id }}" target="_blank"><button onclick="editStudent({{ $item->id }})" class="btn btn-primary">Edit</button></a></td>
                            <td><button onclick="deleteStudent({{ $item->id }})" class="btn btn-danger">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
@endsection
