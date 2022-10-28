@extends('layouts.admin');
<script type="text/javascript">
    function deleteCategory(id){
        $.post("{{ route('delete-category')}}",
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
                <h2 class="text-center">Danh sách category</h2>
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
                       @foreach($categories as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ 'edit-category' }}?id={{ $item->id }}"><button onclick="editCategory({{ $item->id }})" class="btn btn-primary">Edit</button></a></td>
                            <td><button onclick="deleteCategory({{ $item->id }})" class="btn btn-danger">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
