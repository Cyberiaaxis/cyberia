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
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

        <div class="c-sidebar-brand">

            {{ config('app.name') }}

        </div>

        <ul class="c-sidebar-nav">

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="index.html">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>

                    </svg> Dashboard<span class="badge badge-info">NEW</span></a>
            </li>

            <li class="c-sidebar-nav-title">Theme</li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="colors.html">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-drop1"></use>

                    </svg> Colors</a>
            </li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="typography.html">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-pencil"></use>

                    </svg> Typography</a>
            </li>

            <li class="c-sidebar-nav-title">Components</li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-puzzle"></use>

                    </svg> Base</a>

                <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/cards.html"><span class="c-sidebar-nav-icon"></span> Cards</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/carousel.html"><span class="c-sidebar-nav-icon"></span> Carousel</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/collapse.html"><span class="c-sidebar-nav-icon"></span> Collapse</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/forms.html"><span class="c-sidebar-nav-icon"></span> Forms</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/jumbotron.html"><span class="c-sidebar-nav-icon"></span> Jumbotron</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/list-group.html"><span class="c-sidebar-nav-icon"></span> List group</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/navs.html"><span class="c-sidebar-nav-icon"></span> Navs</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/pagination.html"><span class="c-sidebar-nav-icon"></span> Pagination</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/popovers.html"><span class="c-sidebar-nav-icon"></span> Popovers</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/progress.html"><span class="c-sidebar-nav-icon"></span> Progress</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/scrollspy.html"><span class="c-sidebar-nav-icon"></span> Scrollspy</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/switches.html"><span class="c-sidebar-nav-icon"></span> Switches</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tables.html"><span class="c-sidebar-nav-icon"></span> Tables</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tabs.html"><span class="c-sidebar-nav-icon"></span> Tabs</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span class="c-sidebar-nav-icon"></span> Tooltips</a></li>

                </ul>

            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-cursor"></use>

                    </svg> Buttons</a>

                <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"><span class="c-sidebar-nav-icon"></span> Buttons</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"><span class="c-sidebar-nav-icon"></span> Buttons Group</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"><span class="c-sidebar-nav-icon"></span> Dropdowns</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"><span class="c-sidebar-nav-icon"></span> Brand Buttons</a></li>

                </ul>

            </li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="charts.html">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-chart-pie"></use>

                    </svg> Charts</a>
            </li>

            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-star"></use>

                    </svg> Icons</a>

                <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span class="badge badge-success">Free</span></a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons - Brand</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons - Flag</a></li>

                </ul>

            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>

                    </svg> Notifications</a>

                <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span class="c-sidebar-nav-icon"></span> Alerts</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span class="c-sidebar-nav-icon"></span> Badge</a></li>

                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span class="c-sidebar-nav-icon"></span> Modals</a></li>

                </ul>

            </li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="widgets.html">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-calculator"></use>

                    </svg> Widgets<span class="badge badge-info">NEW</span></a>
            </li>

            <li class="c-sidebar-nav-divider"></li>

            <li class="c-sidebar-nav-title">Extras</li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-star"></use>

                    </svg> Pages</a>

                <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="login.html" target="_top">

                            <svg class="c-sidebar-nav-icon">

                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-account-logout"></use>

                            </svg> Login</a>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="register.html" target="_top">

                            <svg class="c-sidebar-nav-icon">

                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-account-logout"></use>

                            </svg> Register</a>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="404.html" target="_top">

                            <svg class="c-sidebar-nav-icon">

                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bug"></use>

                            </svg> Error 404</a>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="500.html" target="_top">

                            <svg class="c-sidebar-nav-icon">

                                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bug"></use>

                            </svg> Error 500</a>
                    </li>

                </ul>

            </li>

            <li class="c-sidebar-nav-item mt-auto">
                <a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="https://coreui.io" target="_top">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-cloud-download"></use>

                    </svg> Download CoreUI</a>
            </li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="https://coreui.io/pro/" target="_top">

                    <svg class="c-sidebar-nav-icon">

                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-layers"></use>

                    </svg> Try CoreUI<strong>PRO</strong></a>
            </li>

        </ul>

        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>

    </div>

    <div class="c-wrapper">

        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
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
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#"><i class="fa fa-dashboard mfe-2"></i> Dashboard</a></li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#"><i class="fa fa-users mfe-2"></i> Users</a></li>
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
                        <a class="dropdown-item" href="#">
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
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-sign-out mfe-2"></i> Logout</a>
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
</body>

</html>