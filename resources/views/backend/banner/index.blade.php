@extends('layouts.admin');
<script type="text/javascript">
    function deleteBanner(id){
        $.post("{{ route('delete-banner')}}",
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
                <h2 class="text-center">Danh sách Banner</h2>
            </div>
            <div class="panel-body container">
                <div class="blog-list row">
                    @foreach($banners as $item)
                         
                        <div class="blog-list--item col-lg-3">
                            <div class="blog-body">
                                <img src={{ asset('uploads/banners/'.$item->thumbnail) }} alt={{ $item->title }}>
                                <div class="blog-body-text">
                                    <h2 class="blog-body-title">{{ $item->title }}</h2>
                                    <p class="blog-body-desc">{{ $item->description }}</p>
                                    {{-- <p>{{ $item->updated_at }}</p> --}}

                                </div>
                            </div>

                            <div class="blog-feature">
                                <div class="blog-feature-content">
                                    <div class="blog-feature-content-item">
                                        <a href="{{ 'edit-banner' }}?id={{ $item->id }}"><button class="btn btn-danger">Edit</button></a>
                                    </div>
                                    <div class="blog-feature-content-item">
                                        <button onclick="deleteBanner({{ $item->id }})" class="btn btn-warning">Delete</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
