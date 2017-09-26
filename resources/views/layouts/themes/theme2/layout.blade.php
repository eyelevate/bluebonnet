<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
<<<<<<< HEAD
    <link rel="icon" type="image/x-icon" href="{{ asset('public/img/favicon.ico') }}">
=======
    <link rel="icon" type="image/x-icon" href="/img/favicon/favicon.ico">
>>>>>>> 8a0a7264d44194aa79df6facffdfa7968863f38b
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $company->name }} - custom design jewelry</title>
    <meta name="keywords"  content="freyas fine jewelery, box, custom, set, design, near, me, brands, stores, jewelers, for sale, men, women, engagement, rings, necklaces, bracelets, bands, moissanite, lab created, certified, special, dallas, texas, sale, quality, guarantee, best, in town, top, rated"/>
    <meta name="description"  content="Freyas Fine Jewelry best custom made designs for your engagement or personal desires. Best in town, top rated, quality assurance. Dallas, Texas."/>
    <meta name="robots" content="index,follow" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
                            <h5 class="modal-title">Freya's Fine Jewelry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                           <iframe
                            width="350"
                            height="350"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAP_API_KEY') }}&q=5550+Lyndon+B+Johnson+Fwy+%23420,+Dallas,+TX+75240" allowfullscreen>
                            </iframe>
                         
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
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