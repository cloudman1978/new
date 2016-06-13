
@extends('backoffice.layouts.layout')


@section('title')
    Espace administrateur
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
    Admin
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
    Admin
@stop

@section('menuadmin')
    <li>


        <a href="/backoffice/admin/user">
            <span class="fa fa-user-md"></span>
                        <span class="sidebar-title"> Gérer les utilisateurs
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/analysepredef">
            <span class="fa fa-search-plus"></span>
                        <span class="sidebar-title"> Gérer les analyses prédéfinies
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/indicators">
            <span class="fa fa-search"></span>
                        <span class="sidebar-title"> Gérer les indicateurs médicaux
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/specialite">
            <span class="fa fa-medkit"></span>
                        <span class="sidebar-title"> Gérer les spécialités
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/establishment">
            <span class="fa fa-hospital-o"></span>
                        <span class="sidebar-title"> Gérer les établissements
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/type">
            <span class=" fa fa-h-square"></span>
                        <span class="sidebar-title"> Gérer les types des établissements
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/patients">
            <span class=" fa fa-h-square"></span>
                        <span class="sidebar-title"> Gérer les patients
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/office">
            <span class="fa fa-hospital-o"></span>
                        <span class="sidebar-title"> Gérer les cabinets
                        </span>
        </a>
    </li>
    <li>


        <a href="/backoffice/admin/doctor">
            <span class="fa fa-stethoscope"></span>
                        <span class="sidebar-title"> Gérer les docteurs
                        </span>
        </a>
    </li>
@stop

@section('user')



@stop

@section('current')


    <ol class="breadcrumb">
        <li class="breadcrumb-icon">
            <span class="fa fa-eye-slash"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/admin/indicators/create">Ajouter un indicateur médical</a>
        </li>

    </ol>
@stop

@section('lienC')
    <div>
        <a href="/backoffice/admin/indicators">Retour</a>
    </div>
@stop

@section('user-role')
    <optgroup label="Connecté comme:">
        <option value="1-1" selected="selected">Admin</option>
        <option value="1-2" >Professionnel</option>
        <option value="1-3">Gestionnaire</option>
        <option value="1-3">Patient</option>
    </optgroup>
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
                                {!! Form::open(['route' => 'backoffice.admin.indicators.store']) !!}
                                {!! csrf_field() !!}

                                <div class="section">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="name" class="field prepend-icon"  >
                                            <input type="text" name="name" value="{{ old('name') }}" class="gui-input"
                                                   placeholder="Donner le nom de l'indicateur">

                                            <label for="name" class="field-icon">
                                                <i class="  fa fa-eye-slash"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>

                                <div class="section">

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="description" class="field prepend-icon"  >
                                            <input type="text" name="description" value="{{ old('description') }}" class="gui-input"
                                                   placeholder="Donner la description de l'indicateur">

                                            <label for="description" class="field-icon">
                                                <i class="  fa fa-eye-slash"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>

                                <div class="section">

                                    <div class="form-group{{ $errors->has('unity') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="unity" class="field prepend-icon"  >
                                            <input type="text" name="unity" value="{{ old('unity') }}" class="gui-input"
                                                   placeholder="Donner l'unité de mesure de l'indicateur">

                                            <label for="unity" class="field-icon">
                                                <i class="fa fa-tachometer"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>
                                <div class="section">

                                    <div class="form-group{{ $errors->has('valUs') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="valUs" class="field prepend-icon"  >
                                            <input type="text" name="valUs" value="{{ old('valUs') }}" class="gui-input"
                                                   placeholder="Donner la valeur usuelle de l'indicateur">

                                            <label for="valUs" class="field-icon">
                                                <i class="fa fa-calculator"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>


                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Créer un indicateur médical" id="create" class="btn btn-bordered btn-primary">
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