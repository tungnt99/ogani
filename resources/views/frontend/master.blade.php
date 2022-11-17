<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="{{ url('site') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/style.css">
    <!-- DropZone -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

</head>

<body>
    
    @include('frontend.template.header')

        @yield('main')

    @include('frontend.template.footer')

    <!-- Js Plugins -->
    <script src="{{ url('site') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('site') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('site') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('site') }}/js/jquery-ui.min.js"></script>
    <script src="{{ url('site') }}/js/jquery.slicknav.js"></script>
    <script src="{{ url('site') }}/js/mixitup.min.js"></script>
    <script src="{{ url('site') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('site') }}/js/main.js"></script>

</body>

</html>