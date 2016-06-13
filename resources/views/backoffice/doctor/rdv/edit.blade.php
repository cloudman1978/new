@extends('backoffice.layouts.layout')


@section('title')
    Espace Docteur
@stop

@section('header')
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
                   data-placement="top" title="Paiements">
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
    Rendez-vous Patient
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
            <span class="fa fa-hospital-o"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/doctor/rdv/{{$rdv->id}}/edit">Modifier le rendez-vous</a>
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
        <?php echo  "<a href=".'backoffice/doctor/rdv?date='.$date.">" ?>Retour</a>
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
                                {!!Form::model($rdv,
                                            [ 'method' => 'put',
                                            'route' => ['backoffice.doctor.rdv.update', $rdv->id]
                                        ]

                                        )!!}
                                {!! csrf_field() !!}
                                <div class="section">
                                    <div class="form-group{{ $errors->has('hour') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="hour" class="field prepend-icon">
                                            <input type="text" id="hour" name="hour"
                                                   class="gui-input" value="{{ $rdv->hour }}"
                                                   placeholder="Donner l'heure de prise de rendez-vous">
                                            <label class="field-icon" for="hour">
                                                <i class="fa fa-calendar"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div></div>
                                <script>
                                    $("document").ready(function(){
                                        $('#hour').datetimepicker({
                                            minDate: new Date(),
                                            prevText: '<i class="fa fa-chevron-left"></i>',
                                            nextText: '<i class="fa fa-chevron-right"></i>',
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
                                <!-- -------------- /section -------------- -->
                                <div class="section">
                                    <label  class="field select">
                                        <select name="state" required="true" value="{{ $rdv->state }}"  class="gui-input"
                                                placeholder="Donner l'état du rendez-vous...">

                                            <option value="10">Non validé</option>
                                            <option value="20">Validé</option>
                                            <option value="30">Payé</option>
                                            <option value="40">Abandonné</option>
                                        </select>
                                        <i class="arrow"></i>
                                        <br clear="all">
                                    </label>
                                </div>


                                <div class="section">
                                    <div class="form-group{{ $errors->has('rqs') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="rqs" class="field prepend-icon">
                                            <input type="text" name="rqs" class="gui-input"
                                                   placeholder="Remarques patient pour le praticien..." value="{{ $rdv->rqs }}">
                                            <label for="rqs" class="field-icon">
                                                <i class="fa fa-graduation-cap"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>

                                <div class="section">
                                    <div class="col-md-6 ph10">
                                        <label  class="field select">

                                            <select name="patient_id" id="patient_id" >
                                                <option value="-1">Sélectionner le patient s'il vous plaît</option>
                                                @foreach($patients as $patient)
                                                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="arrow"></i>
                                            <br clear="all">
                                        </label>
                                    </div>
                                    <div class="col-md-6 ph10">
                                        <div class="form-group{{ $errors->has('establishment_id') ? ' has-error' : '' }}" style="color:red;">
                                            <label for="establishment_id" class="field prepend-icon">
                                                <input type="hidden" id="establishment_id" name="establishment_id"
                                                       class="gui-input" value="{{ $establishment->id }}">
                                                <input type="text" id="establishment" name="establishment"
                                                       class="gui-input" value="{{ $establishment->nameE }}">
                                                <label class="field-icon" for="establishment_id">
                                                    <i class="fa fa-hospital-o"></i>
                                                </label>
                                            </label>
                                        </div><br clear="all">
                                    </div></div>
                                <div class="section">

                                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="user_id" class="field prepend-icon">
                                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                                            <input type="text" name="user" class="gui-input"
                                                    value="{{ $user->name }}">
                                            <label for="user_id" class="field-icon">
                                                <i class="fa fa-user-md"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Modifier le rendez-vous" id="edit" class="btn btn-bordered btn-primary">
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
