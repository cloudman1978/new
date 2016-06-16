@extends('layouts.layout')


@section('title')
    Docteur - Prenez Rendez-vous
@stop

@section('chercher')
    @include('partial')



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



