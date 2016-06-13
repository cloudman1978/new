<!DOCTYPE html>
<html>

<!-- Mirrored from alliance-html.themerex.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2016 10:19:44 GMT -->
<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <base href="http://localhost:8000/">
   

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>

    <!-- -------------- Icomoon -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/icomoon/icomoon.css">

    <!-- -------------- FullCalendar -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">

    <!-- -------------- Plugins -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/c3charts/c3.min.css">

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page">@yield('body')

<!-- -------------- Customizer -------------- -->

<!-- -------------- /Customizer -------------- -->

<!-- -------------- Body Wrap  -------------- -->
<div id="main">

    <!-- -------------- Header  -------------- -->
    <header class="navbar navbar-fixed-top bg-dark">
        <div class="navbar-logo-wrapper">
            <a class="navbar-logo-text" href="#">
                <b>Alliance</b>
            </a>
            <span id="sidebar_left_toggle" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown dropdown-fuse hidden-xs"> 
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Chercher
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Médecin</a></li>
                    <li><a href="#">Dentiste</a></li>
                    <li><a href="#">Chirurigien</a></li>
                    <li><a href="#">Pharmacie</a></li>
                    <li><a href="#">Laboratoire</a></li>
                    <li><a href="#">Radio</a></li>
                    <li><a href="#">Réducation des organes</a></li>
                    <li><a href="#">Cabinet</a></li>
                    <li><a href="#">Hôpital</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Assurance</a></li>
                </ul>
            </li>
            <li class="hidden-xs">
                <a class="navbar-fullscreen toggle-active" href="javascript:history.go(0)">
                    <span class="glyphicon glyphicon-fullscreen"></span>
                </a>
            </li>
        </ul>
        <form class="navbar-form navbar-left search-form square" role="search">
            <div class="input-group add-on">

                <input type="text" class="form-control" placeholder="Chercher..." onfocus="this.placeholder=''"
                       onblur="this.placeholder='Chercher...'">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>

            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
           <!-- <li class="hidden-xs">
                <div class="navbar-btn btn-group">
                    <a href="#" class="topbar-dropmenu-toggle btn" data-toggle="button">
                        <span class="fa fa-magic fs20 text-info"></span>
                    </a>
                </div>
            </li> -->
            <!--<li class="dropdown dropdown-fuse">
                <div class="navbar-btn btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">
                        <span class="fa fa-envelope fs20 text-danger"></span>
                    </button>
                    <button data-toggle="dropdown" class="btn dropdown-toggle fs18 visible-xl">
                        3
                    </button>
                    <div class="dropdown-menu keep-dropdown w375 animated animated-shorter fadeIn" role="menu">
                        <div class="panel mbn">
                            <div class="panel-menu">
                                <div class="btn-group btn-group-justified btn-group-nav" role="tablist">
                                    <a href="#nav-tab1" data-toggle="tab"
                                       class="btn btn-primary btn-bordered btn-sm active">Activity</a>
                                    <a href="#nav-tab2" data-toggle="tab"
                                       class="btn btn-primary btn-bordered btn-sm br-l-n br-r-n">Messages</a>
                                    <a href="#nav-tab3" data-toggle="tab" class="btn btn-primary btn-bordered btn-sm">Notifications</a>
                                </div>
                            </div>
                            <div class="panel-body panel-scroller scroller-overlay scroller-navbar pn">
                                <div class="tab-content br-n pn">
                                    <div id="nav-tab1" class="tab-pane active" role="tabpanel">
                                        <ul class="media-list" role="menu">
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small class="text-muted">- 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small> - 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small class="text-muted">- 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small class="text-muted">- 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small class="text-muted">- 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small> - 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg"
                                                                                     class="mw40 br2"
                                                                                     alt="avatar">
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <small class="text-muted">- 09/01/15</small>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="#"> John Doe </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="nav-tab2" class="tab-pane chat-widget" role="tabpanel">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64"
                                                         src="assets/img/avatars/3.jpg">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Frank Hill
                                                    <small> - 14:10am</small>
                                                </h5>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">George Kelly
                                                    <small> - 15:25am</small>
                                                </h5>
                                            </div>
                                            <div class="media-right">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64"
                                                         src="assets/img/avatars/1.jpg">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64"
                                                         src="assets/img/avatars/2.jpg">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Frank Hill
                                                    <small> - 15:33am</small>
                                                </h5>
                                                Lorem ipsum dolor sit amet, nonummy nibh euismod tinc consectetuer
                                                adipiscing elit.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">George Kelly
                                                    <small> - 15:43am</small>
                                                </h5>
                                                Euismod sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                                aliquam erat volutpat.
                                            </div>
                                            <div class="media-right">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64"
                                                         src="assets/img/avatars/1.jpg">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64"
                                                         src="assets/img/avatars/2.jpg">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Frank Hill
                                                    <small> - 16:30am</small>
                                                </h5>
                                                Corem ipsum dolor sit amet, nonummy nibh euismod tinc co.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">George Kelly
                                                    <small> - 12:30am</small>
                                                </h5>
                                                Ubh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </div>
                                            <div class="media-right">
                                                <a href="#">
                                                    <img class="media-object" alt="64x64"
                                                         src="assets/img/avatars/1.jpg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="nav-tab3" class="tab-pane alerts-widget" role="tabpanel">
                                        <div class="media">
                                            <a class="media-left" href="#"> <span
                                                    class="fa fa-shopping-cart text-success"></span> </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">New Product Order
                                                    <small class="text-muted"></small>
                                                </h5>
                                                <a href="#">iPad Air</a> - 3 hours ago
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Confirm?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-check text-success"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-cog"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#"> <span
                                                    class="fa fa-comment text-system"></span>
                                            </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">Nouveau commentaire
                                                    <small class="text-muted"></small>
                                                </h5>
                                                Sam Fisher - I'd like to read more!
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response text-right"> Moyen?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-check text-success"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#"> <span class="fa fa-eye text-warning"></span>
                                            </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">New User Review
                                                    <small class="text-muted"></small>
                                                </h5>
                                                Sebastian Jones - 5 hours ago
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Approve?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-check text-success"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#"> <span class="fa fa-user text-info"></span>
                                            </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">New User Registration
                                                    <small class="text-muted"></small>
                                                </h5>
                                                Carlos Santiyago - 7 hours ago
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Approve?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-check text-success"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#"> <span class="fa fa-user text-info"></span>
                                            </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">New User Registration
                                                    <small class="text-muted"></small>
                                                </h5>
                                                Douglas Adams - 13 hours ago

                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Approve?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-check text-success"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#"> <span class="fa fa-info text-alert"></span>
                                            </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">New Invoice
                                                    <small class="text-muted"></small>
                                                </h5>
                                                <a href="#">iPad Air</a> - 14 hours ago

                                            </div>
                                            <div class="media-right">
                                                <div class="media-response single">#1234567</div>
                                                <button type="button" class="btn btn-default btn-sm btn-bordered light">
                                                    <i class="fa fa-link"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#"> <span
                                                    class="fa fa-shopping-cart text-success"></span> </a>

                                            <div class="media-body">
                                                <h5 class="media-heading">New Product Order
                                                    <small class="text-muted"></small>
                                                </h5>
                                                <a href="#">iPad Air</a> - 14 hours ago
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Confirm?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-check text-success"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm btn-bordered light">
                                                        <i class="fa fa-cog"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <a href="#" class="btn btn-primary btn-sm btn-bordered"> View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>-->
            <!--<li class="dropdown dropdown-fuse">
                <div class="navbar-btn btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">
                        <span class="fa fa-bell fs20 text-primary"></span>
                    </button>
                    <button data-toggle="dropdown" class="btn dropdown-toggle fs18 visible-xl">
                        8
                    </button>
                    <div class="dropdown-menu keep-dropdown w375 animated animated-shorter fadeIn" role="menu">
                        <div class="panel mbn">
                            <div class="panel-menu">
                                <span class="panel-icon"><i class="fa fa-tasks"></i></span>
                                <span class="panel-title fw600"> Activity reports</span>
                                <button class="btn btn-default light btn-xs btn-bordered pull-right" type="button"><i
                                        class="fa fa-refresh"></i>
                                </button>
                            </div>
                            <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                                <ol class="timeline-list">
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-dark light">
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>John Doe</b> Sent you a message.
                                            <a href="#">View now</a>
                                        </div>
                                        <div class="timeline-date">11:15am</div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-success">
                                            <span class="fa fa-info"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Admin</b> created invoice for:
                                            <a href="#">iPad Air</a>
                                        </div>
                                        <div class="timeline-date">6:26pm</div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-success">
                                            <span class="fa fa-info"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Admin</b> created invoice for:
                                            <a href="#">iPhone 5s</a>
                                        </div>
                                        <div class="timeline-date">11:45am</div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-dark light">
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Lara Johnes</b> Sent you a message.
                                            <a href="#">View now</a>
                                        </div>
                                        <div class="timeline-date">3:18pm</div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-primary">
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Richard Johnes</b> Added to wishlist:
                                            <a href="#">iPhone 5c</a>
                                        </div>
                                        <div class="timeline-date">8:15am</div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-success">
                                            <span class="fa fa-info"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Admin</b> created invoice for:
                                            <a href="#">Mac Pro</a>
                                        </div>
                                        <div class="timeline-date">9:29pm</div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-primary">
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Douglas Adams</b> Added to wishlist:
                                            <a href="#">iPad 4</a>
                                        </div>
                                        <div class="timeline-date">3:05am</div>
                                    </li>
                                </ol>

                            </div>
                            <div class="panel-footer text-center">
                                <a href="#" class="btn btn-primary btn-sm btn-bordered"> View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>-->
         


            <!--pour les langues 
            <li class="dropdown dropdown-fuse">
                <div class="navbar-btn btn-group">
                    <button data-toggle="dropdown" class="btn btn-md dropdown-toggle">
                        FR
                    </button>
                    <ul class="dropdown-menu pv5 animated animated-short fadeIn" role="menu">
                        <li>
                            <a href="javascript:void(0);"> Anglais </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Allemand </a>
                        </li>
                    </ul>
                </div>
            </li> 



            -->

         
            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="hidden-xs"><name>@yield('user')</name> </span>
                   <!-- <span class="fa fa-caret-down hidden-xs mr15"></span> -->
                    <img src="assets/img/avatars/backoffice.png" alt="avatar" class="mw55">
                </a>
               
            </li>
        </ul>
    </header>
    <!-- -------------- /Header  -------------- -->

    <!-- -------------- Sidebar  -------------- -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">

            <!-- -------------- Sidebar Header -------------- -->
            <header class="sidebar-header">

                <!-- -------------- Sidebar - Author -------------- -->
                <div class="sidebar-widget author-widget">
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="assets/img/avatars/backoffice.png" class="img-responsive">
                        </a>
                    </div>
                </div>

                <!-- -------------- Sidebar - Author Menu  -------------- -->
                <div class="sidebar-widget menu-widget">
                    <div class="row text-center mbn">
                        <div class="col-xs-2 pln prn">
                            <a href="#" class="text-primary" data-toggle="tooltip" data-placement="top"
                               title="Tableu de bord">
                                <span class="fa fa-dashboard"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="charts-highcharts.html" class="text-info" data-toggle="tooltip"
                               data-placement="top" title="Stats">
                                <span class="fa fa-bar-chart-o"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="sales-stats-products.html" class="text-system" data-toggle="tooltip"
                               data-placement="top" title="Orders">
                                <span class="fa fa-info-circle"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="sales-stats-purchases.html" class="text-warning" data-toggle="tooltip"
                               data-placement="top" title="Invoices">
                                <span class="fa fa-file"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="basic-profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                               title="Users">
                                <span class="fa fa-users"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="management-tools-dock.html" class="text-danger" data-toggle="tooltip"
                               data-placement="top" title="Settings">
                                <span class="fa fa-cogs"></span>
                            </a>
                        </div>
                    </div>
                </div>

            </header>
            <!-- -------------- /Sidebar Header -------------- -->

            <!-- -------------- Sidebar Menu  -------------- -->
            <ul class="nav sidebar-menu">
            
              

                <li class="sidebar-label pt30">Menu</li>
                <li>
                    <a href="/backoffice/">
                        <span class="fa fa-home"></span>
                        <span class="sidebar-title">Accueil</span>
                    </a>
                </li> 
                <li>
                    <a href="/backoffice/contact">
                        <span class="fa fa-envelope"></span>
                        <span class="sidebar-title">Contact</span>
                    </a>
                </li> 
                 <li>
                    

                            <?php 
                                $user = Auth::user();
                                if (!$user): ?>
                                
                        <a href="backoffice/auth/login">
                        <span class="fa fa-user"></span>
                        <span class="sidebar-title"> Connecter
                        </span>
                    </a>  
                    <?php endif; ?>      

                             <?php 
                               
                                if ($user): ?>
                                
                                    <a href="/backoffice/auth/logout">
                        <span class="fa fa-user"></span>
                        <span class="sidebar-title"> Déconnecter
                        </span>
                    <?php endif; ?>
                    </a>
                </li>
                    <li>
                    <a href="/backoffice/auth/register">
                        <span class="fa fa-user"></span>
                        <span class="sidebar-title">S'inscrire</span>
                    </a>
                </li>
                @yield('menu')     

            </ul>

        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>
    <!-- -------------- /Sidebar -------------- -->

    <!-- -------------- Main Wrapper -------------- -->

    @yield('content')
     <footer id="content-footer" class="affix">
            <div class="row">
                <div class="col-md-6">
                   <!-- <span class="footer-legal">© 2015 All rights reserved. <a href="#">Therms of use</a> and <a
                            href="#">Privacy policy</a></span>-->
                </div>
                <div class="col-md-6 text-right">
                    <span class="footer-meta"></span>
                    <a href="chercher" class="footer-return-top">
                        <span class="fa fa-angle-up"></span>
                    </a>
                </div>
            </div>
        </footer>
    <!-- -------------- /Main Wrapper -------------- -->

    <!-- -------------- Sidebar Right -------------- -->
    <aside id="sidebar_right" class="nano affix">

        <!-- -------------- Sidebar Right Content -------------- -->
        <div class="sidebar-right-wrapper nano-content">

            <div class="sidebar-block br-n p15">

                <h6 class="title-divider text-muted mb20"> Visitors Stats
                <span class="pull-right"> 2015
                  <i class="fa fa-caret-down ml5"></i>
                </span>
                </h6>

                <div class="progress mh5">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 34%">
                        <span class="fs11">New visitors</span>
                    </div>
                </div>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 66%">
                        <span class="fs11 text-left">Returnig visitors</span>
                    </div>
                </div>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 45%">
                        <span class="fs11 text-left">Orders</span>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt30 mb10">New visitors</h6>

                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">350</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-warning mn">
                            <i class="fa fa-caret-down"></i> 15.7% </h3>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>

                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">660</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-success-dark mn">
                            <i class="fa fa-caret-up"></i> 20.2% </h3>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt25 mb10">Orders</h6>

                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">153</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-success mn">
                            <i class="fa fa-caret-up"></i> 5.3% </h3>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt40 mb20"> Site Statistics
                    <span class="pull-right text-primary fw600">Today</span>
                </h6>
            </div>
        </div>
    </aside>
    <!-- -------------- /Sidebar Right -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- -------------- HighCharts Plugin -------------- -->
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
<script src="assets/js/plugins/c3charts/d3.min.js"></script>
<script src="assets/js/plugins/c3charts/c3.min.js"></script>

<!-- -------------- Simple Circles Plugin -------------- -->
<script src="assets/js/plugins/circles/circles.js"></script>

<!-- -------------- Maps JSs -------------- -->
<script src="assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

<!-- -------------- FullCalendar Plugin -------------- -->
<script src="assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<!-- -------------- Date/Month - Pickers -------------- -->
<script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>

<!-- -------------- Magnific Popup Plugin -------------- -->
<script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>

<!-- -------------- Theme Scripts -------------- -->
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>

<!-- -------------- Widget JS -------------- -->
<script src="assets/js/demo/widgets.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/dashboard1.js"></script>
<!-- -------------- /Scripts -------------- -->

<!-- -------------- FooTable JS -------------- -->
<script src="assets/js/plugins/footable/js/footable.all.min.js"></script>
<script src="assets/js/plugins/footable/js/footable.filter.min.js"></script>



</body>


<!-- Mirrored from alliance-html.themerex.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2016 10:20:46 GMT -->
</html>
