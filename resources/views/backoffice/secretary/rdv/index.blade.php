@extends('backoffice.layouts.layout')


@section('title')
    Espace Gestionnaire
@stop
@section('header')

    <script type="text/javascript">
        function validate(id) {
            var leselect = '<select name="state" id="comboEtata' + id + '"  class="gui-input">' +

                    ' <option value="10">Non validé</option>' +
                    ' <option value="20">Validé</option>' +
                    ' <option value="40">Abandonné</option>' +
                    '</select>';
            document.getElementById('state').innerHTML = leselect;
            $(document).ready(function () {
                $('#comboEtata' + id).change(function () {
                    $.post("updateRdv.php",
                            {
                                id: id,
                                state: $(this).val(),
                            });
                });
            });
        }
    </script>

    <script type="text/javascript">
        function redirect_aa() {
            var    dd = document.getElementById('viewdate');
            var nvd = 'date('+"Y-m-d"+' ,'+dd+')';

            <?php

            ?>
            $(document).ready(function () {
                $('#viewdate').change(function (e) {
                    numberr = $(this).val();
                });
            });
        }
    </script>


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
    <li>


        <a href="backoffice/secretary/indicators">
            <span class="fa fa-eye-slash"></span>
                        <span class="sidebar-title"> Gérer les indicateurs médicaux
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
            <?php echo  "<a href=".'backoffice/secretary/rdv?date='.$date.">" ?> Liste des rendez-vous </a>
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
        <a href="/backoffice/secretary/rdv/create">Créer un Rendez-vous</a>
    </div>
@stop


