<!DOCTYPE html>
<html lang="en">

<head>
    <title>Site Title</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
          content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('dashboard_assets\assets\images\favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_assets\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- jquery file upload Frame work -->
    <link href="{{ asset('dashboard_assets\assets\pages\jquery.filer\css\jquery.filer.css') }}" type="text/css"
          rel="stylesheet">
    <link href="{{ asset('dashboard_assets/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}"
          type="text/css" rel="stylesheet">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_assets\assets\icon\themify-icons\themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets\assets\icon\icofont\css\icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets\assets\icon\feather\css\feather.css') }}">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets\assets\css\style.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_assets\assets\css\jquery.mCustomScrollbar.css') }}">
    <!-- Scripts -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('dashboard_assets\bower_components\jquery\js\jquery.min.js') }}">
    </script>
</head>

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @auth
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index-1.htm">
                            <img class="img-fluid" src="{{ asset('dashboard_assets\assets\images\logo.png') }}"
                                 alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i
                                                class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i
                                                class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-pink">5</span>
                                    </div>
                                    {{-- Notification Panel --}}
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Messages</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        @forelse(App\Message::all() as $msg)   <a href="">
                                            <li>

                                                <div class="media">
                                                    <img class="d-flex align-self-center img-radius"
                                                         src="{{ asset('dashboard_assets\assets\images\avatar-4.jpg') }}"
                                                         alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="notification-user">{{$msg->name}}</h5>
                                                        <p class="notification-msg">{{$msg->subject}}</p>
                                                        <span
                                                            class="notification-time">{{$msg->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>

                                            </li>
                                        </a>
                                        @empty
                                            No new message
                                        @endforelse
                                    </ul>

                                </div>
                            </li>
                            {{-- <li class="header-notification">

                            </li> --}}
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('dashboard_assets\assets\images\avatar-4.jpg') }}"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span>{{ Str::title(Auth::user()->name) }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile')}}">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.htm">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.htm">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <i class=" feather icon-log-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @endauth
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @auth
                    {{-- Navigation Panel start --}}
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="{{Request::path() === 'home' ? 'active' : ''}}">
                                    <a href="{{url('home')}}">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Home</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('/')}}" target="_blank">
                                        <span class="pcoded-micon"><i class="feather icon-navigation-2"></i></span>
                                        <span class="pcoded-mtext">Visit Site</span>
                                    </a>
                                </li>

                                <li class="{{Request::path() === 'profile' ? 'active' : ''}}">
                                    <a href="{{url('profile')}}">
                                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                        <span class="pcoded-mtext">Profile</span>
                                    </a>
                                </li>


                                <li class="{{Request::is('add/category') || Request::is('update/category/*') ? 'active' : ''}}">
                                    <a href="{{url('/add/category')}}">
                                        <span class="pcoded-micon"><i class="ti-bag"></i></span>
                                        <span class="pcoded-mtext">Category</span>
                                    </a>
                                </li>


                                <li
                                    class="pcoded-hasmenu {{Request::is('messages*') ? 'active' : ''}}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-message-square"></i></span>
                                        <span class="pcoded-mtext">Contact Message</span> <span
                                            class="pcoded-badge label label-info ">NEW</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{Request::is('messages') ? 'active' : ''}}">
                                            <a href="{{route('messages')}}">
                                                <span class="pcoded-mtext">Inbox</span> <span
                                                    class="pcoded-badge label label-info ">NEW</span>
                                            </a>
                                        </li>
                                        <li class="{{Request::is('messages/trash') ? 'active' : ''}}">
                                            <a href="{{route('messages/trash')}}">
                                                <span class="pcoded-mtext">Trash</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="{{Request::is('add/banner') || Request::is('update/banner/*') ? 'active' : ''}}">
                                    <a href="{{route('add/banner')}}">
                                        <span class="pcoded-micon"><i class="ti-layout-slider"></i></span>
                                        <span class="pcoded-mtext">Banner</span>
                                    </a>
                                </li>

                                <li class="{{Request::is('add/products') || Request::is('update/products/*') ? 'active' : ''}}">
                                    <a href="{{route('add/products')}}">
                                        <span class="pcoded-micon"><i class="ti-shopping-cart"></i></span>
                                        <span class="pcoded-mtext">Products</span>
                                    </a>
                                </li>

                                <li class="{{Request::is('add/testimonials') || Request::is('update/testimonial/*') ? 'active' : ''}}">
                                    <a href="{{url('add/testimonials')}}">
                                        <span class="pcoded-micon"><i class="icofont icofont-quote-left"></i></span>
                                        <span class="pcoded-mtext">Testimonials</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </nav>
                        {{-- Navigation Panel end --}}
                    @endauth
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        @yield('header')
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        @yield('body')
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<script type="text/javascript" src="{{ asset('dashboard_assets\bower_components\jquery-ui\js\jquery-ui.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('dashboard_assets\bower_components\popper.js\js\popper.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('dashboard_assets\bower_components\bootstrap\js\bootstrap.min.js') }}">
</script>
<!-- jquery slimscroll js -->
<script type="text/javascript"
        src="{{ asset('dashboard_assets\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('dashboard_assets\bower_components\modernizr\js\modernizr.js') }}">
</script>
<script type="text/javascript"
        src="{{ asset('dashboard_assets\bower_components\modernizr\js\css-scrollbars.js') }}"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="{{ asset('dashboard_assets\bower_components\i18next\js\i18next.min.js') }}">
</script>
<script type="text/javascript"
        src="{{ asset('dashboard_assets\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js') }}">
</script>
<script type="text/javascript"
        src="{{ asset('dashboard_assets\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js') }}">
</script>
<script type="text/javascript"
        src="{{ asset('dashboard_assets\bower_components\jquery-i18next\js\jquery-i18next.min.js') }}"></script>
<script src="{{ asset('dashboard_assets\assets\js\pcoded.min.js') }}"></script>
<script src="{{ asset('dashboard_assets\assets\js\vartical-layout.min.js') }}"></script>
<script src="{{ asset('dashboard_assets\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- jquery file upload js -->
<script src="{{ asset('dashboard_assets\assets\pages\jquery.filer\js\jquery.filer.min.js') }}"></script>
<script src="{{ asset('dashboard_assets\assets\pages\filer\custom-filer.js') }}" type="text/javascript"></script>
<script src="{{ asset('dashboard_assets\assets\pages\filer\jquery.fileuploads.init.js') }}" type="text/javascript">
</script>
<!-- Select 2 js -->
<script type="text/javascript"
        src="{{ asset('dashboard_assets\bower_components\select2\js\select2.full.min.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('dashboard_assets\assets\js\script.js') }}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
