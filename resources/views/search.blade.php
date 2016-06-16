
@extends('layouts.layout')

@section('title')
    Docteur - Prenez Rendez-vous
@stop

@section('chercher')
    @include('partial')

    @stop


    @section('gen')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="tg-doctors-list tg-haslayout">
                        <div class="tg-view tg-list-view">
                            <div class="row">



            <!--content-->
    @if(!empty($users))
                                    <div class="tg-pagination">
                                        <?php
                                        $perPage = 10;
                                        $cPage=1;
                                        $connection = mysqli_connect("localhost","root","","pfe");
                                        ?>
                                        <ul>
                                            <li>
                                                <a data-page="prev" href="#prev"><i class="fa fa-angle-left"></i></a>
                                            </li>
                                            <li><a data-page="0" href="#">1</a></li>
                                            <li><a data-page="1" href="#">2</a></li>
                                            <li><a data-page="2" href="#">3</a></li>
                                            <li><a data-page="3" href="#">4</a></li>
                                            <li><a data-page="4" href="#">5</a></li>
                                            <li>
                                                <a data-page="last" href="last"><i class="fa fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
        <?php $idc = 0; ?>

        @foreach($users as $user)
                <article class="tg-doctor-profile">
                    <div class="tg-box">
                        <a href="details/{{ $user->idUE }}"><span class="tg-show"><a href="details/{{ $user->idUE }}">
                                    <em class="icon-add"></em></a></span></a>
                        <?php
                        $photo = $user->image;

                        $dir = 'users/';
                        if(!empty($photo)){
                            echo'<figure class="tg-docprofile-img"><a href="details/{{ $user->idUE }}"><img src="'.$dir.$photo.'"
                                                                 height="150" width="150" alt="image description"></a></figure>';
                        }
                        else{
                            $photo = 'no-photo.PNG';
                            echo'<figure class="tg-docprofile-img"><a href="details/{{ $user->id }}"><img src="'.$dir.$photo.'"
                        height="150" width="150" alt="image description"></a></figure>';
                        }

                        ?>

                        <div class="tg-docprofile-content">
                            <div class="tg-heading-border tg-small">
                                <h3><a href="/details/{{ $user->idUE }}">{{ $user->name }}</a><span></span></h3>

                            </div>
                            <div class="tg-description">
                                <h5><font color="#00BFFF"> {{ $user->nameE }}</font><span></span></h5>
                            </div>
                            <ul class="tg-doccontactinfo">
                                <li>
                                    <i class="fa fa-user-md"></i>
                                    <span> {{ $user->intituleProf }} <br></span>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <address>{{ $user->address }}</address>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span> {{ $user->tel }} <br></span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span> {{ $user->email }} <br></span>
                                </li>
                            </ul>
                            <a href="/details/{{ $user->idUE }}" class="comm"><i class="fa fa-plus-square"></i>Plus de détail</a>
                        </div>
                    </div>
                </article>


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

            @endforeach
            @else
                Aucun résultat trouvé

                @endif

                        </div>
                     </div>

                    </div></div>
                </div></div>



                @stop

                @section('map')
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
                                scrollwheel: false,
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

        </section>
                    @endif

                <div class="section">

                    </div>
@stop










