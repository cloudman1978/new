@extends('backoffice.layouts.layout')


@section('title')
    Espace Gestionnaire
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
    Sécrétaire
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


        <a href="backoffice/secretary/patient">
            <span class="fa fa-users"></span>
                        <span class="sidebar-title"> Gérer les patients
                        </span>
        </a>
    </li>
    <li>


        <a href="backoffice/secretary/payment">
            <span class="fa fa-cc-mastercard"></span>
                        <span class="sidebar-title"> Gérer les paiements
                        </span>
        </a>
    </li>

    <li>


        <?php echo  "<a href=".'backoffice/secretary/rdv?date='.$date.">" ?>
        <span class="fa fa-user-md"></span>
                        <span class="sidebar-title"> Gérer les rendez-vous
                        </span>
        </a>
    </li>
    <li>


        <a href="backoffice/secretary/patientAnalysis">
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
            <span class="fa fa-eyedropper"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="backoffice/secretary/patientAnalysis/createRes"> Créer résultat analyse </a>
        </li>

    </ol>
@stop


@section('user-role')
    <optgroup label="Connecté comme:">
        <option value="1-1" >Admin</option>
        <option value="1-2" >Professionnel</option>
        <option value="1-3" selected="selected">Gestionnaire</option>
        <option value="1-4">Patient</option>

    </optgroup>
@stop

@section('lienC')
    <div>
        <a href="/backoffice/secretary/patientAnalysis">Retour</a>
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

                                {!!Form::model($pha,
                                   [ 'method' => 'put',
                                   'route' => ['backoffice.secretary.patientAnalysis.storeRes', $pha->id]
                               ]

                               )!!}
                                {!! csrf_field() !!}

                                        <!-- -------------- /section -------------- -->
                                <div class="section">
                                    <div class="col-md-6 ph10">
                                        <label for="name" class="field prepend-icon">
                                            <input type="text" name="name" class="gui-input"
                                                   placeholder="Donner le nom de l'analyse..."
                                                   value="{{ $pha->name }}">
                                            <label for="name" class="field-icon">
                                                <i class="fa fa-eye-slash"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <div class="col-md-6 ph10">
                                        <div class="form-group{{ $errors->has('resultDate') ? ' has-error' : '' }}" style="color:red;">
                                            <label for="demandDate" class="field prepend-icon">
                                                <input type="text" id="resultDate" name="resultDate"
                                                       class="gui-input" value="{{ $date }}"
                                                       placeholder="Donner la date d'exécution de l'analyse">
                                                <label class="field-icon" for="resultDate">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            </label>
                                        </div><br clear="all">
                                    </div>
                                </div>
                                <script>
                                    $("document").ready(function(){
                                        $("#resultDate").datepicker({
                                            minDate: '01/01/2016',
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

                                    <table class="table footable table-bordered toggle-square-filled">
                                        <thead>
                                        <tr>
                                            <th class="">Indicateur


                                            </th>
                                            <th class="">Résultat

                                            </th>
                                            <th class="">Unité

                                            </th>
                                            <th class="">Valeur usuelle</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pha->inds as $ind)
                                            <tr id="{{ $ind->id }}">
                                                <td>{{ $ind->name }}</td>
                                                <input type="hidden" name="indic[]" value="{{ $ind->id }}">
                                                <td>
                                                    <label for="result[]" class="field prepend-icon">
                                                        <input type="text" name="result[]" class="gui-input"
                                                               placeholder="Donner le résultat de l'analyse..."
                                                               value="{{ old('result[]') }}">
                                                        <label for="name" class="field-icon">
                                                            <i class="fa fa-sticky-note"></i>
                                                        </label>
                                                    </label>
                                                </td>
                                                <td>{{ $ind->unity }}</td>
                                                <td>{{ $ind->valUs }}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>



                                </div>


                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Ajouter résultat d'exécution de l'analyse" id="createRes" class="btn btn-bordered btn-primary">
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