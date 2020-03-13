$(document).ready(function () {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
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
            livebox.box.children().each(function () {
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
            objects.sort(function (a, b) {
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
            d.delay(delay).queue(function (next) {
                positionBubble(livebox, $(this));
                next();
            }).fadeIn(bubbleFadeDuration * 1000).delay(bubbleDuration * 1000).fadeOut(bubbleFadeDuration * 1000, function () {
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
    
    $(".email").focusout(function () {
      $this = $(this);
        let url = $(this).attr('data-url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post(url, { email: $(this).val() }, function () {
            $this.removeClass('is-invalid').addClass('is-valid');
        }).fail(function (e) {
            $this.removeClass('is-valid').addClass('is-invalid');
            $('.invalid-tooltip').html(e.responseJSON.errors.email[0]);
        });
    });
    $(document).on('submit', '#register form,#login form', function (event) {
        event.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        // console.log(url);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        // console.log(form.serializeArray());
        $.post(url, form.serializeArray())
        .done(response => { 
            console.log(response);
            $('#register form').trigger('reset');
            location.reload(); 
        })
        .fail((function (e) {
            const errors = e.responseJSON.errors;
            $('#register .messages').addClass('alert alert-danger');
            $.each(errors, function (key, value) {
                $('#register .messages').append('<p>' + value + '</p>');
                $('input[name="' + key + '"]').addClass('is-invaild');
            })
        }));
    });
});



