@extends('layouts.layout')


@section('title')
    Docteur - Prenez Rendez-vous
@stop

@section('chercher')
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
@section('apropos')

@stop

@section('gen')
    <section class="tg-main-section tg-haslayout">
        <div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="tg-theme-heading">
                <h2>Quoi attendre</h2>
                <span class="tg-roundbox"></span>
                <div class="tg-description">
                    <p>Juste en trois étapes, Docteur vous aide pour trouver votre plus proche place soins de santé
                        sans avoir à inscrire. Notre objectif est de vous faciliter à trouver votre médecin avec seulement trois
                        clics sans avoir à demander autour ou de se promener pour trouver votre établissement de santé le plus
                        proche.</p>
                </div>
            </div>
        </div>
        <div class="tg-search-categories">
            <div class="col-sm-4 col-xs-4 tg-expectwidth">
                <div class="tg-search-category">
                    <div class="tg-displaytable">
                        <div class="tg-displaytablecell">
                            <div class="tg-box">
                                <h3>Trouver votre docteur</h3>
                                <i class="icon-stethoscope"></i>
                                <span class="tg-show"><em class="icon-add"></em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 tg-expectwidth">
                <div class="tg-search-category">
                    <div class="tg-displaytable">
                        <div class="tg-displaytablecell">
                            <div class="tg-box">
                                <h3>Hôpital le plus proche</h3>
                                <i class="icon-healthcare"></i>
                                <span class="tg-show"><em class="icon-add"></em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 tg-expectwidth">
                <div class="tg-search-category">
                    <div class="tg-displaytable">
                        <div class="tg-displaytablecell">
                            <div class="tg-box">
                                <h3>Pharmacie plus proche</h3>
                                <i class="icon-capsules"></i>
                                <span class="tg-show"><em class="icon-add"></em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
    </section>

    <!--************************************
                      Are You A Doctor Start
      *************************************-->
    <section class="tg-main-section tg-haslayout parallax-window tg-custom-padding" data-appear-top-offset="600" data-parallax="scroll" data-image-src="img/bgparallax/bgparallax-01.jpg">
        <div class="container">
            <div class="row">
                <div class="tg-areuadoctor tg-haslayout">
                    <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 pull-right">
                        <div class="tg-contentbox tg-haslayout">
                            <div class="tg-heading-border">
                                <h2>Êtes-vous un docteur?</h2>
                                <h3>Inscrivez-vous maintenant et atteindre des milliers de patients</h3>
                            </div>
                            <div class="tg-description">
                                <p>Nous savons combien il faut pour devenir un médecin qualifié, de sorte que nous avons enlevé tous vos
                                    disputes de regarder dehors pour vos patients une fois que vous devenez qualifié.
                                    DocDirect vous donnera un accès facile à tous vos patients, tout ce que vous avez besoin est de vous inscrire!</p>
                            </div>
                            <a class="tg-btn" href="backoffice/auth/register">S'inscrire maintenant</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 pull-left">
                        <figure class="tg-img">
                            <img src="img/img-01.png" alt="image description">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
                    Are You A Doctor End
    *************************************-->
    <!--************************************
                    HealthCare on the go Start
    *************************************-->
    <section class="tg-padding-top tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="tg-healthcareonthego tg-haslayout">
                    <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 pull-left">
                        <div class="tg-contentbox tg-haslayout">
                            <div class="tg-heading-border">
                                <h2>les soins de santé sur le pouce</h2>
                            </div>
                            <div class="tg-description">
                                <p> A partir de septembre 2016 vous aurez la possibilité de consulter notre application mobile utilisant votre appareil
                                 Androîd ou iOS.</p>
                            </div>
                            <ul>
                                <li>La recherche d'un docteur sera automatique, rapide et sans avoir besoin de s'authetifier.</li>
                                <li>Vous aurez la possibilité de prendre rendez-vous depuis votre application mobile.</li>
                                <li>Vous pouvez aussi consulter vos analyses, vos historiques de consultations...</li>
                                <li>Etant un docteur vous aurez la possibilité de gérer votre espace et patients à partir de votre téléphone mobile...</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 pull-right">
                        <figure class="tg-img">
                            <img src="img/img-03.png" alt="image description">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
                    HealthCare on the go End
    *************************************-->
    <!--************************************
            Patient Feedback Start
    *************************************-->
    <section class="tg-main-section tg-haslayout parallax-window" data-appear-top-offset="600" data-parallax="scroll" data-image-src="img/bgparallax/bgparallax-02.jpg">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="tg-theme-heading">
                        <h2>Les avis de nos patients</h2>
                        <span class="tg-roundbox"></span>
                        <div class="tg-description">
                            <p>Nos patients sont satisfaits par nos services.</p>
                        </div>
                    </div>
                </div>
                <div class="tg-patientfeedbacks tg-haslayout">
                    <div class="col-md-6 col-sm-6 col-xs-6 tg-feedbackwidht">
                        <div class="tg-patientfeedback">
                            <figure class="tg-patient-pic">
                                <img src="img/patientfeedback/img-01.png" alt="image description">
                            </figure>
                            <div class="tg-patient-message">
                                <span class="tg-patient-name"><a href="https://www.facebook.com/dali.gdaouin?fref=ts">Dali GDAOUINE</a></span><br>
                                <span class="tg-doctor-name">Pour Dr. <a href="javascript:void(0)">Nabila LAETAIEF</a></span>
                                <div class="tg-description">
                                    <p>Cette application m'a permis de gagner temps et prendre rendez-vous ponctuels sans être obligé d'attendre
                                        dans les salles d'attentes plusieurs heures.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 tg-feedbackwidht">
                        <div class="tg-patientfeedback">
                            <figure class="tg-patient-pic">
                                <img src="img/patientfeedback/img-02.png" alt="image description">
                            </figure>
                            <div class="tg-patient-message">
                                <span class="tg-patient-name"><a href="https://www.facebook.com/mkachkha.katalounista">Mariem YOUSFI</a></span><br>
                                <span class="tg-doctor-name">Pour Dr. <a href="javascript:void(0)">Nizar ABDERRAHIM</a></span>
                                <div class="tg-description">
                                    <p>Etant une étudiante à ENIG, je trouve Docteur une plateforme facilitant mes consultations chez mon dentiste
                                        sans avoir besoin de m'absenter de mes études pour prendre rendez-vous.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Patient Feedback End
    *************************************-->

    <!--************************************
                    Find HealthCare By End
    *************************************-->




@stop



