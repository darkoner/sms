<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Management System</title>
    <link rel="shortcut icon" href="{{ URL::asset('img/pc-png2.png')}}"/>
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic"
        rel="stylesheet">

    {{-- Icons.css --}}
    <link href="{{ URL::asset('icons/fuse-icon-font/style.css') }}?v=<?php echo time() ?>" rel="stylesheet"
          type="text/css">
    {{-- PNotify --}}
    <link href="{{ URL::asset('css/plugins/pnotify/dist/PNotifyBrightTheme.css') }}?v=<?php echo time() ?>"
          rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">

    {{-- Main CSS --}}
    <link href="{{ URL::asset('css/theme/main.css') }}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/custom/custom.css') }}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">

    {{-- jQuery --}}
    <script src="{{ URL::asset('js/plugins/jquery.min.js') }}?v=<?php echo time() ?>"></script>

    {{-- Select2 --}}
    <link href="{{URL::asset('css/plugins/select2.min.css')}}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">

    {{-- Summernote --}}
    <link href="{{URL::asset('css/plugins/summernote-bs4.min.css')}}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/plugins/spectrum.css')}}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">

    {{--Fancy Box--}}
    <link href="{{URL::asset('css/plugins/jquery.fancybox.min.css')}}?v=<?php echo time() ?>" rel="stylesheet" type="text/css">

    {{-- Angular --}}
    <script src="{{ URL::asset('js/angular/angular.min.js') }}"></script>
    <script src="{{ URL::asset('js/angular/angular-route.js') }}"></script>
    <script src="{{ URL::asset('js/angular/app.js') }}?v=<?php echo time() ?>"></script>
</head>
