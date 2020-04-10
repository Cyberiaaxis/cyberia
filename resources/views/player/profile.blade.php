@extends('layouts.master') @section('content')
<section class="bg-image bg-dark d-flex align-items-end py-3" style="background-color: #3a3a3c !important;min-height: 320px;">
    <img class="background" src="/img/city.jpg" alt="">
    <div class="container position-relative">
        <div class="row">
            <div class="col d-flex flex-column flex-lg-row align-items-center text-center position-absolute bottom left pl-lg-8">
                <a class="avatar-thumbnail avatar-lg d-lg-none bg-dark mb-3 mb-lg-0 border-0" href="#"><img src="/img/profile/1.jpg" alt=""  class="rounded-circle"></a>
                <h2 class="h4 text-white mb-0 ml-2 pl-lg-8">
                    <i class="fa fa-check bg-primary float-left font-size-xs rounded-circle p-2 mr-2" data-toggle="tooltip" title="" data-original-title="verified user"></i> Nathan Drake</h2>
                <div class="ml-lg-auto mt-4 mb-3 my-lg-0"><a class="btn btn-primary btn-sm btn-icon-left font-weight-semibold" href="#"><i class="fa fa-user-add"></i> Add friend</a><a class="btn btn-outline-light btn-sm btn-icon-left font-weight-semibold ml-2" href="#"><i class="fa fa-email"></i> Send message</a></div>
            </div>
        </div>
    </div>
</section>
<div id="sticky-wrapper" class="sticky-wrapper" style="height: 63px;">
    <section class="bg-white border-bottom nav-profile py-0" ya-sticky="" style="width: 1354px;">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <a class="avatar-thumbnail avatar-xl position-absolute d-none d-lg-block" href="#"><img src="/img/profile/1.jpg" alt=""></a>
                    <div class="avatar-fixed d-none d-lg-block">
                        <a class="avatar-tile" href="#"><img src="/img/contact/1.jpg" alt="">
                            <div><strong>Nathan Drake</strong><span class="d-block">@nathan</span></div>
                        </a>
                    </div>
                    <div class="nav-scroll">
                        <div class="nav nav-list nav-list-profile"><a class="nav-item nav-link active" href="#">Timeline</a><a class="nav-item nav-link" href="#">Friends (679)</a><a class="nav-item nav-link" href="#">Groups</a><a class="nav-item nav-link" href="#">Games (38)</a><a class="nav-item nav-link" href="#">Images</a><a class="nav-item nav-link" href="#">Videos</a><a class="nav-item nav-link" href="#">Streams</a><a class="nav-item nav-link" href="#">Forums</a></div>
                    </div>
                    <div class="dropdown d-none d-xl-inline-block ml-auto">
                        <button class="btn btn-default btn-icon" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="profile-settings.html">Settings</a><a class="dropdown-item" href="#">Edit Games</a><a class="dropdown-item" href="#">Mail</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">History</a><a class="dropdown-item" href="#">Security</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="widget mt-4">
                    <div class="widget-header">About me</div>
                    <div class="widget-body">
                        <p>I am a frontend developer &amp; web designer. I love to work on creative and standalone projects like gameforest.</p>
                        <p class="font-size-sm font-weight-semibold mb-1"><i class="fa fa-pin mr-1"></i> Budapest</p>
                        <p class="font-size-sm font-weight-semibold mb-1"><i class="fa fa-twitter mr-1"></i> <a href="https://twitter.com/yakuthemes" target="_blank">yakuthemes</a></p>
                        <p class="font-size-sm font-weight-semibold mb-1"><i class="fa fa-calendar mr-1"></i> Joined December 2009</p><a class="btn btn-outline btn-sm btn-block mt-3" href="#" role="button">Send message</a>
                    </div>
                </div>
                <!-- end .widget -->
                <div class="widget widget-secondary">
                    <div class="widget-header border-0">Navigation</div>
                    <div class="list-group list-group-flush"><a class="list-group-item" href="#"><i class="fa fa-content"></i> Timeline </a><a class="list-group-item" href="#"><i class="fa fa-users"></i> Friends <span class="badge badge-secondary badge-pill">14</span> </a><a class="list-group-item" href="#"><i class="fa fa-image"></i> Images <span class="badge badge-secondary badge-pill">42</span> </a><a class="list-group-item" href="#"><i class="fa fa-player"></i> Videos </a><a class="list-group-item" href="#"><i class="fa fa-camera"></i> Streams <span class="badge badge-secondary badge-pill">23</span> </a>
                        <a class="list-group-item" href="#"><i class="fa fa-comments"></i> Forums </a><a class="list-group-item" href="#"><i class="fa fa-shopping-cart"></i> Shop </a></div>
                </div>
                <!-- end .widget -->
                <div class="widget widget-users">
                    <div class="widget-header">Friends (679)</div>
                    <div class="widget-body">
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Venom"><img src="img/user-2.jpg" alt="Venom"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Elizabeth"><img src="img/user-3.jpg" alt="Elizabeth"><span class="badge badge-warning"></span> </a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Trevor"><img src="img/user-4.jpg" alt="Trevor"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Clark Kent"><img src="img/user-5.jpg" alt="Clark Kent"><span class="badge badge-success"></span> </a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Aragorn"><img src="img/user-default.jpg" alt="Aragorn"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Michael"><img src="img/user-6.jpg" alt="Michael"><span class="badge badge-warning"></span> </a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Max Payne"><img src="img/user-7.jpg" alt="Max Payne"><span class="badge badge-danger"></span> </a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Shroud"><img src="img/user-default.jpg" alt="Shroud"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Lara Croft"><img src="img/user-8.jpg" alt="Lara Croft"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="punisher"><img src="img/user-9.jpg" alt="punisher"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="celebro"><img src="img/user-10.jpg" alt="celebro"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Hitman"><img src="img/user-11.jpg" alt="Hitman"></a>
                        <a href="#" data-toggle="tooltip" title="" data-original-title="Enigma"><img src="img/user-default.jpg" alt="Enigma"></a>
                        <a class="widget-user widget-user-count" href="#"><img src="img/user-default.jpg" alt=""><span>+48</span></a>
                        <div><a class="btn btn-outline btn-block btn-sm mt-3" href="#">View all</a></div>
                    </div>
                </div>
                <!-- end .widget -->
            </div>
            <div class="col-lg-7 order-1 order-lg-2">
                <div class="card">
                    <div class="card-header">Missions</div>
                    <div class="card-body">
                        <h1>Hello World</h1>
                    </div>
                </div>
                <!-- end .card --><a class="btn btn-outline btn-block btn-sm" href="#" role="button">Load More</a></div>
        </div>
    </div>
    </div>
</section>
