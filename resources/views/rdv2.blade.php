@extends('layouts.layout')

@section('title')
    Docteur - Prendre Rendez-vous
    @stop


@section('chercher')

    <div style="height: 300px" class="tg-location-map tg-haslayout"></div>
    <div class="tg-banner-content">
        <div class="tg-displaytable">
            <div class="tg-displaytablecell">


            <div class="container">
        <div class="col-md-12 col-sm-7 col-xs-9 tg-verticalmiddle">
            <div class="row">
                <form class="form-searchdoctors"  method="post" name="form" action="/search">
                    {!! csrf_field() !!}



                    <fieldset>
                        <div class="tab-content tg-tab-content">
                            <div role="tabpanel" class="tab-pane active" id="nephrologist">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address"
                                                   id="address" name="address">
                                            <a style="height: 69px;margin-left: -104px;padding-top: 28px;position: absolute;"
                                               href="javascript:void(0);" class="search__doc-where__geolc geolc icon-location"
                                               data-toggle="popover" data-placement="bottom"
                                               data-trigger="manual"><span>Autour de moi</span></a>

                                        </div>


                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">

                                            {!! csrf_field() !!}
                                            <span class="select">
                                                                         <select  class="group" name="speciality" id="speciality">
                                                                             <option value="-1">Sélectionner une spécialité s'il vous plaît</option>
                                                                             @foreach($specialities as $specialite)

                                                                                 @if($specialite->id <> 1)
                                                                                     <option value="{{$specialite->id}}">{{$specialite->intituleProf}}</option>
                                                                                 @endif
                                                                             @endforeach
                                                                         </select>
                                                                    </span>

                                        </div>

                                        <input type="hidden" name="long" id="long">
                                        <input type="hidden" name="lat" id="lat">

                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="Nom du docteur"
                                                   name="name">
                                        </div>


                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">
                                            <button class="tg-btn" type="submit">Chercher</button>
                                            <!--    <button  type="search" class="tg-btn" >Chercher</button>!-->
                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-sm-12 col-xs-12 tg-verticalmiddle">


                                    </div>
                                    <div class="col-md-10 col-sm-12 col-xs-12 tg-verticalmiddle">

                                        <h5>Trouvez un docteur et prendre un rendez-vous immédiatement.</h5>

                                    </div></div>
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    <div class="show-search"><i class="fa fa-search"></i></div>


    <script type="text/javascript">
        var x = document.getElementById("long");
        var y = document.getElementById("lat");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            y.value =  position.coords.latitude ;


            x.value =   position.coords.longitude;

            // document.write (x.value+ ', '+ y.value);
        }
    </script>



@stop

@section('detailsMenu')
    <?php $h= $_GET['heure']; ?>

    <div id="tg-innerbanner" class="tg-innerbanner tg-bglight tg-haslayout">

        <div class="tg-pagebar tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Prendre rendez-vous</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="#">Accuail</a></li>
                            <li><a href="details/{{ $user->idUE }}">Détails docteur</a> </li>
                            <li><a href="/rdv1/{{$user->idUE}}/<?php echo'?heure='.$h ?>" >Consultation</a></li>
                            <li class="active">Identification</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



