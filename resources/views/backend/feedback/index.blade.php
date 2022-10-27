@extends('layouts.admin');
<script type="text/javascript">
    function deleteFeedback(id){
        $.post("{{ route('delete-feedback')}}",
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
            <h2 class="text-center">Danh sách phản hồi</h2>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Note</th>
                        <th></th>
                    </tr> 
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                   @foreach($feedback as $item)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->note}}</td>
                        <td><button onclick="deleteFeedback({{ $item->id }})" class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
