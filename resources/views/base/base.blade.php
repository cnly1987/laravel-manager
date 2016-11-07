<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>国泰安营运管理中心</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

    @yield('css')
</head>

<body id="page-top" class="index">
    @include('base.nav')


        @yield('content')


    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>
</html>