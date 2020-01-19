<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Header menu area -->
    <div class="left-sidebar-pro">
        @yield('sidebar')
    </div>

    <!-- End Header menu area -->
    <div class="all-content-wrapper">
        <!-- Start page area -->
        @yield('moblie')
        @yield('content')
        <!-- End page area -->    
        <!-- Start Footer area -->
        @yield('js')
        <!-- End Footer area -->    
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>