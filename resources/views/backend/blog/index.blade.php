@extends('layouts.admin');
@section('main')
    {{ csrf_field() }}
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Danh sách Blog</h2>
            </div>
            <div class="panel-body container">
                <div class="blog-list row">
                    @foreach($blogs as $item)
                        <div class="blog-list--item col-lg-3">
                            <img src={{ $item->thumbnail }} alt={{ $item->title }}>
                            <h2>{{ $item->title }}</h2>
                            <p>{{ $item->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
