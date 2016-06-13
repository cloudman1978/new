
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mcg.matart.ru/02.Default_Light/html/05.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2015 13:09:43 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon espace personnel</title>
    <base href="http://localhost:8000/">
    @yield('scripts')

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--Main styles-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--Adaptive styles-->
    <link rel="stylesheet" type="text/css" href="css/adaptive.css">
    <!--Swipe menu-->
    <link rel="stylesheet" type="text/css" href="css/pushy.css">
    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <!--animation css-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- Slider Revolution -->
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

    <script src="js/jquery.min.js"></script>
    <script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
    <script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="inner_page innerpage">
<div class="bg_parallax" id="inb">
    <!--navigation swipe-->
    <div class="menu-btn">&#9776;</div>
    <nav class="pushy pushy-left">
        <div class="profile">
          <!--  <div class="avatar"><img src="img/avatar/ava_16.jpg" alt="#"><span>5</span></div> -->
            <h3><a href="03.html">Bienvenue @yield('name')</a></h3>
        </div>
        <ul class="side_menu">
            <li><a href="doctors"><i class="fa fa-user-md"></i>Mes praticien</a></li>
            <li><a href="RdvList"><i class="fa fa-user-md"></i>Mes rendez-vous</a></li>
            <li><a href="consultations"><i class="fa fa-hospital-o"></i>Mes consultations</a></li>
            <li><a href="payments"><i class="fa fa-cc-paypal"></i>Mes paiements</a></li>
            <li><a href="insure"><i class="	fa fa-user-secret"></i>Mes assurances</a></li>
            <li><a href="modifyProfile"><i class="fa fa-cogs"></i>Mon profil</a></li>
        </ul>
    </nav>

    <!--add-->





    </div>
    <div class="site-overlay"></div>
    <div id="container">
        <!--header-->
        <div class="container-fluid header inner_head">
            <div class="fixed_w">
                <div class="row">
                    <div class="col-md-12"><a href="auth/logout">Déconnecter<span></span></a>
                        </div>
                </div>
            </div>
        </div>
        <div class="container page_info">
            <div class="col_md_12">
                <h1> Bienvenue dans votre espace personnel @yield('pseudo')</h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container contant">
            <div class="row cont">
                <!-- Left column-->
                <div class="col-md-3 mobile_none sidebar">
                    <div class="affix-top" id="myAffix" data-spy="affix" data-offset-top="30" data-offset-bottom="20">
                        <ul class="places_cat">
                            <li><a href="patient/"><i class="fa fa-user-md"></i>Mes praticien</a></li>
                            <li><a href="patient/RdvList"><i class="fa fa-user-md"></i>Mes rendez-vous</a></li>
                            <li><a href="patient/consultations"><i class="fa fa-hospital-o"></i>Mes consultations</a></li>
                            <li><a href="patient/payments"><i class="fa fa-cc-paypal"></i>Mes paiements</a></li>
                            <li><a href="patient/insure"><i class="	fa fa-user-secret"></i>Mes assurances</a></li>
                            <li><a href="patient/modifyProfile"><i class="fa fa-cogs"></i>Mon profil</a></li>
                        </ul>
                    </div>
                </div>
                <!--content-->
                <div class="col-md-9 basic">
                    <div class="place_li_cont">
                        @yield('content')
                        <!--place style list-->

                    </div>
                    <!--morebtn-->
                    @yield('more')

                </div>
            </div>
        </div>
    </div>
</div>



<!--
#################################
- SCRIPT FILES -
#################################
-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="js/jquery.easing.min.js"></script>

<!--scroll animate block-->
<script src="js/wow.min.js"></script>
<!--Other main scripts-->
<script src="js/all_scr.js"></script>
<!--Bootstrap js-->
<script src="js/bootstrap.min.js"></script>
<!--Map js-->
<script type="text/javascript" src="js/map_visits.js"></script>
<script type="text/javascript" src="js/infobox.js"></script>
<!--Slider Revolution-->
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!--Parallax-->
<script type="text/javascript" src="js/jquery.parallax-0.2-min.js"></script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- -------------- MonthPicker JS -------------- -->
<script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery.spectrum.min.js"></script>
<script src="assets/allcp/forms/js/jquery.stepper.min.js"></script>


<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>

<!--scroll animation-->
<script>
    new WOW().init();
</script>
<script type="text/javascript">
    "use strict";
    $('#myAffix').affix({
        offset: {
            top: 300,
            bottom: function () {
                return (this.bottom = $('.footer').outerHeight(true))
            }
        }
    })
</script>

<script type="text/javascript">
    "use strict";
    $('#inb').parallax({
        'elements': [
            {
                'selector': '#inb',
                'properties': {
                    'x': {
                        'background-position-x': {
                            'initial': 0,
                            'multiplier': 0.03,
                            'invert': true
                        }
                    },
                    'y': {
                        'background-position-y': {
                            'initial': 30,
                            'multiplier': 0.03,
                            'invert': true
                        }
                    }
                }
            }
        ]
    });
</script>
<script type="text/javascript">
    "use strict";
    setHeiHeight();
    $(window).resize( setHeiHeight );
</script>

<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<script type="text/javascript">
    var geocoder;
    var map;
    // initialisation de la carte Google Map de dÃ©part
    function initialiserCarte() {
        geocoder = new google.maps.Geocoder();
        // Ici j'ai mis la latitude et longitude du vieux Port de Marseille pour centrer la carte de dÃ©part
        var latlng = new google.maps.LatLng(36.504234, 9.668328);
        var mapOptions = {
            zoom      : 8,
            center    : latlng,
            mapTypeId : google.maps.MapTypeId.ROADMAP
        }
        var options = {

            types: ['(cities)'],

            componentRestrictions: {country: 'tn'}

        };

        var input = document.getElementById('address');

        autocomplete = new google.maps.places.Autocomplete(input, options);
        // map-canvas est le conteneur HTML de la carte Google Map
        //  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }


    google.maps.event.addDomListener(window, 'load', initialiserCarte);
</script>


@yield('footS')
</body>

<!-- Mirrored from mcg.matart.ru/02.Default_Light/html/05.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2015 13:09:43 GMT -->
</html>