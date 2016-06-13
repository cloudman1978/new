@extends('layouts.layout')

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

    <div id="tg-innerbanner" class="tg-innerbanner tg-bglight tg-haslayout">

    <div class="tg-pagebar tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Détails docteur</h1>
                    <ol class="tg-breadcrumb">
                        <li><a href="#">Accuail</a></li>
                        <li class="active">Détails docteur</li>
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
        foreach($users as $user){

            list($test['lat'][$user->id],$test['lng'][$user->id])=explode(",",  $user->textLatlng);
            $test['id'][$user->id] = $user->id;
        }
        /*   echo '<pre';
               print_r($test);

        */
        ?>


        @if(!empty($users))

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

                                   foreach($users as $user){
                             $i = $user->id;

                     list($latitude, $longitude)=explode(",", $user->textLatlng );


                                 ?>
                            {latitude: <?php echo $latitude ?>, longitude: <?php echo $longitude ?>, group: 'doctors', icon: 'images/map/map-marker.png', html: {
                                content: '<br /><a href="/details/<?php echo $i ?>">Plus de détails</a>'
                            }},
                            <?php }?>
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

        @endif




        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 pull-right">


                    @if(!empty($users))

                        @foreach($users as $user)

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


                            <div class="tg-doc-feature">
                                <div class="tg-heading-border tg-small">
                                    <h3>Choisir heure de rendez-vous</h3>
                                </div>
                                <div class="tg-description">

                            <style>
                                .calender_item{
                                    text-align: center;
                                }
                                .calender_item:hover{
                                    color:white;
                                    background:blue;
                                }
                                .calender_item_active{
                                    color:lightskyblue;
                                    background:blue;
                                }

                            </style>
                            <script>
                                $("document").ready(function(){
                                    $('.calender_item').click(function() {
                                        // $( this).setColor('blue');
                                        $('.calender_item').removeClass("calender_item_active");
                                        $(this).addClass("calender_item_active");
                                    });        });
                                //  $('.calender_item').css('background','blue').css('color','white');

                            </script>
                            <div class="col-md-12 basic">


                                <div id="myCarousel" class="carousel slide" data-ride="none">

                                    <?php ?>
                                            <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php
                                        $start_index=0;
                                        $start_ts = strtotime('monday this week');
                                        for ($i=$start_ts;$i<$start_ts + (60*60*24*7*8); $i= $i+60*60*24*7){
                                        ?>
                                        <li data-target="#myCarousel" data-slide-to="<?=$start_index?>" class="active"></li>
                                        <?php
                                        $start_index++;
                                        }
                                        ?>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <?php
                                        $start_index = 0;
                                        for ($index_week=$start_ts;$index_week<$start_ts + (60*60*24*7*8); $index_week= $index_week+60*60*24*7){
                                        ?>
                                        <div class="item <?php if ($start_index ==0) echo "active";?>">
                                            <div style="text-align: center"><?php echo date("d/m/Y",$index_week)." - ".date("d/m/Y",$index_week+(60*60*24*6))?></div>
                                            <?php

                                            $tab = unserialize($user->horaire);

                                            /* echo '<pre>';
                                               print_r($tab);
                                               exit();
                                   */
                                            // $array_days = array(1=>"Lundi",2=>"Mardi",3=>"Mercredi",4=>"jeudi",5=>"Vendredi",6=>"Samedi");
                                            $array_days = $tab['jours'];
                                            $array = array(0 =>'lundi',1=> 'mardi',2=> 'mercredi',3=> 'jeudi',4=> 'vendredi',
                                            5=> 'samedi',6=> 'dimanche');



                                            /*     echo '<pre>';
                                                 print_r($array_days);
                                                 exit();

                     */
                                            /*  $plages_horaires = array();
                                              for ($i = (60*60*8);$i < (60*60*18); $i=$i+1800){
                                                  $plages_horaires[] = $i;
                                              }*/
                                            $plages_horaires = array();
                                            $pl = array();
                                            $time = $tab['time'];
                                            foreach($tab['jours'] as $day){
                                            //$debut = substr($time[$day]['matin'][0], 0, 2);
                                            if(!empty($time[$day]['matin']['deb']))
                                            list($pl[$day]['matin']['deb']['h'],$pl[$day]['matin']['deb']['m'])
                                            =explode(":",  $time[$day]['matin']['deb']);
                                            /*   $deb = intval($debut);
                                               $fin = substr($tab['matin'][1], 0, 2);
                                               $f = intval($fin);
                                               $debuts = substr($tab['soir'][0], 0, 2);
                                               $debs = intval($debuts);
                                               $fins = substr($tab['soir'][1], 0, 2);
                                               $fs = intval($fins);*/

                                            if(!empty($time[$day]['matin']['fin']))
                                            list($pl[$day]['matin']['fin']['h'],$pl[$day]['matin']['fin']['m'])
                                            =explode(":",  $time[$day]['matin']['fin']);

                                            if(!empty($time[$day]['soir']['deb']))
                                            list($pl[$day]['soir']['deb']['h'],$pl[$day]['soir']['deb']['m'])
                                            =explode(":",  $time[$day]['soir']['deb']);
                                            if(!empty($time[$day]['soir']['fin']))
                                            list($pl[$day]['soir']['fin']['h'],$pl[$day]['soir']['fin']['m'])
                                            =explode(":",   $time[$day]['soir']['fin']);

                                            }

                                            /*   echo '<pre>';
                                               print_r($pl);
                                               exit();*/

                                            //     exit();
                                            $freq = intval( $tab['freq'][0])*60;


                                            /*   for($i = (60*60*$deb); $i <(60*60*$f); $i= $i+$freq){
                                                   $plages_horaires[] = $i;
                                               }
                                               for($i = (60*60*$debs); $i <(60*60*$fs); $i= $i+$freq){
                                                   $plages_horaires[] = $i;
                                               }*/


                                            foreach($tab['jours'] as $day){
                                            if(!empty($time[$day]['matin']['deb']) && !empty($time[$day]['matin']['fin']))
                                            for($i = (60*60*$pl[$day]['matin']['deb']['h'] + 60*$pl[$day]['matin']['deb']['m']);
                                            $i <(60*60*$pl[$day]['matin']['fin']['h'] + 60*$pl[$day]['matin']['fin']['m']);
                                            $i= $i+$freq){
                                            $plages_horaires[$day][] = $i;
                                            }
                                            if(!empty($time[$day]['soir']['deb']) && !empty($time[$day]['soir']['fin']))
                                            for($i = (60*60*$pl[$day]['soir']['deb']['h'] + 60*$pl[$day]['soir']['deb']['m']);
                                            $i <(60*60*$pl[$day]['soir']['fin']['h'] + 60*$pl[$day]['soir']['fin']['m']);
                                            $i= $i+$freq){
                                            $plages_horaires[$day][] = $i;
                                            }


                                            }
                                            /* echo '<pre>';
                                             print_r($plages_horaires);
                                             exit();

                    */
                                            foreach ($array_days as $k=>$v){
                                            echo '<div class="col-md-2" style="border-left:1px solid grey">';
                                            echo "<b>".$array[$v]."</b><br>";
                                            if(!empty($plages_horaires[$v]))
                                            foreach ($plages_horaires[$v] as $h){

                                            if (in_array($h+$index_week+($k *60 *60 *24), $user->rdvs)) echo '<div class="col-md-6 calender_item">'.date("H:i",$h)."</div>";

                                            else
                                            echo '<div class="col-md-6 calender_item"><a href="/rdv1/'.$user->idUE.'?heure='.($h+$index_week+($k *60 *60 *24)).'">'.date("H:i",$h)."</a></div>";
                                            }
                                            echo '</div>';
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        $start_index++;
                                        }?>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <i class="fa fa-chevron-left" ></i>
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <i class="fa fa-chevron-right" ></i>
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <br clear="all">


                            <!--morebtn-->
                            <style>
                                .carousel-control.left{
                                    height: 20px;
                                    background: none;
                                    color:black
                                }
                                .carousel-control.right{
                                    height: 20px;
                                    background: none;
                                    color:black
                                }


                            </style>


<br><br><br>
                    </div>
                            </div>
                        </div>





                        @endforeach
                    @else
                        Aucun résultat trouvé

                    @endif


                </div>
            </div>
        </div>
    </main>


    @stop















