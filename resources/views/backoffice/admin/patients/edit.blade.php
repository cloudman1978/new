
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
            <a href="/backoffice/admin/patients/{{$patient->id}}/edit">Modifier le patient {{ $patient->name }}</a>
        </li>

    </ol>
@stop

@section('lienC')
    <div>
        <a href="/backoffice/admin/patients">Retour</a>
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
                                {!!Form::model($patient,
                                           [ 'method' => 'put',
                                           'route' => ['backoffice.admin.patients.update', $patient->id],
                                           'files'=> true
                                       ]

                                       )!!}
                                {!! csrf_field() !!}

                                <div class="section">
                                    <div class="col-md-6 ph10">
                                        <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                                            <label for="cin" class="field prepend-icon"  >
                                                <input type="texte" name="cin" value="{{ $patient->cin }}" class="gui-input" placeholder="Donner le cin du patient...">

                                                <label for="cin" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            </label><br clear="all">
                                        </div>
                                    </div></div>
                                <div class="section">
                                    <div class="col-md-6 ph10">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                                            <label for="name" class="field prepend-icon"  >
                                                <input type="texte" name="name" value="{{ $patient->name }}" class="gui-input" placeholder="Donner le nom de l'utilisateur...">

                                                <label for="name" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            </label><br clear="all">
                                        </div>
                                    </div></div>
                                <div class="section">
                                    <div class="col-md-6 ph10">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                                            <label for="email" class="field prepend-icon"  >
                                                <input type="texte" name="email" value="{{ $patient->email }}" class="gui-input" placeholder="Donner le mail...">

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
                                    <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="tel" class="field prepend-icon"  >
                                            <input type="texte" name="tel" value="{{ $patient->tel }}" class="gui-input" placeholder="Donner le téléphone de l'utilisateur...">

                                            <label for="tel" class="field-icon">
                                                <i class="fa fa-phone"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>

                                <!-- -------------- /section -------------- -->

                                <div class="section">
                                    <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="birthDate" class="field prepend-icon">
                                            <input type="text" name="birthDate" class="gui-input"
                                                   id="birthDate"    placeholder="Date de naissance..."
                                            value="{{ $patient->birthDate }}">
                                            <label for="birthDate" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $("#birthDate").datepicker({
                                            maxDate: '05/31/2016',
                                            minDate: '01/01/1906',
                                            prevText: '<i class="fa fa-chevron-left"></i>',
                                            nextText: '<i class="fa fa-chevron-right"></i>',
                                            showButtonPanel: false,
                                            beforeShow: function(input, inst) {
                                                var newclass = 'allcp-form';
                                                var themeClass = $(this).parents('.allcp-form').attr('class');
                                                var smartpikr = inst.dpDiv.parent();
                                                if (!smartpikr.hasClass(themeClass)) {
                                                    inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                                                }
                                            }
                                        });
                                    })
                                </script>
                                <!-- -------------- /section -------------- -->

                                <?php

                                //  if(isset($role) && $role == "20"): ?>

                                <!-- -------------- /section -------------- -->

                                <div class="section" id="select_pro" >
                                    <label  class="field select">

                                        <select  name="gender"  required value="{{ $patient->gender }}">
                                            <option value="-1">Veiullez sélectionnez le genre du patient</option>
                                            @if($patient->gender == 1)
                                                <option value="1" selected>Masculin</option>
                                                <option value="2">Féminin</option>
                                            @elseif($patient->gender == 2)
                                                <option value="1">Masculin</option>
                                                <option value="2" selected>Féminin</option>
                                        </select>
                                        <i class="arrow"></i>
                                        <br clear="all">
                                    </label>
                                </div>
                                <div class="section">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="address" class="field prepend-icon">
                                            <input type="text" id="address" name="address" class="gui-input"
                                                   placeholder="Adresse..." value="{{ $patient->address }}">
                                            <label for="address" class="field-icon">
                                                <i class="fa fa-home"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="address" class="field prepend-icon">
                                            <input type="text" name="height" class="gui-input"
                                                   placeholder="Taille..." value="{{ $patient->height }}">
                                            <label for="height" class="field-icon">
                                                <i class="fa fa-blind"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="size" class="field prepend-icon">
                                            <input type="text" name="size" class="gui-input"
                                                   placeholder="Poids..." value="{{ $patient->size }}">
                                            <label for="size" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>



                                <!-- -------------- /section -------------- -->




                                <div class="section">
                                    <div style="color:#00BFFF;width:80%;float:left;line-height:40px;font-size: medium;">Assurances: </div><br clear="all">
                                    <label class="option block"></label>
                                    <?php  $i=0;  ?>
                                    @foreach($inss as $ins)
                                        <?php
                                        $checked = "";
                                        $display = "none";
                                        $aff = "";
                                        ?>

                                        @foreach($insurances as $insurance)
                                            @if($insurance->id == $ins->id)
                                                <?php
                                                $checked = "checked";
                                                $display = "block";
                                                $aff = $insurance->affiliation;
                                                ?>
                                            @endif
                                        @endforeach



                                        <input type="checkbox" <?php echo $checked?> class="assurance_i" inputid="<?php echo $ins->id; ?>"
                                               name="ins<?php echo $ins->id; ?>" id="ins<?php echo $ins->id; ?>" value="{{ $ins->id }}" style="display: inline">
                                        {{  $ins->pseudo }}
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" name="aff<?php echo $ins->id; ?>"
                                               id ="aff<?php echo $ins->id; ?>" style="display: <?php echo $display?>"
                                               value="<?php echo $aff ?>"><br>
                                        <?php  $i++; ?>

                                    @endforeach



                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $(".assurance_i").change(function(){
                                            if ($('.assurance_i').is(':checked')){
                                                id= $(this).attr("inputid");
                                                $("#aff"+id).show();}
                                            else{
                                                id= $(this).attr("inputid");
                                                $("#aff"+id).hide();}

                                        })
                                    });
                                </script>





                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Modifier un patient" id="edit" class="btn btn-bordered btn-primary">
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