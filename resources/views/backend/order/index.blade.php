@extends('layouts.admin');
{{-- <script type="text/javascript">
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
</script> --}}
@section('main')
    {{-- {{ csrf_field() }} --}}
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Danh sách Order</h2>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
                       @foreach($orders as $item)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>
                                <a href="{{ url('/admin/view-order/'.$item->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
