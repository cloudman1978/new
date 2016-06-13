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
            <span class="fa fa-search"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="backoffice/doctor/patientAnalysis"> Liste des analyses patients </a>
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
        <a href="/backoffice/doctor/patientAnalysis/create">Créer une analyse patient</a>
    </div>
@stop


@section('content')


    <div class="section">
        <label for="search" class="field prepend-icon">
            <input type="text" name="search" class="gui-input" value="{{ old('search') }}"
                   placeholder="Donner le nom du patient s'il vous plaît..."
                   size="100" id="filter">
            <label for="search" class="field-icon">
                <i class="fa fa-eye-slash"></i>
            </label>
        </label>
    </div>


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
    <!--

      <div id="pop_background"></div>
      <div id="pop_box">
          <span id="close">&times;</span>




                  </ul>
              </div>
   -->

    <!-- -------------- Column Center -------------- -->
    <!--       <div class="chute chute-center">
               <div class="mw1000 center-block">
-->
    <!-- -------------- Spec Form -------------- -->
    <!--       <div class="allcp-form">

               <div class="section row" align="center">

<div class="section">
<div class="col-md-6 ph10">
<div class="form-group" style="color:red;">
   <label for="resultDate" class="field prepend-icon">
       <input type="text" id="resultDate" name="resultDate"
              class="gui-input" value=""
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
                           <tbody name="ajaxResp" id="ajaxResp">


                           </tbody>

                           </tbody>
                       </table>
                   </div>

</div>

                   <div class="section">
                       <div class="pull-right">
                           <input  type="submit" value="Créer résultat analyse" id="create" class="btn btn-bordered btn-primary">
                       </div>
                   </div>



               </div>
           </div>

       </div>


   </div>

-->

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
                                <th class="">Nom
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Patient
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Docteur
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Date de demande
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Etablissement
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Laboratoire
                                        <span class="footbale-sort-indicator">

                                    </span>
                                </th>
                                <th class="">Indicateurs
                                        <span class="footbale-sort-indicator">

                                    </span> </th>
                                <th class="footable-sortable">Modifier
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phas as $pha)
                                <tr>
                                    <td>{{$pha->id}}</td>
                                    <td>{{ $pha->name }}</td>
                                    <td>{{$pha->patient}}</td>
                                    <td>{{$pha->doctor}}</td>
                                    <td>{{$pha->demandDate}}</td>

                                    <td>{{$pha->estb}}</td>
                                    <td>{{$pha->labo}}</td>

                                    <td>
                                        @foreach($pha->inds as $ind)
                                            {{ $ind->name }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('backoffice.doctor.patientAnalysis.edit', $pha->id)}}"
                                           class="table-icon edit" title="Edit"></a>
                                        <a href="/backoffice/doctor/patientAnalysis/{{$pha->id}}" class="table-icon delete" title="Delete">
                                        </a>
                                            <a href="/backoffice/doctor/patientAnalysis/{{$pha->id}}/viewRes"
                                               class="table-icon vue" title="Result"></a>
                                    </td>

                                </tr>
                            @endforeach
                            <script>
                                $(document).ready(function(){
                                    $(".open").click(function(){
                                        $("#pop_background").fadeIn();
                                        $("#pop_box").fadeIn();
                                        $('#rdv_idd').val($(this).attr("phaid"));
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