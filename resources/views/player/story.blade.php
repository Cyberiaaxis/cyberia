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
    <style>
        .ml3 {
            font-weight: 900;
            font-size: 1.5em;
            color: white;
        }
        .card-header {
            font-weight: 900;
            font-size: 1.5em;
            color: white;
        }
        
        .bg-img {
            background-image: url("{{ asset('img/city.jpg') }}");
             background-size: cover;
        }
        
        .body {
            background-color: black;
        }
    </style>
</head>

<body scroll="no" class="bg-img">

    <div class="container-fluid">

        <div class="card border-0 bg-transparent">
            <div class="card-header bg-transparent border-success">Welcome</div>
              <div class="card-body text-justify bg-transparent border-success ml3">
                  Chairs in criminology these days are to be found primarily in faculties of law – such as at the universities in Cologne, Tübingen, Heidelberg, Münster, Bochum and Giessen. For the most part they are affiliated with departments of criminal law relating to juvenile offenders. And this is no coincidence: adolescents and young adults come into conflict with the law particularly often, even if they commit only minor offences in many cases. In Germany, young people are held legally responsible for their crimes from the age of 14. “One in five alleged criminals in Germany falls within the scope of juvenile criminal law”, says Professor Frank Neubacher, director of the Institute of Criminology at the University of Cologne (only in German).

              </div>
              <div class="card-footer d-flex">
                      <button type="button" class="btn btn-outline-success">Accept</button>
                      <button type="button" class="btn btn-outline-danger ml-auto">Deny</button>
              </div>
             </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script>
        var textWrapper = document.querySelector('.ml3');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({
                loop: false
            })
            .add({
                targets: '.card-header,.ml3,.letter',
                opacity: [0, 1],
                easing: "easeInOutQuad",
                duration: 550,
                delay: (el, i) => 150 * (i + 1)
            });
    </script>
</body>

</html>