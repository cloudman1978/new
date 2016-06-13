
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
                        <a href="/backoffice/admin/user/{{$user->id}}/edit">Modifier l'utilisateur{{$user->name}}</a>
                    </li>
                    
          </ol>
     @stop
 
         @section('lienC')
                      <div>
                        <a href="/admin/user">Retour</a>                                            
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
                                       {!!Form::model($user,
                                            [ 'method' => 'put',
                                            'route' => ['backoffice.admin.user.update', $user->id],
                                            'files'=> true
                                        ]

                                        )!!}
                                         {!! csrf_field() !!}
                                        <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="name" class="field prepend-icon"  >
                                                    <input type="texte" name="name" value="{{ $user->name }}" class="gui-input" placeholder="Donner le nom de l'utilisateur...">

                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-hospital-o"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>
                                           <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="email" class="field prepend-icon"  >
                                                    <input type="texte" name="email" value="{{ $user->email }}" class="gui-input" placeholder="Donner le mail de l'utilisateur...">

                                                    <label for="email" class="field-icon">
                                                        <i class="fa fa-envelope"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>

                                         <!-- -------------- /section -------------- -->
                        <div class="section">
                             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="color:red;">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" class="gui-input"
                                           placeholder="Mot de passe...">
                                            <label for="password" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                 </label>
                            </div>
                        </div>
                                 <!-- -------------- /section -------------- -->
                        <div class="section">
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" style="color:red;">
                                <label for="password_confirmation" class="field prepend-icon">
                                    <input type="password" name="password_confirmation" class="gui-input"
                                           placeholder="Retaper votre mot de passe...">
                                    <label for="password_confirmation" class="field-icon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </label>
                                   
                                </label>
                            </div> 
                        </div>   

                                           <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="tel" class="field prepend-icon"  >
                                                    <input type="texte" name="tel" value="{{ $user->tel }}" class="gui-input" placeholder="Donner le téléphone de l'utilisateur...">

                                                    <label for="tel" class="field-icon">
                                                        <i class="fa fa-phone"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>

                                        <!-- -------------- /section -------------- -->

                                      <div class="section">
                                                <label  class="field select"> 
                                               

                                                    <select  name="role" id="role" required=true value="{{ $user->gradeHonor }} "> 
                                                    <option value="0">Veuillez selectionner le role de l'utilisateur ...</option>
                                                        <option value="10">Admin</option>
                                                        <option value="20">Professionnel</option>
                                                        <option value="30">Sécrétaire</option>
                                                    </select>
                                                     <i class="arrow"></i>
                                                <br clear="all">
                                                </label>
                                            </div> 
                                        <script>
                                            $(document).ready(function(){
                                                $("#role").change(function(){
                                                    
                                                    if($(this).val() == 20) $("#select_pro").show(); else $("#select_pro").hide();
                                                     })
                                            })
                                        </script>
                         <!-- -------------- /section -------------- -->

                                  <?php 
                                
                              //  if(isset($role) && $role == "20"): ?>
                                
                          <!-- -------------- /section -------------- -->

                                      <div class="section" id="select_pro" style="display: none">
                                                <label  class="field select"> 

                                                    <select  name="speciality_id" id="speciality_id" required=true value="{{ old('speciality_id') }}">
                                                        @foreach($specialities as $specialite)
                                                            @if($specialite->id <> 1)
                                                                <option value="{{$specialite->id}}">{{$specialite->intituleProf}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                     <i class="arrow"></i>
                                                <br clear="all">
                                                </label>
                                            </div> 
                                <?php // endif; ?>  


                                           <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('gradeonor') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="gradeHonor" class="field prepend-icon"  >
                                                    <input type="texte" name="gradeHonor" value="{{ $user->gradeHonor }}" class="gui-input" placeholder="Donner le drade honoriphique de l'uilisateur...">

                                                    <label for="gradeHonor" class="field-icon">
                                                        <i class="fa fa-graduation-cap"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>
                                        <div class="section">

                                            {!! Form::file('image') !!}

                                            <p class="errors">{!!$errors->first('image')!!}</p>
                                            @if(Session::has('error'))
                                            <p class="errors">{!! Session::get('error') !!}</p>
                                            @endif
                                        </div>


                                        <div class="section">
                                            <label for="imgInitial" class="field prepend-icon"  >
                                                <input type="texte" name="imgInitial" value="{{ $user->image }}" class="gui-input" >

                                                <label for="imgInitial" class="field-icon">
                                                    <i class="fa fa-file-photo-o"></i>
                                                </label>
                                            </label><br clear="all">
                                        </div>


                                        <script>
                                            $(document).ready(function(){
                                                $("#role").change(function(){

                                                    if(($(this).val() == 20)||($(this).val()== 30)) $("#selectE").show(); else $("#selectE").hide();
                                                })
                                            })
                                        </script>
                                        <!-- -------------- /section -------------- -->

                                        <?php

                                        //  if(isset($role) && $role == "20" ): ?>

                                        <!-- -------------- /section -------------- -->

                                        <div class="section" id="selectE" style="display: none">
                                            <label  class="field select">

                                                <select name="establishment_id" id="establishment_id" required=true >
                                                @foreach($establishments as $establishment)
                                                        @if($establishment->id <> 1)
                                                            <option value="{{$establishment->id}}">{{$establishment->nameE}}</option>
                                                        @endif
                                                @endforeach
                                                </select>
                                                <i class="arrow"></i>
                                                <br clear="all">
                                            </label>
                                        </div>
                                        <?php // endif; ?>



                                        <div class="section">
                                <div class="pull-right">
                                     <input  type="submit" value="Modifier utilisateur" id="edit" class="btn btn-bordered btn-primary">
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