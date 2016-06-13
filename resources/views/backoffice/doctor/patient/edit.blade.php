@extends('backoffice.layouts.layout')


@section('title')
    Espace Docteur
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
    Patient
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
            <span class="fa fa-dashboard"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/doctor/patient/{{ $patient->id }}/edit">Modifier le patient {{ $patient->name }}</a>
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
        <a href="/backoffice/Doctor/patient">Retour</a>
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
                                {!!Form::model($patient,
                                            [ 'method' => 'put',
                                            'route' => ['backoffice.doctor.patient.update', $patient->id]
                                        ]

                                        )!!}
                                {!! csrf_field() !!}

                                <div class="section">
                                    <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="cin" class="field prepend-icon">
                                            <input type="text" name="cin" class="gui-input" value="{{ $patient->cin }}"
                                                   placeholder="Donner le cin du patient...">
                                            <label for="cin" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="name" class="field prepend-icon">
                                            <input type="text" name="name" class="gui-input" value="{{ $patient->name }}"
                                                   placeholder="Donner le nom et prénom du patient...">
                                            <label for="name" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="email" class="field prepend-icon">
                                            <input type="text" name="email" class="gui-input" value="{{ $patient->email }}"
                                                   placeholder="Donner l'email du patient...">
                                            <label for="email" class="field-icon">
                                                <i class="fa fa-envelope"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

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
                                                   placeholder="Retaper mot de passe patient...">
                                            <label for="password_confirmation" class="field-icon">
                                                <i class="fa fa-unlock-alt"></i>
                                            </label>

                                        </label>
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="tel" class="field prepend-icon"  >
                                            <input type="texte" name="tel" value="{{ $patient->tel }}"
                                                   class="gui-input" placeholder="Donner le téléphone du patient...">

                                            <label for="tel" class="field-icon">
                                                <i class="fa fa-phone"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>


                                <div class="section">
                                    <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="birthDate" class="field prepend-icon">
                                            <input type="text" id="birthDate" name="birthDate"
                                                   class="gui-input" value="{{ $patient->birthDate }}"
                                                   placeholder="Donner la date de naissance du patient">
                                            <label class="field-icon" for="birthDate">
                                                <i class="fa fa-calendar"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div></div>
                                <script>
                                    $("document").ready(function(){
                                        $("#birthDate").datepicker({
                                            maxDate: '12/31/1999',
                                            minDate: '01/01/1960',
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
                                    });

                                </script>


                                <div class="section">
                                    <label  class="field select">


                                        <select  name="gender" id="gender" required=true value="{{ $patient->gender }}">
                                            <option value="-1">Veuillez selectionner le genre du patient ...</option>
                                            <option value="1">Masculin</option>
                                            <option value="2">Féminin</option>
                                        </select>
                                        <i class="arrow"></i>
                                        <br clear="all">
                                    </label>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="address" class="field prepend-icon"  >
                                            <input type="text" name="address" id="address" value="{{ $patient->address }}"
                                                   class="gui-input" placeholder="Donner l'addresse du patient...">

                                            <label for="address" class="field-icon">
                                                <i class="fa fa-home"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>
                                <div class="section">
                                    <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="height" class="field prepend-icon"  >
                                            <input type="text" name="height"  value="{{ $patient->height }}"
                                                   class="gui-input" placeholder="Donner la taille du patient...">

                                            <label for="height" class="field-icon">
                                                <i class="fa fa-blind"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="size" class="field prepend-icon"  >
                                            <input type="text" name="size"  value="{{ $patient->size }}"
                                                   class="gui-input" placeholder="Donner le poids du patient...">

                                            <label for="size" class="field-icon">
                                                <i class="fa fa-user-plus"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>


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
                                        <input  type="submit" value="Modifier patient" id="edit" class="btn btn-bordered btn-primary">
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
@section('footS')

    <script type="text/javascript">
        var geocoder;
        var map;
        // initialisation de la carte Google Map de dÃ©part
        function initialiserCarte() {
            geocoder = new google.maps.Geocoder();
            // Ici j'ai mis la latitude et longitude du vieux Port de Marseille pour centrer la carte de dÃ©part
            var latlng = new google.maps.LatLng(36.504234, 9.668328);
            var mapOptions = {
                zoom      : 8,
                center    : latlng,
                mapTypeId : google.maps.MapTypeId.ROADMAP
            }
            var options = {

                types: ['(cities)'],

                componentRestrictions: {country: 'tn'}

            };

            var input = document.getElementById('address');

            autocomplete = new google.maps.places.Autocomplete(input, options);
            // map-canvas est le conteneur HTML de la carte Google Map
            //  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }


        google.maps.event.addDomListener(window, 'load', initialiserCarte);
    </script>


@stop

@stop