
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Wondo Choung">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $company->name }} - Admin</title>

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/themes/ionicons/ionicons.css') }}">

    <!-- Main styles for this application -->
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/themes/coreui/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/views/admins/general.css') }}">
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'                  - Fixed Header

// Sidebar options
1. '.sidebar-fixed'                 - Fixed Sidebar
2. '.sidebar-hidden'                - Hidden Sidebar
3. '.sidebar-off-canvas'        - Off Canvas Sidebar
4. '.sidebar-minimized'         - Minimized Sidebar (Only icons)
5. '.sidebar-compact'             - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'          - Fixed Aside Menu
2. '.aside-menu-hidden'         - Hidden Aside Menu
3. '.aside-menu-off-canvas' - Off Canvas Aside Menu

// Footer options
1. '.footer-fixed'                      - Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="root">
	    <header class="app-header navbar">
	        @include('layouts.themes.backend.partials.login-nav')
	    </header>

	    <div class="app-body">

	        <!-- Main content -->
	        <main class="main" style="margin-left:0px;">
                @include('flash::message')
	            @yield('content')
	        </main>

	        <aside class="aside-menu">
	           
	        </aside>
	    </div>
	    <!-- Modals -->
	    @yield('modals')
	    <!-- Footer -->
	    <footer class="app-footer" style="margin-left:0px;">
			@include('layouts.themes.backend.partials.footer')    
		</footer>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/themes/coreui/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/themes/coreui/coreui.js') }}"></script>
    <!-- Custom scripts required by this view -->
    <script type="text/javascript" src="{{ mix('/js/themes/coreui/main.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/views/admins/general.js') }}"></script>
    <!-- Page specific scripts -->
	@yield('scripts')

</body>

</html>
