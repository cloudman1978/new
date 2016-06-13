@extends('backoffice.layouts.layout')


@section('title')
    Résultat analyse médicale du patient {{ $pha->patient }}
@stop

@section('body')

@section('deconnect')
    <a href="/backoffice/auth/logout">Déconnexion </a>
@stop

@section('deconnect2')
    <a href="/backoffice/auth/logout" class="btn btn-primary btn-sm btn-bordered">
        <span class="fa fa-power-off pr5"></span> Déconnexion </a>

@stop

@section('user')

@stop

@section('category')
    Docteur
    @stop

    @section('menuUser')

            <!-- -------------- Sidebar - Author Menu  -------------- -->
    <div class="sidebar-widget menu-widget">
        <div class="row text-center mbn">
            <div class="col-xs-2 pln prn">
                <a href="#" class="text-primary" data-toggle="tooltip" data-placement="top"
                   title="Tableau de bord">
                    <span class="fa fa-dashboard"></span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2 pln prn">
                <a href="charts-highcharts.html" class="text-info" data-toggle="tooltip"
                   data-placement="top" title="Stats">
                    <span class="fa fa-bar-chart-o"></span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2 pln prn">
                <a href="/patients/payment" class="text-system" data-toggle="tooltip"
                   data-placement="top" title="Payments">
                    <span class="fa fa-usd"></span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2 pln prn">
                <a href="/patients" class="text-warning" data-toggle="tooltip"
                   data-placement="top" title="Consultations">
                    <span class="fa fa-calendar"></span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2 pln prn">
                <a href="basic-profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                   title="Médecins">
                    <span class="fa fa-users"></span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2 pln prn">
                <a href="management-tools-dock.html" class="text-danger" data-toggle="tooltip"
                   data-placement="top" title="Modifier profile">
                    <span class="fa fa-cogs"></span>
                </a>
            </div>
        </div>
    </div>

@stop

@section('category')
    Analyse Patient
@stop

@section('menuadmin')

    <li>


        <a href="backoffice/doctor/patient">
            <span class="fa fa-users"></span>
                        <span class="sidebar-title"> Gérer les patients
                        </span>
        </a>
    </li>
    <li>


        <a href="backoffice/doctor/payment">
            <span class="fa fa-cc-mastercard"></span>
                        <span class="sidebar-title"> Gérer les paiements
                        </span>
        </a>
    </li>

    <li>


        <?php echo  "<a href=".'backoffice/doctor/rdv?date='.$date.">" ?>
        <span class="fa fa-user-md"></span>
                        <span class="sidebar-title"> Gérer les rendez-vous
                        </span>
        </a>
    </li>
    <li>


        <a href="backoffice/doctor/patientAnalysis">
            <span class="fa fa-search-plus"></span>
                        <span class="sidebar-title"> Gérer les analyses de patients
                        </span>
        </a>
    </li>
    <li>


        <a href="backoffice/doctor/indicators">
            <span class="fa fa-eye-slash"></span>
                        <span class="sidebar-title"> Gérer les indicateurs médicaux
                        </span>
        </a>
    </li>

@stop

@section('user')



@stop

@section('current')

    <ol class="breadcrumb">
        <li class="breadcrumb-icon">
            <span class="fa fa-file-archive-o"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="backoffice/doctor/patientAnalysis/viewRes"> Résultat analyse patient</a>
        </li>

    </ol>
@stop


@section('user-role')
    <optgroup label="Connecté comme:">
        <option value="1-1" >Admin</option>
        <option value="1-2" selected="selected">Professionnel</option>
        <option value="1-3" >Gestionnaire</option>
        <option value="1-4">Patient</option>

    </optgroup>
@stop

@section('lienC')
    <div>
        <a href="/backoffice/doctor/patientAnalysis">Retour</a>
    </div>
@stop


@section('content')





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

                <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">
            <div class="mw1000 center-block">

                <!-- -------------- Spec Form -------------- -->
                <div class="allcp-form">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="section row" align="center">

                                <!-- -------------- /section -------------- -->
                                <div class="section">
                                    <div class="col-md-6 ph10 right" style="text-align:center; vertical-align:middle">
                                        ************************************************************************ <br>

                                        {{ $pha->estb }} <br>
                                        *****************************************************
                                        <br>
                                        {{ $pha->labo }}
                                        ************************************************************************
                                        <hr  width="100%" style="font-family: arial; text-align: center;font-size: 60px;
                                        line-height: 1; height: 5%; border: inset ">


                                        NOM ET PRENOM: {{ $pha->patient }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        CIN: {{ $pha->cin }}
                                        <br><br>
                                        Docteur: {{ $pha->doctor }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Date analyse: {{ $pha->resultDate }}
                                        <br>


                                    </div>

                                    <div class="section">

                                        <table class="table footable table-bordered toggle-square-filled">
                                            <thead>
                                            <tr>
                                                <th class="">Indicateur


                                                </th>
                                                <th class="">Résultat

                                                </th>
                                                <th class="">Unité

                                                </th>
                                                <th class="">Valeur usuelle</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pha->inds as $ind)
                                                <tr id="{{ $ind->id }}">
                                                    <td>{{ $ind->name }}</td>
                                                    <td>
                                                        {{ $ind->result }}
                                                    </td>
                                                    <td>{{ $ind->unity }}</td>
                                                    <td>{{ $ind->valUs }}</td>

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
            </div>
    </div>



@stop



@stop