
@extends('backoffice.layouts.layout')


@section('title')
	Espace administrateur 


@stop
@section('scripts')

    var geocoder;
    var map;
    // initialisation de la carte Google Map de départ
    function initialiserCarte() {
    geocoder = new google.maps.Geocoder();
    // Ici j'ai mis la latitude et longitude du vieux Port de Tunis pour centrer la carte de départ
    var latlng = new google.maps.LatLng(36.800519, 10.179326);
    var mapOptions = {
    zoom      : 14,
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
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }

    function TrouverAdresse() {
    // Récupération de l'adresse tapée dans le formulaire
    var address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    map.setCenter(results[0].geometry.location);
    // Récupération des coordonnées GPS du lieu tapé dans le formulaire
    var strposition = results[0].geometry.location+"";
    strposition=strposition.replace('(', '');
    strposition=strposition.replace(')', '');
    // Affichage des coordonnées dans le <span>
      document.getElementById('textLatlng').value = ' '+strposition;

      // Création du marqueur du lieu (épingle)
      var marker = new google.maps.Marker({
          map: map,
        draggable: true,
    animation: google.maps.Animation.DROP,
          position: results[0].geometry.location
      });
        google.maps.event.addListener(marker, 'dragend', function (event) {
    document.getElementById("textLatlng").value = this.getPosition();
        document.getElementById("textLatlng").value=document.getElementById("textLatlng").value.replace('(', '');
    document.getElementById("textLatlng").value=document.getElementById("textLatlng").value.replace(')', '');
});
    } else {
      alert('Adresse introuvable: ' + status);
    }
  });
}
// Lancement de la construction de la carte google map
google.maps.event.addDomListener(window, 'load', initialiserCarte);

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
                        <a href="/backoffice/admin/establishment/create">Ajouter un établissement</a>
                    </li>
                    
          </ol>
     @stop
 
         @section('lienC')
                      <div>
                        <a href="/backoffice/admin/establishment">Retour</a>
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
                                        {!! Form::open(array('route' => 'backoffice.admin.establishment.store', 'files'=> true,
                                        'method' => 'POST')) !!}
                                         {!! csrf_field() !!}

                                        <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('nameE') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="nameE" class="field prepend-icon"  >
                                                    <input type="texte" name="nameE" value="{{ old('nameE') }}" class="gui-input" placeholder="Donner le nom de votre établissement...">

                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-hospital-o"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>
                                           <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="email" class="field prepend-icon"  >
                                                    <input type="texte" name="email" value="{{ old('email') }}" class="gui-input" placeholder="Donner le mail de votre établissement...">

                                                    <label for="email" class="field-icon">
                                                        <i class="fa fa-envelope"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>

                                                <div class="section">
                                       
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="color:red;" >
                                                <label for="address" class="field prepend-icon"  >
                                                    <input type="texte" id="address" name="address" value="{{ old('address') }}" style="width: 75%; float: left;"  class="gui-input" placeholder="Donner l'adresse de votre établissement...">

                                                    <label for="address" class="field-icon">
                                                        <i class="fa fa-home"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div></div>


                                           <!-- <span id="text_latlng"></span>-->
                                                    <div class="section">
                                                <div class="form-group{{ $errors->has('textLatlng') ? ' has-error' : '' }}" style="color:red;" >
                                                    <label for="textLatlng" class="field prepend-icon"  >
                                                <input type="texte"  name="textLatlng" id="textLatlng" class="gui-input" placeholder="Cordonnées google maps" value="{{ old('textLatlng') }}" style="float:right;width:100%">


                                                    <label for="textLatlng" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label></label><br clear="all">

                                                  </div></div>


                                                    <div class="section">
                                                    <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();" class="btn btn-bordered btn-primary"/>
                                                    </div><div class="section">
                                                    <div id="map-canvas" style="float:right;height:420px;width:100%"></div></div>



                                            <!-- <span id="text_latlng"></span>-->



                                           <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="tel" class="field prepend-icon"  >
                                                    <input type="texte" name="tel" value="{{ old('tel') }}" class="gui-input" placeholder="Donner le téléphone de votre établissement...">

                                                    <label for="tel" class="field-icon">
                                                        <i class="fa fa-phone"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>

                                           <div class="section">
                                        <div class="col-md-6 ph10">
                                            <div class="form-group{{ $errors->has('tel1') ? ' has-error' : '' }}" style="color:red;">
                                                <label for="tel1" class="field prepend-icon"  >
                                                    <input type="texte" name="tel1" value="{{ old('tel1') }}" class="gui-input" placeholder="Donner le portable de votre établissement...">

                                                    <label for="tel1" class="field-icon">
                                                        <i class="fa fa-mobile-phone"></i>
                                                    </label>
                                                </label><br clear="all">
                                            </div>
                                        </div></div>

                                        <div class="section">


                                                <label class="field prepend-icon append-button file">
                                                    <span class="button btn-primary btn-bordered">Choose File</span>
                                                    <input type="file" class="gui-file" name="logo" id="logo"
                                                           onChange="document.getElementById('uploader1').value = this.value;">
                                                    <input type="text" class="gui-input" id="uploader1"
                                                           placeholder="Select File">
                                                    <label class="field-icon">
                                                        <i class="fa fa-cloud-upload"></i>
                                                    </label>
                                                </label>



                                            <p class="errors">{!!$errors->first('logo')!!}</p>
                                            @if(Session::has('error'))
                                                <p class="errors">{!! Session::get('error') !!}</p>
                                            @endif
                                        </div>

                                          <div class="section" >
                                                <label  class="field select-multiple state-success">

                                                    <select multiple  name="speciality_id[]" id="speciality_id" >
                                                        @foreach($specialities as $specialite)
                                                            @if($specialite->id <> 1)
                                                                <option value="{{$specialite->id}}">{{$specialite->intituleEtab}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                     <i class="arrow"></i>
                                                <br clear="all">
                                                </label>
                                            </div> 

                                             <div class="section" >
                                                <label  class="field select"> 

                                                    <select  name="type_id" id="type" required=true value="{{ old('type_id') }}"> 
                                                    @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->titre}}</option>
                                                      @endforeach  
                                                    </select>
                                                     <i class="arrow"></i>
                                                <br clear="all">
                                                </label>
                                            </div>

                                        <div class="section" name="plage">
                                            <h5 class="mt40 mb20" style="float:left;">Plages horaires</h5>

                                            </div>
