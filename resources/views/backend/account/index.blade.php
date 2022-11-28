@extends('layouts.admin');
<script type="text/javascript">
    function deleteUser(id){
        $.post("{{ route('delete-user')}}",
        {
            '_token': $('[name=_token]').val(),
            id: id
        },
        function(data, status){
            location.reload();
        }
        )
    }
</script>
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
                            <th>Fullname</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                       @foreach($users as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('uploads/account/'.$item->photo) }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->address}}</td>
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
