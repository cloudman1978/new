@extends('layouts.layout')


@section('title')
    Mon espace personnel
@stop



@section('chercher')

    @include('partial')


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
                            <li ><a href="/patient/doctors">Liste des docteurs</a></li>
                            <li ><a href="/patient/RdvList">Mes rendez-vous</a></li>
                            <li class="active">Montant payé</li>
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

                <!--
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
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
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
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingThree">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Historique</a>
                                        </h3>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <p>Si vous voulez voire la liste de vos anciens rendez-vous, cliquez <a href="/patient/RdvList">ici.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default active">
                                    <div class="tg-panel-heading" role="tab" id="headingFour">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Montant payé</a>
                                        </h3>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse  in" role="tabpanel" aria-labelledby="headingFour">
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
-->
                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                    <div class="tg-doctors-list tg-haslayout">
                        La somme totale de vos consultations est {{ $totAm }}
                        <div class="tg-view tg-grid-view">
                            <div class="row">
                                <table style="border-color: transparent;"border="0" frame="void">
                                    <tbody style="border-color: transparent;"border="0" frame="void">
                                    <tr style="background-color: #1D628B;"border="0" frame="void">
                                        <td style="border-color: transparent; color: white;"border="0" frame="void">
                                            Montant
                                        </td>
                                        <td style="border-color: transparent; color: white;"border="0" frame="void">
                                            Date
                                        </td>
                                        <td style="border-color: transparent; color: white;"border="0" frame="void">
                                            Praticien
                                        </td>
                                        <td style="border-color: transparent;color: white;"border="0" frame="void">
                                            Etablissement
                                        </td>
                                        <td style="border-color: transparent; color: white;"border="0" frame="void">
                                            Moyen
                                        </td>
                                    </tr>
                            @foreach($rdvs as $rdv)

                                <tr style="border-color: transparent;"border="0" frame="void">
                                    <td style="border-color: transparent;"border="0" frame="void">
                                        {{ $rdv->amount }}
                                    </td>
                                    <td style="border-color: transparent;"border="0" frame="void">
                                        {{ $rdv->textH }}
                                    </td>
                                    <td style="border-color: transparent;"border="0" frame="void">
                                        <a href="javascript:void(0)">{{ $rdv->nameU }}</a>
                                        <br> {{ $rdv->intituleProf }}
                                    </td>
                                    <td style="border-color: transparent;"border="0" frame="void">
                                        {{ $rdv->nameE }}
                                    </td>
                                    <td style="border-color: transparent;"border="0" frame="void">
                                        @if($rdv->type==1)
                                            <i class="fa fa-money">   Par espèce </i>
                                        @elseif($rdv->type == 2)
                                            <i class="fa fa-bank"> Par chèque </i>
                                        @else
                                            <i class="fa fa-credit-card-alt"> {{ $rdv->other }}</i>
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                    </table>
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





