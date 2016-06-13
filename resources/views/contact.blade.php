@extends('layouts/layout')
@section('chercher')

 <!--   <hr style="height: 5px; color: #00BFFF; background-color: #00BFFF; border-color:black ;width: 100%; border: none;">
 -->
 <!--   <hr style="height: 1px; color: black; background-color: black; width: 100%; border: none;">
 -->


<div style="height: 300px" class="tg-location-map tg-haslayout"></div>
<div class="tg-banner-content">
    <div class="tg-displaytable">
        <div class="tg-displaytablecell">

            <div class="container">

                <div class="col-md-12 col-sm-7 col-xs-9 tg-verticalmiddle">
                    <div class="row">
                        <form class="form-searchdoctors" method="post" name="form" action="/search">
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

                                                    <button  type="search" class="tg-btn" >Chercher</button>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-12 col-xs-12 tg-verticalmiddle">

                                            </div>
                                            <div class="col-md-10 col-sm-12 col-xs-12 tg-verticalmiddle">
                                                <h6 style="align-content: center">Trouvez un docteur et prendre un rendez-vous immédiatement.</h6>

                                            </div>
                                        </div>
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
                    </div></div>
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
                        <div id="map_canvas" class="tg-location-map tg-haslayout"></div>
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