<br clear="all">
                                        <h6 style="width:10%; float: left;line-height: 40px">Jours ouverts: </h6>
                                        <br clear="all">

                                        <div class="option-group field" >

                                            <div class="col-md-3">
                                            <label class="option block">
                                                <input type="checkbox" name="jours[]" id="lundi" value="0" style="display: inline">
                                                <span class="checkbox"></span>Lundi</label></div>
                                        <!--        <script>
                                                    $(document).ready(function(){

                                                        $("#lundi").click(function(){

                                                            if( $('input[name=lundi]').is(':checked') ){
                                                                $("#lund").show();
                                                            } else {
                                                                $("#lund").hide();
                                                            }

                                                        })



                                                    })
                                                </script>-->

                                                <div class="section" id="lund">

                                                    <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                    <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                        <label for="time[0][matin][deb]" class="field prepend-icon"  >
                                                            <input type="texte" name="time[0][matin][deb]" value="{{ old('time[0][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                            <label for="time[0][matin][deb]" class="field-icon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </label>
                                                        </label><br clear="all">
                                                    </div>
                                                    <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                        <label for="time[0][matin][fin]" class="field prepend-icon"  >
                                                            <input type="texte" name="time[0][matin][fin]" value="{{ old('time[0][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                            <label for="time[0][matin][fin]" class="field-icon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </label>
                                                        </label><br clear="all">
                                                    </div>

                                                    <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                    <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                        <label for="time[0][soir][deb]" class="field prepend-icon"  >
                                                            <input type="texte" name="time[0][soir][deb]" value="{{ old('time[0][soir][deb]') }}" class="gui-input" placeholder="De...">
                                                            <label for="time[0][soir][deb]" class="field-icon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </label>
                                                        </label><br clear="all">
                                                    </div>
                                                    <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                        <label for="time[0][soir][fin]" class="field prepend-icon"  >
                                                            <input type="texte" name="time[0][soir][fin]" value="{{ old('time[0][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                            <label for="time[0][soir][fin]" class="field-icon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </label>
                                                        </label>
                                                    </div>

                                                    <br><br>


                                                    <br clear="all">

                                                </div>
                                                <br clear="all">





                                            <div class="col-md-3">

                                            <label class="option block">
                                                <input type="checkbox" name="jours[]" id="mardi" value="1" >
                                                <span class="checkbox"></span>Mardi</label></div>


                                         <!--   <script>
                                                $(document).ready(function(){

                                                    $("#mardi").click(function(){

                                                        if( $('input[name=mardi]').is(':checked') ){
                                                            $("#mard").show();
                                                        } else {
                                                            $("#mard").hide();
                                                        }

                                                    })



                                                })
                                            </script>-->

                                            <div class="section" id="mard" >

                                                <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[1][matin][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[1][matin][deb]" value="{{ old('time[1][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[1][matin][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[1][matin][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[1][matin][fin]" value="{{ old('time[1][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[1][matin][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>

                                                <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[1][soir][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[1][soir][deb]" value="{{ old('time[1][soir][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[1][soir][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[1][soir][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[1][soir][fin]" value="{{ old('time[1][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[1][soir][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                <br><br>


                                                <br clear="all">

                                            </div>
                                            <br clear="all">




                                            <div class="col-md-3">
                                            <label class="option block">
                                                <input type="checkbox" name="jours[]" id="mercredi" value="2">
                                                <span class="checkbox"></span>Mercredi</label></div>




                                   <!--         <script>
                                                $(document).ready(function(){

                                                    $("#mercredi").click(function(){

                                                        if( $('input[name=mercredi]').is(':checked') ){
                                                            $("#mer").show();
                                                        } else {
                                                            $("#mer").hide();
                                                        }

                                                    })



                                                })
                                            </script> -->

                                            <div class="section" id="mer">

                                                <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[2][matin][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[2][matin][deb]" value="{{ old('time[2][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[2][matin][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[2][matin][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[2][matin][fin]" value="{{ old('time[2][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[2][matin][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>

                                                <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[2][soir][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[2][soir][deb]" value="{{ old('time[2][soir][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[2][soir][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[2][soir][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[2][soir][fin]" value="{{ old('time[2][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[2][soir][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                <br><br>


                                                <br clear="all">

                                            </div>
                                            <br clear="all">




                                            <div class="col-md-3">
                                            <label class="option block">
                                                <input type="checkbox" name="jours[]" id="jeudi" value="3" >
                                                <span class="checkbox"></span>Jeudi</label></div>




                                 <!--           <script>
                                                $(document).ready(function(){

                                                    $("#jeudi").click(function(){

                                                        if( $('input[name=jeudi]').is(':checked') ){
                                                            $("#jeud").show();
                                                        } else {
                                                            $("#jeud").hide();
                                                        }

                                                    })



                                                })
                                            </script>-->

                                            <div class="section" id="jeud">

                                                <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[3][matin][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[3][matin][deb]" value="{{ old('time[3][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[3][matin][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[3][matin][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[3][matin][fin]" value="{{ old('time[3][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[3][matin][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>

                                                <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[3][soir][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[3][soir][deb]" value="{{ old('time[3][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[3][soir][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[3][soir][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[3][soir][fin]" value="{{ old('time[3][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[3][soir][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                <br><br>


                                                <br clear="all">

                                            </div>
                                            <br clear="all">





                                            <div class="col-md-3">
                                            <label class="option block">
                                                <input type="checkbox" name="jours[]" id="vendredi" value="4">
                                                <span class="checkbox"></span>Vendredi</label></div>


                                        <!--    <script>
                                                $(document).ready(function(){

                                                    $("#vendredi").click(function(){

                                                        if( $('input[name=vendredi]').is(':checked') ){
                                                            $("#vend").show();
                                                        } else {
                                                            $("#vend").hide();
                                                        }

                                                    })



                                                })
                                            </script> -->

                                            <div class="section" id="vend">

                                                <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[4][matin][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[4][matin][deb]" value="{{ old('time[4][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[4][matin][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[4][matin][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[4][matin][fin]" value="{{ old('time[4][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[4][matin][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>

                                                <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[4][soir][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[4][soir][deb]" value="{{ old('time[4][soir][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[4][soir][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[4][soir][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[4][soir][fin]" value="{{ old('time[4][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[4][soir][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                <br><br>


                                                <br clear="all">

                                            </div>
                                            <br clear="all">




                                            <div class="col-md-3">
                                            <label class="option block">
                                                <input type="checkbox" name="jours[]" id="samedi" value="5">
                                                <span class="checkbox"></span>Samedi</label></div>



                                     <!--       <script>
                                                $(document).ready(function(){

                                                    $("#samedi").click(function(){

                                                        if( $('input[name=samedi]').is(':checked') ){
                                                            $("#sam").show();
                                                        } else {
                                                            $("#sam").hide();
                                                        }

                                                    })



                                                })
                                            </script>-->



                                            <div class="section" id="sam">

                                                <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[5][matin][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[5][matin][deb]" value="{{ old('time[5][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[5][matin][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[5][matin][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[5][matin][fin]" value="{{ old('time[5][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[5][matin][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>

                                                <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[5][soir][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[5][soir][deb]" value="{{ old('time[5][soir][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[5][soir][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[5][soir][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[5][soir][fin]" value="{{ old('time[5][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[5][soir][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                <br><br>


                                                <br clear="all">

                                            </div>
                                            <br clear="all">



                                            <div class="col-md-3">
                                                <label class="option block">
                                                    <input type="checkbox" name="jours[]" id="dimanche" value="6">
                                                    <span class="checkbox"></span>Dimanche</label></div>



                                            <!--       <script>
                                                       $(document).ready(function(){

                                                           $("#samedi").click(function(){

                                                               if( $('input[name=samedi]').is(':checked') ){
                                                                   $("#sam").show();
                                                               } else {
                                                                   $("#sam").hide();
                                                               }

                                                           })



                                                       })
                                                   </script>-->



                                            <div class="section" id="sam">

                                                <div style="width:5%; float: left;line-height: 40px">Matin : </div>


                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[6][matin][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[6][matin][deb]" value="{{ old('time[6][matin][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[6][matin][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[6][matin][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[6][matin][fin]" value="{{ old('time[6][matin][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[6][matin][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>

                                                <div style="width:5%; float: left;line-height: 40px">Soir : </div>



                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[6][soir][deb]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[6][soir][deb]" value="{{ old('time[6][soir][deb]') }}" class="gui-input" placeholder="De...">
                                                        <label for="time[6][soir][deb]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label><br clear="all">
                                                </div>
                                                <div class="col-md-6 ph10" style="width:12%; float: left;line-height: 40px">
                                                    <label for="time[6][soir][fin]" class="field prepend-icon"  >
                                                        <input type="texte" name="time[6][soir][fin]" value="{{ old('time[6][soir][fin]') }}" class="gui-input" placeholder="à ...">
                                                        <label for="time[5][soir][fin]" class="field-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                <br><br>


                                                <br clear="all">

                                            </div>
                                            <br clear="all">



                                        </div>

                                        <h6 style="width:10%; float:left; line-height: 40px"> </h6>
                                        <div style="width:20%; float: left;line-height: 40px">Fréquence des consultations: </div>

                                        <div class="option-group field" name="freq">
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="15" checked>
                                                <span class="radio"></span>15 min</label></div>
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="20" >
                                                <span class="radio"></span>20 min</label></div>
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="30">
                                                <span class="radio"></span>30 min</label></div>
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="45">
                                                <span class="radio"></span>45 min</label></div>
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="60">
                                                <span class="radio"></span>60 min</label></div>
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="90">
                                                <span class="radio"></span>1h 30 min</label></div>
                                            <div class="col-md-2">
                                            <label class="option block">
                                                <input type="radio" name="freq" value="120">
                                                <span class="radio"></span>2h</label></div>
                                            <br><br>


                                            <br clear="all">
                                        </div>



                                        <div class="section">
                                <div class="pull-right">
                                     <input  type="submit" value="Créer un établissement" id="create" class="btn btn-bordered btn-primary">
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

