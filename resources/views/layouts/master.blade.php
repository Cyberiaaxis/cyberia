<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CyberiaAxis</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
   </head>
   <body>
    <section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center">
                    <h2 class="text-white mb-0 mr-auto">@yield('title','Forums')</h2>
                    @yield('header_btn')
                </div>
        </div>
    </div>
</section>
    <div class="container">
    @yield('content')
    </div>
            @yield('sidebar')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
        @yield('js')
  </body>
</html>
