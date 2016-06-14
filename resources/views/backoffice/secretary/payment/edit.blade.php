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


        <?php echo  "<a href=".'backoffice/secretary/payment?date='.$date.">" ?>
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
            <span class="fa fa-dashboard"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/secretary/payment/{{$payment->id}}/edit">Modifier le paiement de {{ $payment->nameP }}</a>
        </li>

    </ol>
@stop
@section('lienC')
    <div>
        <a href="/backoffice/secretary/payment">Retour</a>
    </div>
@stop


@section('user-role')
    <optgroup label="Connecté comme:">
        <option value="1-1" >Admin</option>
        <option value="1-2" >Professionnel</option>
        <option value="1-3" selected="selected">Gestionnaire</option>
        <option value="1-4">Patient</option>

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
                                {!!Form::model($payment,
                                            [ 'method' => 'put',
                                            'route' => ['backoffice.secretary.payment.update', $payment->id]
                                        ]

                                        )!!}
                                {!! csrf_field() !!}

                                <div class="section">
                                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="amount" class="field prepend-icon">
                                            <input type="text" name="amount" class="gui-input" value="{{ $payment->amount }}"
                                                   placeholder="Donner le montant à payer...">
                                            <label for="amount" class="field-icon">
                                                <i class="fa fa-credit-card"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>


                                <div class="section">
                                    <div class="form-group{{ $errors->has('observations') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="observations" class="field prepend-icon"  >
                                            <input type="texte" name="observations" value="{{ $payment->observations }}"
                                                   class="gui-input" placeholder="Donner les observations du patient...">

                                            <label for="observations" class="field-icon">
                                                <i class="fa fa-paper-plane"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>


                                <div class="section">
                                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="date" class="field prepend-icon">
                                            <input type="text" id="date" name="date"
                                                   class="gui-input" value="{{ $payment->date }}"
                                                   placeholder="Donner la date du paiement">
                                            <label class="field-icon" for="date">
                                                <i class="fa fa-calendar"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div></div>
                                <script>
                                    $("document").ready(function(){
                                        $("#date").datepicker({
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
                                    <div class="option-group field" name="cheq" id="cheq">
                                        <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="cheq" value="1"
                                                       id="cheq1">
                                                <span class="radio"></span>espéce</label></div>
                                        <br clear="left">
                                        <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="cheq" value="2" id="cheq2">
                                                <span class="radio"></span>Chèque</label></div>
                                        <input type="text" name="num2" value="{{ $payment->cheq }}"
                                               id ="num2" style="display: none"><br clear="left">
                                        <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="cheq" value="3" id="cheq3">
                                                <span class="radio"></span>Autres</label></div>
                                        <input type="text" name="num3" value="{{ $payment->other }}"
                                               id ="num3" style="display: none"><br clear="left">
                                        <br><br>
                                        <br clear="all">
                                    </div>
                                </div>


                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $("#cheq").change(function(){
                                            if ($("#cheq1").is(':checked'))
                                            {
                                                $("#num2").hide();
                                                $("#num3").hide();}
                                            else if($('#cheq2').is(':checked')){
                                                $("#num2").show();
                                                $("#num3").hide();}
                                            else{
                                                $("#num3").show();
                                                $("#num2").hide();
                                            }

                                        })
                                    });
                                </script>
                                <div class="section">
                                    <label for="patient_id" class="field prepend-icon">
                                        <input type="hidden" name="rdv_id" class="gui-input"
                                               value="{{ $rdv->id }}"   >
                                        <input type="text" name="rdv_details" class="gui-input"
                                               value="{{ $rdv->nameP }}  {{ $rdv->hour }}">
                                        <label for="patient_id" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Modifier le paiement" id="update" class="btn btn-bordered btn-primary">
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


@stop
@stop


