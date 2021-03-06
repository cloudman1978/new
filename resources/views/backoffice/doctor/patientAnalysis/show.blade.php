@extends('backoffice.layouts.layout')


@section('title')
    Détails analyse patient {{ $pha->name }}
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
  Analyse  Patient
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
@stop

@section('user')



@stop

@section('current')

    <ol class="breadcrumb">
        <li class="breadcrumb-icon">
            <span class="fa fa-file"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/doctor/patientAnalysis/show/{{ $pha->id }}">Détail de l'analyse patient {{ $pha->name }}</a>
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
                                {!!Form::open(
                                    [
                                        'method' => 'delete',
                                        'route' => ['backoffice.doctor.patientAnalysis.destroy', $pha->id]
                                    ])!!}
                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Nom de l'analyse : </div>
                                    <h5>{{$pha->name}}</h5>
                                </div>
                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Patient : </div>
                                    <h5>{{$pha->patient}}</h5>
                                </div>
                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Docteur : </div>
                                    <h5>{{$pha->doctor}}</h5>
                                </div>

                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Date de demande : </div>
                                    <h5>{{$pha->demandDate}}</h5>
                                </div>
                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Etablissement demandant : </div>
                                    <h5>
                                        {{ $pha->establishment }}
                                    </h5>
                                </div>
                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Laboratoire : </div>
                                    <h5>{{$pha->labo}}</h5>
                                </div>
                                <div class="section">
                                    <div style="width:20%; float:left; line-height: 40px">Indicateurs </div>
                                    <h5>
                                        @foreach($pha->inds as $in)
                                            {{$in->name}}
                                            <br>
                                        @endforeach
                                    </h5>
                                </div>

                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Supprimer analyse patient" id="destroy" class="btn btn-bordered btn-primary" onclick="return confirm(&#39;Vous êtes sur vouloir supprimer ?&#39;);">
                                    </div>
                                </div>



                                {!!Form::close()!!}

                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>


@stop


@stop