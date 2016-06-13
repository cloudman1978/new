
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
            <span class="fa fa-hospital-o"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/admin/patients">Liste des patients</a>
        </li>

    </ol>
@stop

@section('lienC')
    <div>
        <a href="/backoffice/admin/patients/create">Créer un patient</a>
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

    <section id="content" class="table-layout animated fadeIn">


        <div class="chute chute-center">

            <!-- -------------- Pagination -------------- -->
            <div class="panel" id="spy3">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table footable" data-page-navigation=".pagination" data-page-size="4">
                            <thead>
                            <tr>
                                <th class="">#
                                    <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Nom
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Email
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Adresse
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Téléphone
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Date de naissance
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Genre
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Assurances
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="footable-sortable">Modifier
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{$patient->id}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->email}}</td>

                                    <td>{{$patient->address}}</td>
                                    <td>{{$patient->tel}}</td>

                                    <td>{{$patient->birthDate}}</td>


                                    <td>

                                       @if($patient->gender ==1)
                                           Masculin
                                           @else
                                        Féminin
                                           @endif

                                    </td>
                                    <td>

                                        @foreach($patient->insurances as $insure)
                                            {{ $insure->pseudo }}<br>
                                        @endforeach

                                    </td>

                                    <td>
                                        <a href="{{route('backoffice.admin.patients.edit', $patient->id)}}"  class="table-icon edit" title="Edit"></a>
                                        <a href="/backoffice/admin/patients/{{$patient->id}}" class="table-icon delete" title="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="footer-menu">
                            <tr>
                                <td colspan="5">
                                    <nav class="text-right">
                                        <ul class="pagination hide-if-no-paging"></ul>
                                    </nav>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- -------------- /Column Center -------------- -->
    </section>
    <!-- -------------- /Content -------------- -->

@stop

@stop