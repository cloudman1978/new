@extends('backoffice.layouts.layout')


@section('title')
    Espace Docteur
@stop

@section('header')


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
   Paiements du patient
@stop

@section('menuadmin')

    <li>


        <a href="backoffice/doctor/payment">
            <span class="fa fa-users"></span>
                        <span class="sidebar-title"> Gérer les patients
                        </span>
        </a>
    </li>
    <li>


        <?php echo  "<a href=".'backoffice/doctor/payment?date='.$date.">" ?>
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
            <span class="fa fa-credit-card"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/doctor/payment">Liste des paiements</a>
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
        <a href="/backoffice/doctor/payment/create">Créer un paiement</a>
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
                    document.location.href = 'http://localhost:8000/backoffice/doctor/payment?date=' + dateText;
                }
            });
        });

    </script>

    <section id="content" class="table-layout animated fadeIn">


        <div class="chute chute-center">

            <!-- -------------- Pagination -------------- -->
            <div class="panel" id="spy3">
                @if( $amount <> 0 )
                    Le montant total pour ce jour est : {{$amount }} DT
                @endif
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table footable" data-page-navigation=".pagination" data-page-size="4">
                            <thead>
                            <tr>
                                <th class="">#
                                    <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Montant
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Date
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Patient
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Praticien
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Observations
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="footable-sortable">Modifier
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->amount}}</td>

                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->patient}}</td>
                                    <td>{{$payment->praticien}}</td>

                                    <td>{{$payment->observations}}</td>
                                    <td>
                                        <a href="{{route('backoffice.doctor.payment.edit', $payment->id)}}"  class="table-icon edit" title="Edit"></a>
                                        <a href="/backoffice/doctor/payment/{{$payment->id}}" class="table-icon delete" title="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
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

                alert('about to filter table by "name"');
                //filter by 'tech'
                footableFilter.filter('name');

                //clear the filter
                if (confirm('clear filter now?')) {
                    footableFilter.clearFilter();
                }
            });
        });
    </script>
@stop



@stop