
@extends('backoffice.layouts.layout')


@section('title')
    Espace administrateur
    @stop

    @section('header')


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
                    document.getElementById('ajaxResp').innerHTML += leselec;
                }
            }
// Ici on va voir comment faire du post
            xhr.open("POST","ajaxIndicators.php",true);
// ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
// ne pas oublier de poster les arguments
// ici, l'id de l'auteur
            se = document.getElementById('inds');
            inds = se.options[se.selectedIndex].value;
            xhr.send("inds="+inds);
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
            <a href="/backoffice/admin/analysepredef/{{$analyse->id}}">Modifier l'analyse {{$analyse->titre}} </a>
        </li>

    </ol>
@stop

@section('lienC')
    <div>
        <a href="/backoffice/admin/analysepredef">Retour</a>
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
                                {!!Form::model($analyse,
                                             [ 'method' => 'patch',
                                             'route' => ['backoffice.admin.analysepredef.update', $analyse->id]
                                         ]

                                         )!!}
                                {!! csrf_field() !!}

                                <div class="section">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                                        <label for="name" class="field prepend-icon"  >
                                            <input type="text" name="name" value="{{ $analyse->name }}" class="gui-input">

                                            <label for="name" class="field-icon">
                                                <i class="  fa fa-plus-square"></i>
                                            </label>
                                        </label><br clear="all">
                                    </div>
                                </div>
                                <div class="section">

                                    <table class="table footable table-bordered toggle-square-filled" id="mon_tableau">
                                        <thead>
                                        <tr>
                                            <th class="">Indicateur


                                            </th>
                                            <th class="">Résultat

                                            </th>
                                            <th class="">Unité

                                            </th>
                                            <th class="">Valeur usuelle</th>
                                            <th class="footable-sortable" >Supprimer indicateur</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($analyse->indicators as $ind)
                                            <tr id="{{ $ind->id }}">
                                                <td>{{ $ind->name }}</td>
                                                <input type="hidden" name="indic[]" value="{{ $ind->id }}">
                                                <td> NULL </td>
                                                <td>{{ $ind->unity }}</td>
                                                <td>{{ $ind->valUs }}</td>
                                                <td><a href="javascript:void(0)" class="table-icon delete" title="Delete"
                                                    onclick='del({{ $ind->id }})'></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody name="ajaxResp" id="ajaxResp">

                                        </tbody>
                                    </table>



                                </div>
                                <div class="section">
                                    <label  class="field select">

                                        <select name="inds" id="inds" onchange='gooo()'>
                                            <option value="-1">Choisir indicateur...</option>
                                            @foreach($indicators as $an)
                                                <option  value="{{$an->id}}">{{$an->name}}: {{ $an->description }}</option>
                                            @endforeach
                                        </select>
                                        <i class="arrow"></i>
                                        <br><br clear="all">
                                    </label>

                                </div>


                                <div class="section">
                                    <div class="pull-right">
                                        <input  type="submit" value="Modifier analyse prédéfinie" id="edit" class="btn btn-bordered btn-primary">
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