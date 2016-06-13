
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

     @stop

     @section('user')

    

     @stop

     @section('current')


          <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                            <span class="fa fa-users"></span>                  
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/backoffice/admin/show/{{$establishment->id}}">Détail établissement {{$establishment->nameE}}</a>
                    </li>
                    
          </ol>
     @stop
 
         @section('lienC')
                      <div>
                        <a href="/backoffice/admin/establishment">Retour</a>
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
                                                'route' => ['backoffice.admin.establishment.destroy', $establishment->id]
                                            ])!!}
                                        <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Nom : </div>
                                            <h5>{{$establishment->nameE}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Adresse : </div>
                                            <h5>{{$establishment->address}}</h5>
                                        </div>
                                        <div class="section">
                                            <div style="width:20%; float:left; line-height: 40px">Coordonnées google maps : </div>
                                            <h5>{{$establishment->coordMaps}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Téléphone : </div>
                                            <h5>{{$establishment->tel}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Téléphone : </div>
                                            <h5>{{$establishment->tel1}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Email : </div>
                                            <h5>{{$establishment->email}}</h5>
                                        </div>
                                          <div class="section">
                                        <div style="width:20%; float:left; line-height: 40px">Image logo : </div>
                                              <?php

                                                  $photo = $establishment->logo;
                                                  if(!empty($photo)){
                                                 }
                                                  else {
                                                      $photo = 'no-photo.PNG';
                                                  }
                                              $dir = 'images/';
                                              echo' <img src="'.$dir.$photo.'" height="250" width="250">';

                                              ?>

                                        </div>

                                        <div class="section">
                                            <div style="width:20%; float:left; line-height: 40px">Type : </div>
                                            <h5>{{$type->titre}}</h5>
                                            <br ><br clear="all">
                                        </div>
                                        <div class="section">
                                            <div style="width:20%; float:left; line-height: 40px">Spécialités : </div>
                                                @foreach($speciality as $spec)
                                            <h5>{{$spec->intituleEtab}}</h5>
                                                    @endforeach
                                        </div>


                                        <div class="section">


                                            <div style="width:20%; float:left; line-height: 40px">Jours ouverts : </div><br clear="all">

                                            <?php
                                            $array_days = $tab['jours'];
                                            $array = array(0 =>'lundi',1=> 'mardi',2=> 'mercredi',3=> 'jeudi',4=> 'vendredi',
                                                    5=> 'samedi',6=> 'dimanche');
                                            $time = $tab['time'];

                                            ?>


                                            @foreach($array as $day=>$v)
                                                @if(isset($array_days[$day]) && !empty($array_days[$day]))
                                                <div style="width:20%; float:left; line-height: 40px">{{$array[$day]}} : </div>
                                                <?php if(isset($time[$day]['matin']['deb']) && !empty($time[$day]['matin']['deb']) &&
                                                isset($time[$day]['matin']['fin']) && !empty($time[$day]['matin']['fin']))
                                                                                                   ?>
                                                <h5> Matin: de {{$time[$day]['matin']['deb']}} à {{$time[$day]['matin']['fin']}}</h5>

                                                <?php if(isset($time[$day]['soir']) && !empty($time[$day]['soir']))
                                                if(isset($time[$day]['soir']['deb']) && !empty($time[$day]['soir']['deb'])  &&
                                                isset($time[$day]['soir']['fin']) && !empty($time[$day]['soir']['fin'])){
                                                ?>
                                                <h5> Soir: de {{$time[$day]['soir']['deb']}} à {{$time[$day]['soir']['fin']}}</h5>
                                                    <?php } ?>
                                            @endif
                                            @endforeach
                                                <br clear="all">

                                            <div style="width:20%; float:left; line-height: 40px">Fréquence des consultations : </div>
                                            <h5>
                                                <?php
                                               if( $tab['freq'][0]== 1)
                                                   echo '15 minutes';
                                               elseif($tab['freq'][0] ==2)
                                                   echo '20 minutes';
                                               elseif($tab['freq'][0] ==3)
                                                   echo '30 minutes';
                                               elseif($tab['freq'][0] ==4)
                                                   echo '45 minutes';
                                               elseif($tab['freq'][0] ==5)
                                                   echo '1 heure';
                                               elseif($tab['freq'][0] ==6)
                                                   echo '1 heure et 30 minutes';
                                               elseif($tab['freq'][0] ==7)
                                                   echo '2 heures';

                                            ?>
                                            </h5>


                                        </div>
                                        <div class="section">
                                            <div style="width:20%; float:left; line-height: 40px">Utilisateurs : </div>
                                            @foreach($users as $user)
                                                <h5>{{$user->name}}</h5>
                                            @endforeach
                                        </div>

                                    
                                    <div class="section">
                                <div class="pull-right">
                                     <input  type="submit" value="Supprimer établissement" id="destroy" class="btn btn-bordered btn-primary" onclick="return confirm(&#39;Vous êtes sur vouloir supprimer ?&#39;);">
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