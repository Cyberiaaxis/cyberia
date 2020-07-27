<!doctype html>
<html lang="en">

<head>
    @include('partials.player.header')

    <style>
        .c-sidebar {
            width: 200px;
        }

        @media(min-width:992px) and (min-width:992px) {
            html:not([dir=rtl]) .c-sidebar.c-sidebar-lg-show:not(.c-sidebar-right).c-sidebar-fixed~.c-wrapper,
            html:not([dir=rtl]) .c-sidebar.c-sidebar-show:not(.c-sidebar-right).c-sidebar-fixed~.c-wrapper {
                margin-left: 200px;
            }
        }
    </style>
</head>

<body class="c-app c-dark-theme">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show text-center" id="sidebar">
        <div class="c-sidebar-brand flex-sm-row bg-transparent">
            {{ config('app.name') }}
        </div>
        <ul class="c-sidebar-nav mt-1">
            <li class="c-sidebar-nav-item ml-2 mr-2">
                <div class="p-1">

                    Energy {{ auth()->user()->stats->energy }} / {{ auth()->user()->stats->max_energy }}
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ (auth()->user()->stats->energy / auth()->user()->stats->max_energy * 100) }}%;"></div>
                    </div>
                </div>
                <div class="p-1">
                    Nerve {{ auth()->user()->stats->nerve }} / {{ auth()->user()->stats->max_nerve }}
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ (auth()->user()->stats->nerve /  auth()->user()->stats->max_nerve * 100) }}%;"></div>
                    </div>
                </div>
                <div class="p-1">
                    HP {{ auth()->user()->stats->hp }} / {{ auth()->user()->stats->max_hp }}
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ (auth()->user()->stats->hp / auth()->user()->stats->max_hp * 100) }}%;"></div>
                    </div>
                </div>
            </li>
            <li class="c-sidebar-nav-title m-0">Information</li>
            <li class="c-sidebar-nav-item">
                 <!-- https://www.php.net/manual/en/numberformatter.formatcurrency.php -->
                   Money :  {{ auth()->user()->userdetails->money }} <br>
                   Point :  {{ auth()->user()->userdetails->points }}
            </li>
            <li class="c-sidebar-nav-title m-0">Menu</li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href=" {{ route('crime.index')}} "> <i class="fa fa-inbox mr-2"></i> Crime </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('gang.index')}}"> <i class="fa fa-inbox mr-2"></i> Gang </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('forums.index')}}"> <i class="fa fa-inbox mr-2"></i> Forums </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('gym.index')}}"> <i class="fa fa-inbox mr-2"></i> Gym </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('course.index')}}"> <i class="fa fa-inbox mr-2"></i> Course </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="#"> <i class="fa fa-inbox mr-2"></i> Inventory </a>
            </li>
            <li  class="c-sidebar-nav-item"><div class="game-time" id="time"></div></li>
            </ul>

        <!-- <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button> -->
    </div>

    <div class="c-wrapper">

        <header class="c-header c-header-light c-header-fixed c-header-with-subheader bg-transparent">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <i class="fa fa-bars"></i>
            </button>
            <a class="c-header-brand d-lg-none" href="#">
                {{ config('app.name')}}
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="c-header-nav d-md-down-none">
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="/home"><i class="fa fa-dashboard mfe-2"></i> Dashboard</a></li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#"><i class="fa fa-users mfe-2"></i> Explore</a></li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#"><i class="fa fa-cogs mfe-2"></i> Settings</a></li>
            </ul>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item px-3">
                    <button class="c-class-toggler c-header-nav-btn" type="button" data-target="body" data-class="c-dark-theme" data-toggle="tooltip" data-placement="bottom" title="Toggle Light/Dark Mode">
                        <i class="fa fa-moon-o c-d-dark-none"></i>
                        <i class="fa fa-sun-o c-d-default-none"></i>
                    </button>
                </li>
                <li class="c-header-nav-item d-md-down-none mx-2">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-danger">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                        <div class="dropdown-header bg-light"><strong>You have 5 notifications</strong></div>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user-plus mfe-2"></i> New user registered</a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user-times mfe-2"></i> User deleted</a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-line-chart mfe-2"></i> Sales report is ready</a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-shopping-cart mfe-2"></i> New client</a>
                        <a class="dropdown-item" href="#">
                            <svg class="c-icon mfe-2 text-warning">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                            </svg> Server overloaded</a>
                        <div class="dropdown-header bg-light"><strong>Server</strong></div>
                        <a class="dropdown-item d-block" href="#">
                            <div class="text-uppercase mb-1"><small><b>CPU Usage</b></small></div><span class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </span><small class="text-muted">348 Processes. 1/4 Cores.</small>
                        </a>
                        <a class="dropdown-item d-block" href="#">
                            <div class="text-uppercase mb-1"><small><b>Memory Usage</b></small></div><span class="progress progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </span><small class="text-muted">11444GB/16384MB</small>
                        </a>
                        <a class="dropdown-item d-block" href="#">
                            <div class="text-uppercase mb-1"><small><b>SSD 1 Usage</b></small></div><span class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </span><small class="text-muted">243GB/256GB</small>
                        </a>
                    </div>
                </li>
                <li class="c-header-nav-item d-md-down-none mx-2">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-alt"></i>
                        <span class="badge badge-pill badge-warning">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                        <div class="dropdown-header bg-light"><strong>You have 5 pending tasks</strong></div>
                        <a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">Upgrade NPM &amp; Bower<span class="float-right"><strong>0%</strong></span></div><span class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </span>
                        </a>
                        <a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">ReactJS Version<span class="float-right"><strong>25%</strong></span></div><span class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </span>
                        </a>
                        <a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">VueJS Version<span class="float-right"><strong>50%</strong></span></div><span class="progress progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </span>
                        </a>
                        <a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">Add new layouts<span class="float-right"><strong>75%</strong></span></div><span class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </span>
                        </a>
                        <a class="dropdown-item d-block" href="#">
                            <div class="small mb-1">Angular 8 Version<span class="float-right"><strong>100%</strong></span></div><span class="progress progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </span>
                        </a><a class="dropdown-item text-center border-top" href="#"><strong>View all tasks</strong></a>
                    </div>
                </li>
                <li class="c-header-nav-item d-md-down-none mx-2">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope-open"></i>
                        <span class="badge badge-pill badge-info">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                        <div class="dropdown-header bg-light"><strong>You have 4 messages</strong></div>
                        <a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('img/contact/1.jpg') }}" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small class="text-muted float-right mt-1">Just now</small></div>
                                <div class="text-truncate font-weight-bold"><span class="text-danger">!</span> Important message</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('img/contact/1.jpg') }}" alt="user@email.com"><span class="c-avatar-status bg-warning"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small class="text-muted float-right mt-1">5 minutes ago</small></div>
                                <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('img/contact/1.jpg') }}" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small class="text-muted float-right mt-1">1:52 PM</small></div>
                                <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="message">
                                <div class="py-3 mfe-3 float-left">
                                    <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('img/contact/1.jpg') }}" alt="user@email.com"><span class="c-avatar-status bg-info"></span></div>
                                </div>
                                <div><small class="text-muted">John Doe</small><small class="text-muted float-right mt-1">4:03 PM</small></div>
                                <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                                <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                            </div>
                        </a><a class="dropdown-item text-center border-top" href="#"><strong>View all messages</strong></a>
                    </div>
                </li>
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar">
                            <img class="c-avatar-img" src="{{ asset('img/contact/1.jpg') }}" alt="user@email.com">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                        <a class="dropdown-item" href="#">
                            <svg class="c-icon mr-2">
                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
                            </svg> Updates<span class="badge badge-info ml-auto">42</span></a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-envelope mfe-2"></i> Messages<span class="badge badge-success ml-auto">42</span></a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-check-square-o mfe-2"></i> Tasks<span class="badge badge-danger ml-auto">42</span></a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-comments mfe-2"></i> Comments<span class="badge badge-warning ml-auto">42</span></a>
                        <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
                        <a class="dropdown-item" href="{{route('profile.show', auth()->id() )}}">
                            <i class="fa fa-user mfe-2"></i> Profile</a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-cog mfe-2"></i> Settings</a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-credit-card mfe-2"></i> Payments<span class="badge badge-secondary ml-auto">42</span></a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-file mfe-2"></i> Projects<span class="badge badge-primary ml-auto">42</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-lock mfe-2"></i> Lock Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out mfe-2"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                @csrf
                            </form>
                    </div>
                </li>
            </ul>
            <div class="c-subheader px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>

        <div class="c-body">

            <main class="c-main">

                <div class="container-fluid">

                    <div id="ui-view" class="fade-in">

                        <div class="card">

                            <div class="card-header">{{ $title ?? ''}}</div>

                            <div class="card-body">

                                @yield('content')

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>

        <footer class="c-footer">

            <div>
                <a href=""></a> © 2019 creativeLabs.</div>

            <div class="mfs-auto">Powered by&nbsp;<a href="https://coreui.io/pro/">CoreUI Pro</a></div>

        </footer>

    </div>

    @include('partials.player.footer') @yield('js')
    <script>
    function updateTime() {
    const now = "{{ time() }}";
    const currentTime = new Date();
    const v = currentTime.toLocaleString();
    setTimeout("updateTime()",1000);
        document.getElementById('time').innerHTML=v;
    }
    updateTime();
</script>
</body>

</html>
