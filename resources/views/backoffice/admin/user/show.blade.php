
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
                        <a href="/backoffice/admin/user/{{$user->id}}">Détail utilisateur {{$user->name}}</a>
                    </li>
                    
          </ol>
     @stop
 
         @section('lienC')
                      <div>
                        <a href="/backoffice/admin/user">Retour</a>
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
                                        {!!Form::open(
                                            [
                                                'method' => 'delete',
                                                'route' => ['backoffice.admin.user.destroy', $user->id]
                                            ])!!}
                                        <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Nom : </div>
                                            <h5>{{$user->name}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Email : </div>
                                            <h5>{{$user->email}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Téléphone : </div>
                                            <h5>{{$user->tel}}</h5>
                                        </div>
                                        
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">rôle : </div>
                                            <h5>
                                              <?php if ($user->role == 10){
                                        echo "admin";
                                    }
                                    elseif ($user->role == 20) {
                                        echo "professionnel";
                                    }
                                    else {
                                        echo "sécrétaire";
                                    }
                                    
                                    ?>
                                            </h5>
                                        </div>
                                              <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Grade honoriphique : </div>
                                            <h5>{{$user->gradeHonor}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Spécialité : </div>
                                            <h5>{{$speciality->intituleProf}}</h5>
                                        </div>
                                        <div class="section">
                                            <div style="width:20%; float:left; line-height: 40px">Image : </div>
                                            <?php
                                            $photo = $user->image;
                                            if(!empty($photo)){
                                            }
                                            else {
                                                $photo = 'no-photo.PNG';
                                            }
                                            $dir = 'users/';
                                            echo' <img src="'.$dir.$photo.'" height="350" width="250">';

                                            ?>
                                        </div>

                                        <div class="section">
                                            <div style="width:20%; float:left; line-height: 40px">Etablissement : </div>
                                          {{ $user->nameE }}
                                        </div>
                                    
                                    <div class="section">
                                <div class="pull-right">
                                     <input  type="submit" value="Supprimer utilisateur" id="destroy" class="btn btn-bordered btn-primary" onclick="return confirm(&#39;Vous êtes sur vouloir supprimer ?&#39;);">
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