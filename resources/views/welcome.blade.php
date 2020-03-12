<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cyberia Games!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
</head>

<body scroll="no" class="bg-g">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">Link1</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link3</a>
                    </li>
                    @auth
                    <li>
                        <div class="dropdown mr-1">
                            <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="user-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="{{ user_avatar(auth()->id()) }}" alt="{{ auth()->user()->full_name }}" class="img-circle img-responsive avatar">
						</a>
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-info text-uppercase" data-toggle="modal" data-target="#login">
                            <i class="fa fa-lg fa-user-circle"></i> Sign in
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal flipInX" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-white bg-transparent">
                <div class="modal-header border-0">
                    <h5 class="modal-title m-0">Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-0"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control border-0" placeholder="Username" aria-label="name" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control border-0 email" data-url="{{ route('checkemail') }}" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-0"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control border-0" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" required>
                        </div>
                    </div>                    
                     <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-0"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control border-0" placeholder="Confirm Password" aria-label="password" aria-describedby="basic-addon1" required>
                        </div>
                    </div>                   
                    <button type="submit" class="btn btn-primary btn-block m-auto">Registration</button>
                </div>
                <div class="modal-footer border-0">
                    <div class="col">
                        <a class="text-white" href="{{ route('login') }}" class="btn btn-info text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#login">
                        {{ __('login') }}
                    </a>
                    </div>
                    <div class="col fa-2x d-flex justify-content-end">
                        <i class="fa fa-google  p-2"></i>
                        <i class="fa fa-twitter p-2"></i>
                        <i class="fa fa-facebook p-2"></i>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal flipInX" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-transparent text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title m-0">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addModel" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                     </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-0"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control border-0" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-0"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control border-0" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group text-white">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term">
                        <label for="remember-me" class="label-agree-term">
                            <span>Stay signed in</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="float-right text-white" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a> 
                        @endif

                    </div>
                    <button type="submit" class="btn btn-primary btn-block m-auto">Login</button>
                </div>
                <div class="modal-footer border-0">
                    <div class="col">
                        <a class="text-white" href="{{ route('register') }}" class="btn btn-info text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#register">
                        {{ __('Register') }}
                    </a>
                    </div>
                    <div class="col fa-2x d-flex justify-content-end">
                        <i class="fa fa-google  p-2"></i>
                        <i class="fa fa-twitter p-2"></i>
                        <i class="fa fa-facebook p-2"></i>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="notification"></div>
    <div class="card fixed-bottom w-25 rightlist">
        <h3 class="card-header">Player List</h3>
        <div class="card-body">
            <div class="list-group">
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
            </div>
        </div>
    </div>
    <div class="card fixed-bottom w-25 leftlist">
        <h3 class="card-header">Player List</h3>
        <div class="card-body">
            <div class="list-group">
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
                <a class="list-group-item" href="#">List1</a>
            </div>
        </div>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/city.jpg') }}" class="d-block w-100 h-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/city2.jpg') }}" class="d-block w-100 h-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/city3.jpg') }}" class="d-block w-100 h-100" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/city.jpg') }}" class="d-block w-100 h-100" alt="Slide 1">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>

</html>