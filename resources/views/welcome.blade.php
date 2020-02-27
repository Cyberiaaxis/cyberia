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

     <link rel="stylesheet" href="{{ asset('css/animate.css') }}">



</head>



<body scroll="no" style="overflow: hidden" >

	<nav class="navbar navbar-expand-lg navbar-dark bg-transperent fixed-top">

		<div class="container">

			<button type="button" class="btn btn-default btn-circle" data-toggle="collapse" id="sidebar-nav" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Menu">

                <span class="navbar-toggler-icon"></span>

			</button>



			<a class="navbar-brand d-flex align-items-center" href="/">

				<img src="{{ asset('img/logo/logo.png') }}" alt="Logo" width="100" height="30" class="img-responsive d-inline-block align-top">

			</a>

			<ul class="navbar-nav flex-row ml-auto">

				<li class="nav-item mr-3">

					<div class="dropdown">

						<a href="#" role="button" class="btn btn-default options-btn" id="options-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

							<i class="fa fa-ellipsis-v "></i>

						</a>

						<div class="dropdown-menu" aria-labelledby="options-btn">

							<div class="dropdown-item">

								<div class="custom-control custom-switch">

									<input type="checkbox" class="custom-control-input" id="theme">

									<label class="custom-control-label" for="theme">Dark Theme</label>

								  </div>

							</div>

						  </div>

					</div>

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

					<a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

						<i class="fa fa-sign-out"></i> Logout

					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">

						@csrf

					</form>

				</li>

				@else

				<li>

					<a href="{{ route('login') }}" class="btn btn-outline-info text-uppercase" data-toggle="modal" data-target="#exampleModal">

						<i class="fa fa-lg fa-user-circle"></i> Sign in</a>

					</li>

				@endauth

			</ul>

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

            <div class="form-group">

                <label for="name" class="col-form-label text-white">User Name:</label>

                <input type="text" class="form-control" name="username" required autofocus>

            </div>

            <div class="form-group">

                <label for="password" class="col-form-label text-white">Password:</label>

                <input type="password" class="form-control" name="password" required autofocus>

            </div>

        </div>

        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary" >Login</button>

        </div>

    </form>

    </div>

  </div>

</div>



	<div id="carouselExampleFade" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner">

			<div class="carousel-item active">

				<img src="{{ asset('img/city.jpg') }}" class="d-block w-100 h-100 animated rotateIn  delay-10s" alt="Slide 1">

			</div>

			<div class="carousel-item">

				<img src="{{ asset('img/city2.jpg') }}" class="d-block w-100 h-100 animated rotateInDownRight delay-10s" alt="Slide 2">

			</div>

			<div class="carousel-item">

				<img src="{{ asset('img/city3.jpg') }}" class="d-block w-100 h-100 animated rotateInUpLeft delay-5s" alt="Slide 3">

			</div>

            <div class="carousel-item">

				<img src="{{ asset('img/city.jpg') }}" class="d-block w-100 h-100 animated rotateInUpRight delay-7s" alt="Slide 1">

			</div>


		</div>

		<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">

			<span class="carousel-control-prev-icon" aria-hidden="true"></span>

			<span class="sr-only">Previous</span>

		</a>

		<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">

			<span class="carousel-control-next-icon" aria-hidden="true"></span>

			<span class="sr-only">Next</span>

		</a>

	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

	<script>

      $(document).ready(function(){



        var delayEventsBy = 3,

            serverPollWait = 10,

            bubbleFadeDuration = 1,

            bubbleDuration = 10,

            maxTries = 5,

            maxSimultaneousBubbles = 10;



        var spec = {

            global: {

                remoteParameters: {

                    type: "events"

                },

                element: $(".carousel")

            }

        };

        renderBubble(spec);



    function renderBubble(spec) {

        var boxes = {};

        for (var name in spec) {

            boxes[name] = {};

            boxes[name].box = $(spec[name].element).find(".carousel-inner");

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

            var boundingBox = {

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

                'margin-top': y

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



    });





    </script>



    <style>

    .bubble {

        position: absolute;

        top: 0;

        left: 0;

        padding-top: 10px;

        z-index: 4

    }



    .bubble .bubble-tail {

        padding-bottom: 12px

    }



    .bubble-inner {

        background-color: #222;

        background-image: -moz-linear-gradient(rgb(58, 58, 58) 0%, rgb(34, 34, 34) 100%);

        background-image: -webkit-gradient(linear, color-stop(0, rgb(58, 58, 58)), color-stop(1, rgb(34, 34, 34)));

        background-image: -webkit-linear-gradient(rgb(58, 58, 58) 0%, rgb(34, 34, 34) 100%);

        background-image: -o-linear-gradient(rgb(58, 58, 58) 0%, rgb(34, 34, 34) 100%);

        background-image: -ms-linear-gradient(rgb(58, 58, 58) 0%, rgb(34, 34, 34) 100%);

        background-image: linear-gradient(rgb(58, 58, 58) 0%, rgb(34, 34, 34) 100%);

        -moz-box-shadow: 1px 1px 4px rgba(0, 0, 0, .45), inset 0 1px 0 rgba(255, 255, 255, .1);

        -webkit-box-shadow: 1px 1px 4px rgba(0, 0, 0, .45), inset 0 1px 0 rgba(255, 255, 255, .1);

        box-shadow: 1px 1px 4px rgba(0, 0, 0, .45), inset 0 1px 0 rgba(255, 255, 255, .1);

        line-height: 16px;

        color: #ccc;

        padding: 5px 10px;

        border-radius: 5px

    }



    .bubble a {

        text-decoration: none

    }



    .bubble a {

        color: #30a7a7

    }

</style>

  </body>

</html>