@section('content')


    <div class="section">
        <label for="search" class="field prepend-icon">
            <input type="text" name="search" class="gui-input" value="{{ old('search') }}"
                   placeholder="Donner le nom du patient s'il vous plaît..."
                   size="100" id="filter">
            <label for="search" class="field-icon">
                <i class="fa fa-credit-user"></i>
            </label>
        </label>
    </div>

    <div class="section">

        <label for="viewdate" class="field prepend-icon">
            <input type="text" id="viewdate" name="viewdate"
                   class="gui-input" value="{{ $date }}"
                   placeholder="Donner la date du paiement"
            >
            <label class="field-icon" for="viewdate">
                <i class="fa fa-calendar"></i>
            </label>
        </label><br clear="all">
    </div>
    <script>
        $("document").ready(function(){
            $("#viewdate").datepicker({
                minDate: '2016-01-01',
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                dateFormat: 'yy-mm-dd',
                showButtonPanel: false,
                beforeShow: function(input, inst) {
                    var newclass = 'allcp-form';
                    var themeClass = $(this).parents('.allcp-form').attr('class');
                    var smartpikr = inst.dpDiv.parent();
                    if (!smartpikr.hasClass(themeClass)) {
                        inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                    }
                },
                onSelect: function(dateText, inst) {
                    // alert( dateText);
                    // xhr.open('GET', 'http://localhost:8080/backoffice/secretary/rdv?date=' + dateText);
                    document.location.href = 'http://localhost:8000/backoffice/secretary/rdv?date=' + dateText;
                }
            });
        });

    </script>



    <style>
        #pop_background{
            position: fixed;
            width: 100%;
            height: 900px;
            top: 0;
            left: 0;
            background: #000;
            opacity: .8;
            z-index: 900;
            cursor: pointer;
            display: none;
        }
        #pop_box{
            position: absolute;
            background: #fff;
            width: 50%;
            margin: 100px 0 0 35%;
            padding: 50px;
            z-index: 1000;
            display: none;
        }
        #close{
            float:right;
            margin-top:-30px;
            margin-right:-30px;
            cursor:pointer;
            color: #fff;
            border: 1px solid #C20000;
            border-radius: 30px;
            background: #c9302c;
            font-size: 25px;
            font-weight: bold;
            display: inline-block;
            line-height: 0px;
            padding: 11px 3px;
        }
    </style>
    <div id="pop_background"></div>
    <div id="pop_box">
        <span id="close">&times;</span>



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

                        <div class="section row" align="center">
                            {!! Form::open(array('route' => 'backoffice.secretary.rdv.pay')) !!}
                            {!! csrf_field() !!}

                            <div class="section">
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}" style="color:red;">
                                    <label for="amount" class="field prepend-icon">
                                        <input type="text" name="amount" class="gui-input" value="{{ old('amount') }}"
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
                                        <input type="texte" name="observations" value="{{ old('observations') }}"
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
                                               class="gui-input" value="{{ old('date') }}"
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
                                    <input type="text" name="num2"
                                           id ="num2" style="display: none"><br clear="left">
                                    <div class="col-md-2">
                                        <label class="option block">
                                            <input type="radio" name="cheq" value="3" id="cheq3">
                                            <span class="radio"></span>Autres</label></div>
                                    <input type="text" name="num3"
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
                                <input type="hidden" name="rdv_id" id="rdv_idd">
                            </div>

                            <div class="section">
                                <div class="pull-right">
                                    <input  type="submit" value="Créer un paiement" id="create" class="btn btn-bordered btn-primary">
                                </div>
                            </div>


                            {!!Form::close()!!}

                        </div>
                    </div>

                </div>


            </div>
    </div>



    <section id="content" class="table-layout animated fadeIn">


        <div class="chute chute-center">

            <!-- -------------- Pagination -------------- -->
            <div class="panel" id="spy3">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table footable table-bordered toggle-square-filled"
                               data-page-navigation=".pagination" data-page-size="4"
                               data-filter="#filter" >
                            <thead>
                            <tr>
                                <th class="">#
                                    <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Heure et date
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Etat
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Remarque patient
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Praticien
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Etablissement
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Patient
                                        <span class="footbale-sort-indicator">

                                    </span> </th>
                                <th class="footable-sortable">Modifier
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rdvs as $rdv)
                                <tr>
                                    <td>{{$rdv->id}}</td>
                                    <td>{{$rdv->hour}}</td>
                                    <td  id="state"> <span onclick="validate({{$rdv->id}})" ><?php if ($rdv->state == 10){
                                                echo "Non validé";
                                            }
                                            else if($rdv->state ==20){
                                                echo "validé";
                                            }
                                            else if($rdv->state == 30){
                                                echo 'payé';
                                            }
                                            else {
                                                echo 'Abandonné';
                                            }


                                            ?></span></td>

                                    <td>{{$rdv->rqs}}</td>
                                    <td>{{$rdv->nameU}}</td>
                                    <td>{{$rdv->nameE}}</td>

                                    <td>{{$rdv->nameP}}</td>
                                    <td>
                                        <a href="{{route('backoffice.secretary.rdv.edit', $rdv->id)}}"  class="table-icon edit" title="Edit"></a>
                                        <a href="/backoffice/secretary/rdv/{{$rdv->id}}" class="table-icon delete" title="Delete">
                                        </a>
                                        <a  class="open" rdvid="{{$rdv->id}}">Payer</a>
                                    </td>

                                </tr>
                            @endforeach
                            <script>
                                $(document).ready(function(){
                                    $(".open").click(function(){
                                        $("#pop_background").fadeIn();
                                        $("#pop_box").fadeIn();
                                        $('#rdv_idd').val($(this).attr("rdvid"));
                                        return false;

                                    });
                                    $("#close").click(function(){
                                        $("#pop_background").fadeOut();
                                        $("#pop_box").fadeOut();
                                        return false;

                                    });
                                    $("#pop_background").click(function(){
                                        $("#pop_background").fadeOut();
                                        $("#pop_box").fadeOut();
                                        return false;

                                    });
                                });
                            </script>
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

    <script type="text/javascript">
        $(function () {
            $('table').footable().bind('footable_filtering', function (e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            });

            $('.clear-filter').click(function (e) {
                e.preventDefault();
                $('.filter-status').val('');
                $('table.demo').trigger('footable_clear_filter');
            });

            $('.filter-status').change(function (e) {
                e.preventDefault();
                $('table.demo').trigger('footable_filter', {filter: $('#filter').val()});
            });

            $('.filter-api').click(function (e) {
                e.preventDefault();

                //get the footable filter object
                var footableFilter = $('table').data('footable-filter');

                alert('about to filter table by "tech"');
                //filter by 'tech'
                footableFilter.filter('tech');

                //clear the filter
                if (confirm('clear filter now?')) {
                    footableFilter.clearFilter();
                }
            });
        });
    </script>

@stop



@stop