@section('detailsPage')

    <main id="main" class="tg-main-section tg-haslayout">
        <div class="tg-postionabsulote">
            <div class="col-md-5 col-sm-12 col-xs-12 tg-divheight pull-left">
                <div class="row tg-divheight">
                    <div class="tg-mapbox">
                        <div id="map_canvas" style="height:800px" class="tg-location-map tg-haslayout"></div>
                    </div>
                </div>
            </div>
        </div>



        <?php


        $test = array();


        list($test['lat'][$user->id],$test['lng'][$user->id])=explode(",",  $user->textLatlng);
        $test['id'][$user->id] = $user->id;

        /*   echo '<pre';
               print_r($test);

        */
        ?>



        <script type="text/javascript">

            "use strict";
            /* global document */
            jQuery(document).ready(function () {
                /***
                 Adding Google Map.
                 ***/

                /* Calling goMap() function, initializing map and adding markers. */
                jQuery('#map_canvas').goMap({
                    maptype: 'ROADMAP',
                    latitude: 36.504234,
                    longitude: 9.668328,
                    zoom: 10,
                    scaleControl: true,
                    scrollwheel: true,
//        group: 'category',
                    markers: [
//            Markers for Doctor Search
                            <?php


                         $i = $user->id;

                 list($latitude, $longitude)=explode(",", $user->textLatlng );


                             ?>
                        {latitude: <?php echo $latitude ?>, longitude: <?php echo $longitude ?>, group: 'doctors', icon: 'images/map/map-marker.png', html: {
                            content: '<br /><a href="/details/<?php echo $i ?>">Plus de détails</a>'
                        }},

                    ]

                });
                $.goMap.ready(function () {
                    var bounds = $.goMap.getBounds();
                    var southWest = bounds.getSouthWest();
                    var northEast = bounds.getNorthEast();
                    var lngSpan = northEast.lng() - southWest.lng();
                    var latSpan = northEast.lat() - southWest.lat();


                    var markers = [];

                    for (var i in $.goMap.markers) {
                        var temp = $($.goMap.mapId).data($.goMap.markers[i]);
                        markers.push(temp);
                    }


                    var markerclusterer = new MarkerClusterer($.goMap.map, markers);

                });
                /* Hiding all the markers on the map. */
                $(".group").change(function () {
                    var group = $(this).val();

                    if (group == 'all')
                        for (var i in $.goMap.markers) {
                            $.goMap.showHideMarker($.goMap.markers[i], true);
                        }
                    else {
                        for (var i in $.goMap.markers) {
                            $.goMap.showHideMarker($.goMap.markers[i], false);
                        }

                        $.goMap.showHideMarkerByGroup(group, true);
                    }

                });
//    Click Function for Map Banner
                $(".search_banner").on('click', function (event) {
                    event.preventDefault();
                    $('.tg-banner-content').hide('slide', {direction: 'left'}, 1000);
                    $('.show-search').show('slide', {direction: 'right'}, 2000);
                });
                $(".show-search").on('click', function (event) {
                    event.preventDefault();
                    $('.tg-banner-content').show('slide', {direction: 'left'}, 2000);
                    $(this).hide('slide', {direction: 'right'}, 1000);
                });
            });
        </script>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 pull-right">




                    <div class="tg-doctor-detail tg-haslayout">

                        <article class="tg-doctor-profile">
                            <div class="tg-box">
                                <span class="tg-featuredicon"><em class="fa fa-bolt"></em></span>
                                <?php
                                $photo = $user->image;

                                $dir = 'users/';
                                if(!empty($photo)){
                                    echo ' <figure class="tg-docprofile-img">';
                                    echo'<img src="'.$dir.$photo.'" height="250" width="250"
            alt="image description"></figure>';
                                }
                                else{
                                    $photo = 'no-photo.PNG';
                                    echo ' <figure class="tg-docprofile-img">';
                                    echo'<img src="'.$dir.$photo.'" height="200" width="200"
            alt="image description"></figure>';
                                }

                                ?>

                                <div class="tg-docprofile-content">
                                    <div class="tg-heading-border tg-small">
                                        <h2><a href="/details/{{ $user->idUE }}">{{ $user->name }}</a><span></span></h2>
                                    </div>
                                    <div class="tg-description">
                                        <p> <h4><font color="#00BFFF"> {{ $user->nameE }}</font><span></span></h4></p>
                                    </div>
                                    <ul class="tg-doccontactinfo">
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            <address>{{ $user->address }} </address>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <span>{{ $user->tel }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                        <div class="tg-doc-feature">
                            <div class="tg-heading-border tg-small">
                                <h3>
                                    Spécialité
                                </h3>
                            </div>
                            <div class="tg-description">
                                <p>{{ $user->intituleProf }}</p>
                            </div>
                        </div>
                        <div class="tg-doc-feature">
                            <div class="tg-heading-border tg-small">
                                <h3>Grade honoriphique</h3>
                            </div>
                            <div class="tg-description">
                                <p>{{$user->gradeHonor}}</p>
                            </div>
                        </div>





                        <div class="tg-reviewbox">
                            <div class="tg-heading-border tg-small">
                                <h2>Heure du rendez-vous </h2>
                            </div>
                            <div>
                                <a style="float: left;">
    <span id="horaire">
        <i class="fa fa-calendar"></i>
        Le  <?php
        // $date = strtotime('monday this week');
        $date = $_GET['heure'];

        echo  date("Y:m:d:H:i", $date); ?>
    </span>
                                </a><br><br><br>
                            </div>
                        </div>


                        <div class="tg-doc-feature">
                            <div class="tg-heading-border tg-small">
                                <h3>Avez vous déjà utilisé Docteur?</h3>
                            </div>
                            <div class="tg-description">


                                <div class="option-group field" name="use" id="use">
                                    <label class="option block">
                                        <input class="t" type="radio" name="use" value="0" id="use1">
                                        <span class="radio" style="display: inline-block">C'est la première fois que j'utilise Docteur </span></label><br>
                                    <label class="option block">
                                        <input class="t" type="radio" name="use" value="1" id="use2">
                                        <span class="radio" style="display: inline-block">J'ai déjà utilisé docteur</span></label>

                                </div>


                                <section id="insc" style="display: none">
                                    <div style="color:#00BFFF;width:80%;float:left;line-height:40px;font-size: large;">
                                        Veuillez saisir vos données personnelles <br></div><br>
                                    <form method="POST" action="/rdv3/{{ $user->idUE }}<?php echo'?heure='.$h ?>"
                                          id="register" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="type" value="new">
                                        <label for="cin" class="field prepend-icon"  >
                                            <input type="text"  name="cin" value="{{ old('cin') }}" class="form-control" placeholder="Donner votre cin...">
                                        </label>
                                        <label for="name" class="field prepend-icon">
                                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                                                   placeholder="Nom & Prénom...">
                                        </label>
                                        <label for="email" class="field prepend-icon">
                                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
                                                   placeholder="Email...">
                                        </label>
                                        <label for="password" class="field prepend-icon">
                                            <input type="password" id="password" name="password" class="form-control"
                                                   placeholder="Mot de passe...">
                                        </label>
                                        <label for="password_confirmation" class="field prepend-icon">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                                   placeholder="Retapez votre mot de passe...">
                                        </label>
                                        <label for="tel" class="field prepend-icon">
                                            <input type="text" id="tel" name="tel" value="{{ old('tel') }}" class="form-control"
                                                   placeholder="Téléphone...">
                                        </label>
                                        <label for="birthDate" class="field prepend-icon">
                                            <input type="date" name="birthDate" id="birthDate" class="form-control"
                                                   placeholder="Date de naissance..."  required max="2002-12-31" min="1960-01-01" >
                                        </label>
                                        <label for="gender" class="field prepend-icon">
                                            <select name="gender" id="gender" class="group"
                                            >
                                                <option value="-1">Vous êtes: </option>
                                                <option value="1">Masculin</option>
                                                <option value="2">Féminin</option>
                                            </select>
                                        </label>
                                        <label for="address" class="field prepend-icon">
                                            <input type="text" name="address" id="addresse" class="form-control"
                                                   placeholder="Adresse..." >
                                        </label>
                                        <label for="height" class="field prepend-icon">
                                            <input type="text" name="height" id="height" class="form-control"
                                                   placeholder="Taille patient..." >
                                        </label>

                                        <label for="size" class="field prepend-icon">
                                            <input type="text" name="size" id="size" class="form-control"
                                                   placeholder="Poids patient..." >
                                        </label>


                                        <div class="section">
                                            <div style="color:#00BFFF;width:80%;float:left;line-height:40px;font-size: medium;">Assurances: </div><br clear="all">
                                            <label class="option block"></label>
                                            <?php  $i=0;  ?>
                                            @foreach($insurances as $ins)
                                                <label class="option block">
                                                <input type="checkbox" class="assurance_i" inputid="<?php echo $ins->id; ?>" name="ins<?php echo $ins->id; ?>" id="ins<?php echo $ins->id; ?>" value="{{ $ins->id }}" style="display: inline">
                                                {{  $ins->pseudo }}
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                <label for="aff<?php echo $ins->id; ?>" class="field prepend-icon">
                                                <input type="text" name="aff<?php echo $ins->id; ?>"
                                                       id ="aff<?php echo $ins->id; ?>"
                                                       style="display: none;" class="form-control" maxlength="20" size="20"><br>
                                                </label><br>
                                            @endforeach


                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $(".assurance_i").change(function(){
                                                    if ($('.assurance_i').is(':checked')){
                                                        id= $(this).attr("inputid");
                                                        $("#aff"+id).show();}
                                                    else{
                                                        id= $(this).attr("inputid");
                                                        $("#aff"+id).hide();}

                                                })
                                            });
                                        </script>



                                        <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="checkbox-custom checkbox-primary mb5">
                                            <input type="checkbox" checked="" id="agree">
                                            <label for="agree">J'accepte les
                                                <a href="#"> conditions d'utilisation. </a></label>
                                        </div>
