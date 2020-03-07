<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

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

                        <a href="{{ route('login') }}" class="btn btn-info text-uppercase" data-toggle="modal" data-target="#exampleModal">

                            <i class="fa fa-lg fa-user-circle"></i> Sign in</a>

                    </li>

                    @endauth

                </ul>

            </div>

        </div>

    </nav>

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content bg-transparent">

                <div class="modal-header">

                    <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <form id="#" method="post" action="#" enctype="multipart/form-data">

                    <div class="modal-body">

                <div class="signin-content">
                    <div class="signin-image m-auto">
                        <figure><i class="fa fa-2x fa-sign-in"></i></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="fa fa-users text-white"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-lock text-white"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Login</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="notification">

    </div>

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
    <script>
        $(document).ready(function() {

            var delayEventsBy = 3,

                serverPollWait = 10,

                bubbleFadeDuration = 1,

                bubbleDuration = 30,

                maxTries = 5,

                maxSimultaneousBubbles = 10;

            var spec = {

                global: {

                    remoteParameters: {

                        type: "events"

                    },

                    element: $(".notification")

                }

            };

            renderBubble(spec);

            function renderBubble(spec) {

                var boxes = {};

                for (var name in spec) {

                    boxes[name] = {};

                    boxes[name].box = $(spec[name].element);

                    boxes[name].queue = [];

                    boxes[name].lastSeen = null;

                    boxes[name].remoteParameters = spec[name].remoteParameters;

                }

                function positionBubble(livebox, bubble) {

                    var w = bubble.width(),

                        h = bubble.height(),

                        x = 0,

                        y = 0;

                    var others = [];

                    livebox.box.children().each(function() {

                        var layout = $(this).data("layout");

                        if (layout) {

                            var l = layout.split(":");

                            others.push({

                                x1: +l[0],

                                y1: +l[1],

                                x2: +l[2],

                                y2: +l[3]

                            });

                        }

                    });

                    var maxTries = 100,

                        boundingBox = {

                            w: livebox.box.width(),

                            h: 120

                        };

                    for (var i = 0; i < maxTries; ++i) {

                        x = Math.floor(Math.random() * (boundingBox.w - w));

                        y = Math.floor(Math.random() * 120);

                        var space = true;

                        for (var j = 0; j < others.length; ++j) {

                            var o = others[j];

                            if (!(x + w <= o.x1 || x >= o.x2 || y + h <= o.y1 || y >= o.y2)) {

                                space = false;

                                break;

                            }

                        }

                        if (space)

                            break;

                    }

                    bubble.data("layout", x + ":" + y + ":" + (x + w) + ":" + (y + h));

                    bubble.css({

                        'margin-left': x,

                        'margin-top': y,

                    });

                }

                function enqueue(livebox, objects) {

                    if (!objects || objects.length == 0)

                        return;

                    objects.sort(function(a, b) {

                        return b.secondssince - a.secondssince;

                    });

                    var now = (new Date()).getTime(),

                        i;

                    for (i = objects.length - 1; i >= 0; --i) {

                        if (objects[i].id == livebox.lastSeen)

                            break;

                    }

                    ++i;

                    for (; i < objects.length; ++i)

                        insertBubble(livebox, objects[i]);

                    livebox.lastSeen = objects[objects.length - 1].id;

                }

                function insertBubble(livebox, o) {

                    var delay = delayEventsBy * 1000 - o.secondssince * 1000;

                    if (delay < -delayEventsBy * 1000 / 2)

                        return;

                    if (delay < 0)

                        delay = Math.random() * delayEventsBy * 1000;

                    if (livebox.box.children().length >= maxSimultaneousBubbles)

                        return;

                    var d = $('<div class="bubble" style="display:none;"><div class="bubble-inner"><div class="bubble-text">' + o.text + '</div></div><div class="bubble-tail"></div></div>');

                    livebox.box.append(d);

                    d.delay(delay).queue(function(next) {

                        positionBubble(livebox, $(this));

                        next();

                    }).fadeIn(bubbleFadeDuration * 1000).delay(bubbleDuration * 1000).fadeOut(bubbleFadeDuration * 1000, function() {

                        $(this).remove();

                    });

                }

                var k = '{"global":[{"id":"5e52e25ea86d0dd3bd21cb67","text":"FadenK  was attacked","secondssince":0},{"id":"5e52e25e0bbda5bcb1723556","text":"_RAVEN_ left iribuya on the street","secondssince":0},{"id":"5e52e25ea86d0dad784e945e","text":"RedAlex177789  was attacked","secondssince":0},{"id":"5e52e25d9b1c9e44bf334d8c","text":"YorkTzu left ManWithNoName on the street","secondssince":1},{"id":"5e52e25d0bbda5ca0b6f59fa","text":"Capt-Archie  was attacked","secondssince":1},{"id":"5e52e25c9b1c9e516601dd76","text":"Someone mugged rockleegui","secondssince":2},{"id":"5e52e25ca86d0da18254b279","text":"spellwhiz  was attacked","secondssince":2},{"id":"5e52e25b0bbda5e64f0b5c72","text":"iribuya  was attacked","secondssince":3},{"id":"5e52e25aa86d0dddb60f6048","text":"Flojob mugged ANYB22","secondssince":4},{"id":"5e52e2599b1c9e3b3f2dd9db","text":"Someone mugged Thesaurus","secondssince":5}],"chat":[{"id":"1582490181-3105954","text":"LordOfPears says: Tea lans","secondssince":25},{"id":"1582490175-3105953","text":"Malvo says: Like australia does","secondssince":31},{"id":"1582490173-3105952","text":"PrincessJulie says: the british subcontinent","secondssince":33},{"id":"1582490156-3105951","text":"betcho says: Uk*","secondssince":50},{"id":"1582490153-3105950","text":"Malvo says: I say they just call themselves the 8th continent","secondssince":53},{"id":"1582490131-3105949","text":"AcidCypher says: yeh Britain is part of Europe. just not e.u","secondssince":75},{"id":"1582490087-3105948","text":"Malvo says: I m Good, how are you porter","secondssince":119},{"id":"1582490073-3105947","text":"porter2927 says: Nevermind","secondssince":133},{"id":"1582490029-3105946","text":"Malvo says: Is britain even europe anymore?","secondssince":177},{"id":"1582490026-3105945","text":"porter2927 says: How is everyone?","secondssince":180}]}';

                k = JSON.parse(k);

                enqueue(boxes[name], k[name]);

            }

         $(".list-group").marquee({
             duration: 5000,
             duplicated: true,
             direction: 'up',
             gap: 0,
             pauseOnHover: true,
       });

        });
    </script>

    <style>

    </style>

</body>

</html>