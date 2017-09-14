<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $company->name }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/themes/theme2/theme2.css') }}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
<!--     <link href="./assets/css/demo.css" rel="stylesheet" /> -->
    @yield('styles')
</head>

<body class="index-page">
    <div id="root" >
        <!-- Navbar -->
        @include('layouts.themes.theme2.partials.nav')   

        <!-- End Navbar -->
        <div class="wrapper">
            <!-- Start header -->
            
            @yield('header')
            @include('flash::message')
            <!-- End header -->
            <!-- Start Content -->
            <div class="main">
                @yield('content')
            </div>
            <!-- End Content -->
            <!-- Start Modals -->
            @yield('modals')
{{--             <div  style="width: 400px; height: 400px">
                {!! Mapper::render() !!}
            </div> --}}
            <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true" id="map">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mx-auto d-block table-responsive"  style="width: 325px; height: 325px">
                                {!! Mapper::render() !!}
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modals -->
            <!-- Start Footer -->
            @include('layouts.themes.theme2.partials.footer')
            <!-- End Footer -->
        </div>
    </div>
    @yield('variables')
</body>
<!--   Core JS Files   -->
<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
@yield('scripts')

</html>