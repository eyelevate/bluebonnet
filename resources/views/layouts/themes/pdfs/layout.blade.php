<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $company->name }}</title>
    <base href="{{ url('/') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    <!--   Core JS Files   -->
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    @yield('scripts')

</head>

<body class="">
    @yield('content')
</body>


</html>