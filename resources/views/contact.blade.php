@extends('layouts/layout')
@section('title')
    Docteur - Contact
    @stop
@section('chercher')

 <!--   <hr style="height: 5px; color: #00BFFF; background-color: #00BFFF; border-color:black ;width: 100%; border: none;">
 -->
 <!--   <hr style="height: 1px; color: black; background-color: black; width: 100%; border: none;">
 -->
@include('partial')

@stop
@section('detailsMenu')

    <div id="tg-innerbanner" class="tg-innerbanner tg-bglight tg-haslayout">

        <div class="tg-pagebar tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Contactez nous</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="#">Accueil</a></li>
                            <li class="active">Contact</li>
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
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="tg-contactus tg-haslayout">
                        <div class="tg-search-categories">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 tg-expectwidth">
                                    <div class="tg-search-category">
                                        <div class="tg-displaytable">
                                            <div class="tg-displaytablecell">
                                                <div class="tg-box">
                                                    <h3>Notre location</h3>
                                                    <img src="img/favicon.png" alt="image description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 tg-expectwidth">
                                    <div class="tg-search-category">
                                        <div class="tg-displaytable">
                                            <div class="tg-displaytablecell">
                                                <div class="tg-box">
                                                    <h3>Informations de contact</h3>
                                                    <address>552 Rue Kissra - Moknine 5050 - Monastir, Gouvernorat de Tunis, Tunisie</address>
                                                    <span>+216 43 221 426</span>
                                                    <a href="mailto:letaieffaten@docteur.tn">letaieffaten@docteur.tn</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tg-refinesearcharea">
                            <div class="tg-heading-border tg-small">
                                <h5>Une remarque, une question, ou tout simplement envie de discuter ? Contactez-nous et nous vous répondrons dans les meilleurs délais.</h5>
                            </div>
                            <form class="form-refinesearch tg-haslayout">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Nom">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="tel" placeholder="Téléphone mobile">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
													<span class="select">
														<select class="group" name="subject" id="subject" required="true" >
                                                            <option value="">Sujet concerne...</option>
                                                            <option value="rdv">Un rendez-vous</option>
                                                            <option value="doc">Un médecin</option>
                                                            <option value="support">Un problème technique</option>
                                                            <option value="jobs">Une offre d'emploi</option>
                                                            <option value="autres">Autres</option>
                                                        </select>
													</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" placeholder="Votre message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="verify" id="verify" placeholder="Math captcha">
                                                <label for="verify" class="button">3 + 3</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="tg-btn">Envoyer</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>





    @stop
@section('footS')
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
                    {latitude:35.633686 , longitude: 10.901013, group: 'doctors', icon: 'images/map/map-marker.png', html: {
                        content: '<br /><a href="/contact">Contact</a>'
                    }},
//            Markers for Doctor Search
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
    @stop