@extends('layouts.master') @section('content')
<section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center py-3">
                    <h2 class="text-white mb-0 mr-auto">Forums</h2><a class="btn btn-dark btn-shadow" href="forum-create.html" role="button">Add new topic</a></div>
            </div>
        </div>
    </div>
</section>
<nav class="bg-white border-bottom" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forums</li>
        </ol>
    </div>
</nav>
<section class="pt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h6 class="subtitle font-size-md">general Forums</h6>
                <table class="table table-bordered table-dashed mb-5">
                    <thead>
                        <tr>
                            <th class="d-none d-md-table-cell" style="width: 5%;" scope="col"></th>
                            <th scope="col">Forum</th>
                            <th class="text-center" style="width: 5%" scope="col">Topics</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 5%" scope="col">Replies</th>
                            <th class="d-none d-lg-table-cell" style="width: 25%" scope="col">Latest Topic</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-comments"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Games Discussion</a></h6>
                                <p class="table-text">Disquss everything about games and videos here.</p>
                            </td>
                            <td class="text-center">182</td>
                            <td class="d-none d-sm-table-cell text-center">129</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">New Bioshock in the works at 2K</a>
                                <div class="table-meta"><a href="profile.html">Nathan Drake</a> on Sep 16, 2018</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-video"></i><span class="badge badge-success">new</span></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Gametrailers</a></h6>
                                <p class="table-text">Share game trailers about your favourite game.</p>
                            </td>
                            <td class="text-center">171</td>
                            <td class="d-none d-sm-table-cell text-center">53</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Games getting stale</a>
                                <div class="table-meta"><a href="profile.html">Clark Kent</a> on Sep 13, 2018</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-camera-retro"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Recent Photos</a></h6>
                                <p class="table-text">New pictures and screenshots from upcoming games.</p>
                            </td>
                            <td class="text-center">164</td>
                            <td class="d-none d-sm-table-cell text-center">245</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Most popular Gaming Forums?</a>
                                <div class="table-meta"><a href="profile.html">Trevor</a> on Sep 10, 2018</div>
                            </td>
                        </tr>
                        <tr class="table-locked">
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-lock"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Closed Thread</a></h6>
                                <p class="table-text">This is an example for locked forum.</p>
                            </td>
                            <td class="text-center">179</td>
                            <td class="d-none d-sm-table-cell text-center">155</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Retro Import platformers</a>
                                <div class="table-meta"><a href="profile.html">Clark Kent</a> on Aug 29, 2018</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-comments"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">YouTubers &amp; Streamers</a></h6>
                                <p class="table-text">Let's talk about streamers and youtubers.</p>
                            </td>
                            <td class="text-center">310</td>
                            <td class="d-none d-sm-table-cell text-center">183</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Sega Entering Console Market</a>
                                <div class="table-meta"><a href="profile.html">Aragorn</a> on Aug 27, 2018</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-bug"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Bug Reporting &amp; Feedback</a></h6>
                                <p class="table-text">Have a bug to report? Post here!</p>
                            </td>
                            <td class="text-center">108</td>
                            <td class="d-none d-sm-table-cell text-center">103</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Which game is best online?</a>
                                <div class="table-meta"><a href="profile.html">Venom</a> on Aug 25, 2018</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fab fa-rebel"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Ask the Mods</a></h6>
                                <p class="table-text">Work In Progress Game, any possibility</p>
                            </td>
                            <td class="text-center">220</td>
                            <td class="d-none d-sm-table-cell text-center">191</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">What do you think about this kind of game?</a>
                                <div class="table-meta"><a href="profile.html">Elizabeth</a> on Aug 21, 2018</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fas fa-bomb"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Bomb Squad</a></h6>
                                <p class="table-text">If you are looking for a team just post a thread</p>
                            </td>
                            <td class="text-center">90</td>
                            <td class="d-none d-sm-table-cell text-center">142</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Games like Prey or Dark Souls</a>
                                <div class="table-meta"><a href="profile.html">Nathan Drake</a> on Aug 20, 2018</div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="d-none d-md-table-cell" scope="col"></th>
                            <th scope="col">Forum</th>
                            <th class="text-center" scope="col">Topics</th>
                            <th class="d-none d-sm-table-cell text-center" scope="col">Replies</th>
                            <th class="d-none d-lg-table-cell" scope="col">Latest Topic</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- end .table -->
                <h6 class="subtitle font-size-md">platforms Forums</h6>
                <table class="table table-bordered table-dashed mb-5">
                    <thead>
                        <tr>
                            <th class="d-none d-md-table-cell" style="width: 5%;" scope="col"></th>
                            <th scope="col">Forum</th>
                            <th class="text-center" style="width: 5%" scope="col">Topics</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 5%" scope="col">Replies</th>
                            <th class="d-none d-lg-table-cell" style="width: 25%" scope="col">Latest Topic</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fab fa-twitch"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Twitch</a></h6>
                                <p class="table-text">Share your favourite moments from twitch</p>
                            </td>
                            <td class="text-center">207</td>
                            <td class="d-none d-sm-table-cell text-center">21</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">I don't get why anyone would buy</a>
                                <div class="table-meta"><a href="profile.html">Clark Kent</a> on Jan 15, 2020</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fab fa-steam-symbol"></i><span class="badge badge-danger">sale</span></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Steam</a></h6>
                                <p class="table-text">Best deals and games on steam</p>
                            </td>
                            <td class="text-center">127</td>
                            <td class="d-none d-sm-table-cell text-center">118</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Please help me find a game</a>
                                <div class="table-meta"><a href="profile.html">Elizabeth</a> on Jan 15, 2020</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fab fa-youtube"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Youtube</a></h6>
                                <p class="table-text">Disquss everything about youtubers</p>
                            </td>
                            <td class="text-center">358</td>
                            <td class="d-none d-sm-table-cell text-center">88</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Which game console is the best?</a>
                                <div class="table-meta"><a href="profile.html">Aragorn</a> on Jan 15, 2020</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fab fa-playstation"></i></td>
                            <td>
                                <h6 class="table-title"><a href="forum-topic.html">Playstation</a></h6>
                                <p class="table-text">Only if you like and prefer playstation</p>
                            </td>
                            <td class="text-center">289</td>
                            <td class="d-none d-sm-table-cell text-center">142</td>
                            <td class="d-none d-lg-table-cell"><a class="table-subtitle" href="forum-post.html">Should I get the PS4 Pro?</a>
                                <div class="table-meta"><a href="profile.html">Venom</a> on Jan 15, 2020</div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="d-none d-md-table-cell" scope="col"></th>
                            <th scope="col">Forum</th>
                            <th class="text-center" scope="col">Topics</th>
                            <th class="d-none d-sm-table-cell text-center" scope="col">Replies</th>
                            <th class="d-none d-lg-table-cell" scope="col">Latest Topic</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- end .table -->
                <!-- <div class="card card-secondary shadow-none mb-5 rounded-0">
                    <h6 class="card-header bg-lighten">Login to the account</h6>
                    <div class="card-body">
                        <form class="form-inline">
                            <div class="input-group mr-md-2 mb-2 mb-md-0">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-light btn-icon border-right-0 pr-1"><i class="fa fa-user"></i></button>
                                </div>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mr-md-3 mb-2 mb-md-0">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-light btn-icon border-right-0 pr-1"><i class="fa fa-unlock"></i></button>
                                </div>
                                <input type="password" class="form-control" placeholder="Password">
                            </div><a class="border-right pr-3 mr-3 d-none d-lg-inline" href="lost-password.html">I forgot my password</a>
                            <div class="custom-control custom-checkbox mr-md-3">
                                <input type="checkbox" class="custom-control-input" id="check">
                                <label class="custom-control-label" for="check">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-outline ml-3 ml-md-0">Login</button>
                        </form>
                    </div>
                </div> -->
                <!-- end .card -->
                <!-- <div class="card card-secondary shadow-none rounded-0">
                    <h6 class="card-header bg-lighten">Who is online <span class="text-success ml-1">●</span></h6>
                    <div class="card-body">
                        <p>In total there is <strong>151</strong> user online :: 88 registered, 0 hidden and 63 guest (based on users active over the past 5 minutes)
                            <br>Most users ever online was <strong>355</strong> on August 25, 2018 6:45pm</p>
                        <hr>
                        <h6 class="mt-1 mb-3">Online Users: <span class="font-weight-normal">151</span></h6>
                        <a href="profile.html"><img class="avatar avatar-xs" src="img/user-1.jpg" alt="" data-toggle="tooltip" title="" data-original-title="Nathan Drake"></a>
                        <a href="profile.html"><img class="avatar avatar-xs" src="img/user-2.jpg" alt="" data-toggle="tooltip" title="" data-original-title="Venom"></a>
                        <a href="profile.html"><img class="avatar avatar-xs" src="img/user-3.jpg" alt="" data-toggle="tooltip" title="" data-original-title="Elizabeth"></a>
                        <a href="profile.html"><img class="avatar avatar-xs" src="img/user-4.jpg" alt="" data-toggle="tooltip" title="" data-original-title="Trevor"></a>
                        <a href="profile.html"><img class="avatar avatar-xs" src="img/user-5.jpg" alt="" data-toggle="tooltip" title="" data-original-title="Clark Kent"></a>
                    </div>
                </div> -->
                <!-- end .card -->
            </div>
        </div>
    </div>
</section>
@endsection