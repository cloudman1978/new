@extends('backoffice.layouts.layout')


@section('title')
    Espace Gestionnaire
    @stop
    @section('header')






            <!-- script affichage des indicateurs-->
    <script type='text/javascript'>
        function getXhr(){
            var xhr = null;
            if(window.XMLHttpRequest) // Firefox et autres
                xhr = new XMLHttpRequest();
            else if(window.ActiveXObject){ // Internet Explorer
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            }
            else { // XMLHttpRequest non supporté par le navigateur
                alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                xhr = false;
            }
            return xhr;
        }
        /**
         * Méthode qui sera appelée sur le click du bouton
         */
        function goo(){
            var xhr = getXhr();
// On défini ce qu'on va faire quand on aura la réponse
            xhr.onreadystatechange = function(){
// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
                if(xhr.readyState == 4 && xhr.status == 200){
                    leselectt = xhr.responseText
                    //alert(leselectt);
// On se sert de innerHTML pour rajouter les options a la liste
                    document.getElementById('ajaxResp').innerHTML = leselectt;
                }
            }
// Ici on va voir comment faire du post
            xhr.open("POST","ajaxIndicator.php",true);
// ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
// ne pas oublier de poster les arguments
// ici, l'id de l'auteur
            sell = document.getElementById('analysepred_id');
            analysepred_id = sell.options[sell.selectedIndex].value;
            xhr.send("analysepred_id="+analysepred_id);
        }
    </script>


    <!-- script autres indicateurs-->
    <script type='text/javascript'>
        function getXhr(){
            var xhr = null;
            if(window.XMLHttpRequest) // Firefox et autres
                xhr = new XMLHttpRequest();
            else if(window.ActiveXObject){ // Internet Explorer
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            }
            else { // XMLHttpRequest non supporté par le navigateur
                alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                xhr = false;
            }
            return xhr;
        }
        /**
         * Méthode qui sera appelée sur le click du bouton
         */
        function gooo(){
            var xhr = getXhr();
// On défini ce qu'on va faire quand on aura la réponse
            xhr.onreadystatechange = function(){
// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
                if(xhr.readyState == 4 && xhr.status == 200){
                    leselec = xhr.responseText
                    //alert(leselec);
// On se sert de innerHTML pour rajouter les options a la liste
                    document.getElementById('other_indicators').innerHTML += leselec;
                }
            }
// Ici on va voir comment faire du post
            xhr.open("POST","ajaxOtherIndicator.php",true);
// ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
// ne pas oublier de poster les arguments
// ici, l'id de l'auteur
            se = document.getElementById('other_inds');
            other_inds = se.options[se.selectedIndex].value;
            xhr.send("other_inds="+other_inds);
        }
    </script>
    <script language="JavaScript">
        function del(i){
            //    document.getElementById("mon_tableau").deleteRow();
            document.getElementById(i).remove();
        }
        // on supprime la première ligne du tableau
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
            <span class="fa fa-search-minus"></span>
        </li>
        <li class="breadcrumb-active">
            <a href="/backoffice/secretary/patientAnalysis/{{ $pha->id }}/edit">Modifier l'analyse du patient
                {{ $pha->patient }}</a>
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
        <a href="backoffice/secretary/patientAnalysis">Retour</a>
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
                                            'route' => ['backoffice.secretary.patientAnalysis.update', $pha->id]
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
                                        <div class="form-group{{ $errors->has('demandDate') ? ' has-error' : '' }}" style="color:red;">
                                            <label for="demandDate" class="field prepend-icon">
                                                <input type="text" id="demandDate" name="demandDate"
                                                       class="gui-input" value="{{ $pha->demandDate }}"
                                                       placeholder="Donner la date de demande d'analyse">
                                                <label class="field-icon" for="demandDate">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            </label>
                                        </div><br clear="all">
                                    </div>
                                </div>
                                <script>
                                    $("document").ready(function(){
                                        $("#demandDate").datepicker({
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
                                    <div class="col-md-6 ph10">
                                        <input type="hidden" value="{{$pha->patient_id}}" name="lastPatient">
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
                                        <input type="hidden" value="{{$pha->establishment_id}}" name="lastEstablishment">
                                        <div class="form-group{{ $errors->has('establishment_id') ? ' has-error' : '' }}" style="color:red;">
                                            @if(strstr($type->titre, 'labo') )
                                                <label  class="field select">
                                                    <input type="hidden" value="{{$pha->establishment_id}}" name="lastestab">
                                                    <select name="establishment_id" id="establishment_id_id" style='display:inline'>
                                                        <option value="-1">Choisissez le cabinet demandant s'il vous plaît</option>
                                                        @foreach($ests as $est)
                                                            @if($est->id <> 1)
                                                                <option value="{{ $est->id }}">{{ $est->nameE }}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>

                                                    <i class="arrow"></i>
                                                    <br clear="all">
                                                </label>
                                            @else
                                            <label for="establishment_id" class="field prepend-icon">
                                                <input type="hidden" id="establishment_id" name="establishment_id"
                                                       class="gui-input" value="{{ $establishment->id }}">
                                                <input type="text" id="establishment" name="establishment"
                                                       class="gui-input" value="{{ $establishment->nameE }}">
                                                <label class="field-icon" for="establishment_id">
                                                    <i class="fa fa-hospital-o"></i>
                                                </label>
                                            </label>
                                                @endif
                                        </div><br clear="all">
                                    </div></div>

                                <div class="section">
                                    @if(strstr($type->titre, 'labo') )
                                        <label for="labo_id" class="field prepend-icon">
                                            <input type="hidden" id="labo" name="labo_id"
                                                   class="gui-input" value="{{ $establishment->id }}">
                                            <input type="text" id="labo_name" name="labo_name"
                                                   class="gui-input" value="{{ $establishment->nameE }}">
                                            <label class="field-icon" for="establishment_id">
                                                <i class="fa fa-hospital-o"></i>
                                            </label>
                                        </label>
                                    @else
                                    <input type="hidden" value="{{$pha->labo_id}}" name="lastLabo">
                                    <label  class="field select">

                                        <select name="labo_id" id="labo_id" style='display:inline'>
                                            <option value="-1">Choisissez le laboratoire s'il vous plaît</option>
                                            @foreach($ests as $est)
                                                <option value="{{ $est->id }}">{{ $est->nameE }}</option>
                                            @endforeach

                                        </select>

                                        <i class="arrow"></i>
                                        <br clear="all">
                                    </label>
                                        @endif
                                </div>
                                <div class="section">

                                    <label  class="field select">
                                        <input type="hidden" value="{{$pha->doctor_id}}" name="lastDoctor">
                                        <select name="user_id" id="user_id" style='display:inline'>
                                            <option value="-1">Choisissez le docteur s'il vous plaît</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach

                                        </select>

                                        <i class="arrow"></i>
                                        <br clear="all">
                                    </label>
                                </div>
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
                                            <th class="footable-sortable">Supprimer

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($pha->inds as $ind)
                                                    <tr id="{{ $ind->id }}">
                                                        <td>{{ $ind->name }}</td>
                                                        <input type="hidden" name="indic[]" value="{{ $ind->id }}">
                                                        <td>NULL</td>
                                                        <td>{{ $ind->unity }}</td>
                                                        <td>{{ $ind->valUs }}</td>
                                                         <td><a href="javascript:void(0)" class="table-icon delete"
                                                                    title="Delete"
                                                                    onclick='del({{ $ind->id }})'></a></td>
                                                    </tr>
                                                    @endforeach
                                        </tbody>


                                        </tbody>
                                        <tbody name="other_indicators" id="other_indicators">

                                        </tbody>
                                    </table>

                                    <div class="col-md-6 ph10">
                                        <label  class="field select">

                                            <select name="other_inds" id="other_inds" onchange='gooo()'>
                                                <option value="-1">Autres indicateurs</option>
                                                @foreach($indicators as $indicator)
                                                    <option value="{{$indicator->id}}">{{$indicator->name}} :
                                                        {{ $indicator->description }}</option>
                                                @endforeach
                                            </select>
                                            <i class="arrow"></i>
                                            <br clear="all">
                                        </label>
                                    </div>

                                </div>


                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Modifier l'analyse du patient" id="edit" class="btn btn-bordered btn-primary">
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
