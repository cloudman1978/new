<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->

<!-- Mirrored from 786themes.net/html/doc-direc/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 May 2016 10:02:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
   <!-- <base href="http://www.mondocteur.ovh/">  -->
    <base href="http://localhost:8000/">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="/img/favicon.png">



    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!--************************************
            Sign In Sign Up Light Box End
    *************************************-->
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/map/jquery.gomap.js"></script>
    <script src="js/map/markerclusterer.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/prettyPhoto.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/countTo.js"></script>
    <script src="js/map/map.js"></script>
    <script src="js/main.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

    <link href="dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="dist/js/datepicker.min.js"></script>

    <!-- Include English language -->
    <script src="dist/js/i18n/datepicker.en.js"></script>
@yield('header')

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--************************************
                Wrapper Start
*************************************-->
<div id="wrapper" class="tg-haslayout">
    <!--************************************
                    Header Start
    *************************************-->
    <header id="header" class="tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <strong class="logo">
                        <a href="#"><img src="img/logo.png" alt="image description" height="75"></a>
                    </strong>
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="tg-navigation">
                            <ul>
                                <li>
                                    <a href="#">Accueil</a>
                                </li>
                                <li><a href="contact">Contact</a></li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target=".tg-user-modal"><i class="fa fa-user-plus"></i></a>
                                    <span><a href="#" data-toggle="modal" data-target=".tg-user-modal">login/signup</a></span>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--************************************
                    Header End
    *************************************-->
    <!--************************************
                    Home Slider Start
    *************************************-->
    <div id="tg-homebanner" class="tg-homebanner tg-overflowhidden tg-haslayout">

                    @yield('chercher')

    </div>
    @yield('detailsMenu')
    <!--************************************
                    Home Slider End
    *************************************-->
    <!--************************************
                    Main Start
    *************************************-->
    <main id="main" class="tg-haslayout">
        @yield('map')
        <!--************************************
                        What to Expect Start
        *************************************-->

@yield('gen')

    </main>
    @yield('detailsPage')
    <!--************************************
                    Main End
    *************************************-->

    <!--************************************
                    Footer Start
    *************************************-->
    <footer id="footer" class="tg-haslayout">
        <div class="tg-threecolumn">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 pull-left">
                        <div class="tg-footercol">
                            <strong class="logo">
                                <a href="#">
                                    <img src="img/logo-white.png" alt="image description">
                                </a>
                            </strong>
                            <div class="tg-description">

                            </div>
                            <ul class="tg-info">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <address>552 Rue Kissra - Moknine 5050 - Monastir, Gouvernorat de Tunis, Tunisie</address>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <em><a href="mailto:letaieffaten@docteur.tn">letaieffaten@docteur.tn</a></em>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <em><a href="javascript:void(0)">+216 43 221 426</a></em>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                        <div class="tg-footercol">
                            <div class="tg-heading-border tg-small">
                                <h4>Liens usuels</h4>
                            </div>
                            <div class="tg-widget tg-usefullinks">
                                <ul>
                                    <li><a href="apropos">À propos de nous</a></li>
                                    <li><a href="faq">Conditions d'utilisation</a></li>
                                    <li><a href="contact">Nous contacter</a></li>
                                    <li><a href="backoffice/auth/register">Professionnel de santé : rejoignez-nous</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tg-footerbar tg-haslayout">
            <div class="tg-copyrights">
                <p>2016 Tous Droits Réservés © Docetur.tn</p>
            </div>
        </div>
    </footer>
    <!--************************************
                    Footer End
    *************************************-->
</div>
<!--************************************
                Wrapper End
*************************************-->
<!--************************************
        Sign In Sign Up Light Box Start
