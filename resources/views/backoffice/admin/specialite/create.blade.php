
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
                            <span class="fa fa-users"></span>                  
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/backoffice/admin/specialite/create">Ajouter un établissement</a>
                    </li>
                    
          </ol>
     @stop
 
         @section('lienC')
                      <div>
                        <a href="/backoffice/admin/specialite">Retour</a>
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
                                        {!! Form::open(['route' => 'backoffice.admin.specialite.store']) !!}
                                         {!! csrf_field() !!}

                                        <div class="section">
                                       
                                            <div class="form-group{{ $errors->has('intituleEtab') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="intituleEtab" class="field prepend-icon"  >
                                                    <input type="texte" name="intituleEtab" value="{{ old('intituleEtab') }}" class="gui-input" placeholder="Donner l'intitulé d'établissement de la specialité...">

                                                    <label for="intituleEtab" class="field-icon">
                                                        <i class="fa fa-hospital-o"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div>
                                        <div class="section">
                                       
                                            <div class="form-group{{ $errors->has('intituleProf') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="intituleProf" class="field prepend-icon"  >
                                                    <input type="texte" name="intituleProf" value="{{ old('intituleProf') }}" class="gui-input" placeholder="Donner l'intitulé de profession de la specialité...">

                                                    <label for="intituleProf" class="field-icon">
                                                        <i class="fa fa-stethoscope"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div>
                                
                                 <div class="section">
                                <div class="pull-right">
                                     <input  type="submit" value="Créer une spécilaité" id="create" class="btn btn-bordered btn-primary">
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