</div> <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="input-group-btn btn_promo_search">
                                            <button type="submit"  class="tg-btn">S'inscrire</button>
                                        </div></div>
                                    </form>
                                </section>


                                <section id="login" style="display: none">
                                    <div style="color:#00BFFF;width:80%;float:left;line-height:40px;font-size: large;">
                                        Bienvenue <br></div><br>
                                    <div class="col-md-12 col-sm-7 col-xs-9 tg-verticalmiddle">
                                        <div class="row">
                                    <form method="POST" action="/rdv3/{{ $user->idUE }}<?php echo'?heure='.$h ?>">
                                        {!! csrf_field() !!}
                                        <fieldset>
                                            <div class="tab-content tg-tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="nephrologist">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <input type="hidden" name="type" value="user">
                                        <label for="email" class="field prepend-icon">
                                            <input type="texte" name="email" value="{{ old('email') }}" class="form-control"
                                                   placeholder="Email...">
                                        </label>
                                                            </div>
                                                        <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <label for="password" class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="Mot de passe...">

                                        </label>
                                                            </div>
                                                        <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <input type="checkbox" name="remember"> Rester connecté</div></div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="input-group-btn btn_promo_search">
                                            <button type="submit"  class="tg-btn">Login</button>
                                        </div></div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <a class="btn btn-link" href="/auth/reset">Mot e passe oublié?</a></div>
                                                            </div>
                                                        </div></div>
                                            </fieldset>

                                    </form>
                                </div></div>
                                </section>



                                <script>
                                    $(document).ready(function() {
                                        $("#use").change(function(){
                                            var value = $('.t:checked').val();
                                            if (value == 0) {
                                                $("#insc").show();
                                                $("#login").hide();
                                            }
                                            else {
                                                $("#login").show();
                                                $("#insc").hide();
                                            }
                                        })

                                    });
                                </script>



                            </div>

    </div>
                    </div>
                </div>
            </div></div>
    </main>
                        @stop


@section('footS')
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

            var input = document.getElementById('addresse');

            autocomplete = new google.maps.places.Autocomplete(input, options);
            // map-canvas est le conteneur HTML de la carte Google Map
            //  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }


        google.maps.event.addDomListener(window, 'load', initialiserCarte);

    </script>


@stop