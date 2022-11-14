@extends('layouts.admin');
<script type="text/javascript">
  function deleteProduct(id){
      $.post("{{ route('delete-product')}}",
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

<div class="container" style="margin-top: 50px;">
  <h3 class="text-center text-danger"><b>Laravel CRUD With Multiple Image Upload</b> </h3>

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Description</th>
            <th>Category</th>
            <th>Cover</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $item)
            <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->discount }}</td>
                  <td>{{ $item->description }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td><img src={{ asset('uploads/cover/'.$item->cover) }} class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                  <td><a href="{{ 'edit-product' }}?id={{ $item->id }}" class="btn btn-outline-primary">Update</a></td>
                  <td>
                    <button onclick="deleteProduct({{ $item->id }})" class="btn btn-warning">Delete</button>
                  </td>


              </tr>
           @endforeach

        </tbody>
      </table>
</div>
@endsection