*************************************-->
<div class="modal fade tg-user-modal" tabindex="-1" role="dialog">
    <div class="tg-modal-content">
        <ul class="tg-modaltabs-nav" role="tablist">
            <li role="presentation" class="active"><a href="#tg-signin-formarea" aria-controls="tg-signin-formarea" role="tab" data-toggle="tab">sign in</a></li>
            <li role="presentation"><a href="#tg-signup-formarea" aria-controls="tg-signup-formarea" role="tab" data-toggle="tab">sign up</a></li>
        </ul>
        <div class="tab-content tg-haslayout">
            <div role="tabpanel" class="tab-pane tg-haslayout active" id="tg-signin-formarea">
                <form class="tg-form-modal tg-form-signin"method="POST" action="/auth/login">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="Email..."
                                   name="email" value="{{ old('email') }}" >
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Mot de passe"
                                   name="password" id="password">
                        </div>
                        <div class="form-group tg-checkbox">
                            <label>
                                <input type="checkbox" class="form-control" name="remember">
                                Remember Me
                            </label>
                            <a class="tg-forgot-password" href="/auth/reset">
                                <i>Mot de passe oublié?</i>
                                <i class="fa fa-question-circle"></i>
                            </a>
                        </div>
                        <button type="submit" class="tg-btn tg-btn-lg">Connecter</button>
                    </fieldset>
                </form>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Il y a des erreurs.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <div role="tabpanel" class="tab-pane tg-haslayout" id="tg-signup-formarea">
                <form class="tg-form-modal tg-form-signup" method="POST" action="/auth/register" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text" class="form-control" placeholder="CIN Carte identité Nationale..."
                                   name="cin" value="{{ old('cin') }}" >
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text" class="form-control" placeholder="Nom & Prénom..."
                                   name="name" value="{{ old('name') }}" >
                        </div>

                        <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                            <input type="email" class="form-control" placeholder="Email..."
                                   name="email" value="{{ old('email') }}" >
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Mot de passe"
                                   name="password" id="password">
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Retaper votre mot de passe..."
                                   name="password_confirmation" id="password_confirmation">
                        </div>

                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text" class="form-control" placeholder="Numéro de téléphone..."
                                   name="tel" value="{{ old('tel') }}" >
                        </div>

                        <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text"  placeholder="Date de naissance..." id="birthDate"
                                   name="birthDate" value="{{ old('birthDate') }}" equired max="2002-12-31" min="1960-01-01"
                                   class="datepicker-here" data-language='en' data-position="right top">
                        </div>
                <!--        <script>
                            $("document").ready(function(){
                                $("#birthDate").datepicker({
                                    maxDate: '12/31/1999',
                                    minDate: '01/01/1960',
                                    prevText: '<i class="fa fa-chevron-left"></i>',
                                    nextText: '<i class="fa fa-chevron-right"></i>',
                                    showButtonPanel: false,
                                    beforeShow: function(input, inst) {
                                        var newclass = 'allcp-form';
                                        var themeClass = $(this).parents('.allcp-form').attr('class');
                                        var smartpikr = inst.dpDiv.parent();
                                        if (!smartpikr.hasClass(themeClass)) {
                                            inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                                        }
                                    }
                                });
                            });

                        </script>

-->

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}" style="color:red;">
                                    <span class="select">
                                        <select>
                                            <option value="-1">Veuillez selectionner le genre du patient ...</option>
                                            <option value="1">Masculin</option>
                                            <option value="2">Féminin</option>
                                        </select>
                                    </span>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text" class="form-control" placeholder="Adresse..." id="faten"
                                   name="addressa" value="{{ old('address') }}" onfocus="initialiserCarte2();"
                                   autocomplete="on">
                        </div>
                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text" class="form-control" placeholder="Votre taille svp..."
                                   name="height" value="{{ old('height') }}" >
                        </div>
                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}" style="color:red;">
                            <input type="text" class="form-control" placeholder="Votre poids svp..."
                                   name="size" value="{{ old('size') }}" >
                        </div>


                        <div class="form-group tg-checkbox">
                            <label>
                                <input type="checkbox" class="form-control" id="agree" name="agree">
                               J'accepte les termes et les conditions
                            </label>
                        </div>
                        <button class="tg-btn tg-btn-lg" id="register">Créer un compte</button>
                    </fieldset>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Il y a des erreurs.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>


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
        console.log("------");
        console.log(input);
        console.log("-------------");


        autocomplete = new google.maps.places.Autocomplete(input, options);
        // map-canvas est le conteneur HTML de la carte Google Map
        //  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }


    google.maps.event.addDomListener(window, 'load', initialiserCarte);

</script>


<script type="text/javascript">
    var geocoder;
    var map;
    // initialisation de la carte Google Map de dÃ©part
    function initialiserCarte2() {

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

        var input2 = document.getElementById('faten');
        console.log(input2);
        autocomplete2 = new google.maps.places.Autocomplete(input2, options);
        console.log(autocomplete2);
        // map-canvas est le conteneur HTML de la carte Google Map

        google.maps.event.addDomListener(window, 'load', initialiserCarte2);
        //  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }



</script>
@yield('footS')
</body>
<!-- Mirrored from 786themes.net/html/doc-direc/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 May 2016 10:02:28 GMT -->
</html>