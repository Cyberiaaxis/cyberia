<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Attack Page!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <style>
        html,
        body {
            background-color: black;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .row {
            overflow: hidden;
        }

        .bg-img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        #gun {
            display: block;
            position: relative;
            z-index: 1030;
        }

        .result {
            display: block;
            z-index: 100;
        }

        .smoke {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('{{ asset('img/smoke.png') }}') no-repeat;
            bottom: 150px;
            margin-left: 0px
        }

        @-webkit-keyframes masked-animation {
            0% {
                background-position: left bottom;
            }
            100% {
                background-position: right bottom;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="result"></div>
            <h1 id="gun">Hello, world!</h1>
            <img src="{{ asset('img/city.jpg') }}" class="img-fluid bg-img" alt="Responsive image">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#gun").click(function() {
                $('.bg-img').addClass('animated bounce delay-2s');
            });

            $(".result").ready(function() {
                var a = 0;
                for (; a < 10; a += 1) {
                    setTimeout(function b() {
                        var a = Math.random() * 1e3 + 5e3,
                            c = $("<div />", {
                                "class": "smoke",
                                css: {
                                    left: Math.random() * 800,
                                    backgroundSize: "contain",
                                    width: Math.random() * 800,
                                    height: Math.random() * 600
                                }
                            });
                        $(c).addClass("animated");
                        $(c).addClass("zoomIn");
                        $(c).addClass("rollOut");
                        $(c).appendTo(".result");
                        $.when($(c).animate({}, {
                                duration: a / 4,
                                easing: "linear",
                                queue: false,
                                complete: function() {
                                    $(c).animate({}, {
                                        duration: a / 3,
                                        easing: "linear",
                                        queue: false
                                    })
                                }
                            }),
                            $(c).animate({
                                bottom: $(".result").height()
                            }, {
                                duration: a,
                                easing: "linear",
                                queue: false
                            })).then(
                            function() {
                                $(c).remove();
                                b()
                            })
                    }, Math.random() * 3e3);
                }
            });
        });
    </script>
</body>

</html>
