@extends('layouts.admin');

@section('main')
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


            @foreach ($products as $products)
         <tr>
               <th scope="row">{{ $products->id }}</th>
               <td>{{ $products->title }}</td>
               <td>{{ $products->price }}</td>
               <td>{{ $products->discount }}</td>
               <td>{{ $products->description }}</td>
               <td>{{ $products->category_id }}</td>
               <td><img src="{{ $products->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
               <td><a href="{{ 'edit-product' }}?id={{ $products->id }}" class="btn btn-outline-primary">Update</a></td>
               <td>
                   <form action="/delete/{{ $products->id }}" method="post">
                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                    @csrf
                    @method('delete')
                </form>
               </td>

           </tr>
           @endforeach

        </tbody>
      </table>
</div>
@endsection

