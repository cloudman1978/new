@extends('layouts.layout')


@section('title')
    Mon espace personnel
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

            </div>
        </div>
    </div>
    <div class="show-search"><i class="fa fa-search"></i></div>

@stop

@section('detailsMenu')

    <div id="tg-innerbanner" class="tg-innerbanner tg-bglight tg-haslayout">

        <div class="tg-pagebar tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Espace patient</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="/patient">Détails patient</a></li>
                            <li class="active">Historique des rendez-vous</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('detailsPage')

    <main id="main" class="tg-main-section tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <aside id="tg-sidebar">
                        <div class="tg-widget tg-widget-accordions">
                            <h3>Menu patient</h3>
                            <ul class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingOne">
                                        <h3 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Modifier profil</a>
                                        </h3>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p>Vou pouvez mettre à jour vos données personnelles à tout <a href="/patient">moment.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingTwo">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Liste des docteurs</a>
                                        </h3>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <p>Consultez la liste des praticiens avec lesquels vous avez pris <a href="/patient/doctors">rendez-vous.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default  active">
                                    <div class="tg-panel-heading" role="tab" id="headingThree">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Historique</a>
                                        </h3>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <p>Si vous voulez voire la liste de vos anciens rendez-vous, cliquez <a href="/patient/RdvList">ici.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingFour">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Montant payé</a>
                                        </h3>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <p>Votre montant payé pour chaque consultation ainsi que la somme <a href="/patient/payments">totale.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <h3 class="panel-title"><a href="/auth/logout">Signout</a></h3>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                    <div class="tg-doctors-list tg-haslayout">
                        <div class="tg-view tg-grid-view">
                            <div class="row">
                                @foreach($rdvs as $rdv)
                                    <article class="tg-doctor-profile">
                                        <div class="tg-box">
                                            <?php
                                            $photo = $rdv->logo;

                                            $dir = 'images/';
                                            if(!empty($photo)){
                                                echo '<figure class="tg-docprofile-img">';
                                                echo'<img src="'.$dir.$photo.'" height="250" width="240"
            alt="image description"></figure>';
                                            }
                                            else{
                                                $photo = 'no-photo.PNG';
                                                echo ' <figure class="tg-docprofile-img">';
                                                echo'<img src="'.$dir.$photo.'" height="250" width="240"
            alt="image description"></figure>';
                                            }

                                            ?>

                                            <span class="tg-featuredicon"><em class="fa fa-bolt"></em></span>
                                            <div class="tg-docprofile-content">
                                                <div class="tg-heading-border tg-small">
                                                    <h3>{{ $rdv->nameE }}</h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p><h4 style="color: #00BFFF;">{{ $rdv->nameU }}</h4></p>
                                                </div>
                                                <ul class="tg-doccontactinfo">
                                                    <li>
                                                        <i class="fa fa-user-md"></i>
                                                        <span>{{ $rdv->intituleProf }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-map-marker"></i>
                                                        <address>{{ $rdv->address }}</address>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-hourglass-half"></i>
                                                        <address>{{ $rdv->textH }}</address>
                                                    </li>
                                                    <li>
                                                        <span>  @if($rdv->state==10)
                                                                <i class="fa fa-check-circle">   validé </i>
                                                            @elseif($rdv->state == 20)
                                                                <i class="fa fa-times-circle"> Non validé</i>
                                                            @elseif($rdv->state == 30)
                                                                <i class="fa fa-check-circle">Payé</i>
                                                            @else
                                                                <i class="fa fa-times-circle">Abandonné</i>
                                                            @endif</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->

@stop






