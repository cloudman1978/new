@extends('layouts.layoutForm')

@section('title')
    Inscription
@stop

@section('body')

@section('msg')
    Inscrivez vous
@stop

@section('form')

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

    <form method="POST" action="/auth/register" enctype="multipart/form-data">
        {!! csrf_field() !!}


        <div class="panel-body pn">

            <div class="section">
                <div class="col-md-6 ph10">
                    <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                        <label for="cin" class="field prepend-icon"  >
                            <input type="texte" name="cin" value="{{ old('cin') }}" class="gui-input" placeholder="Donner votre cin...">

                            <label for="cin" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label><br clear="all">
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="col-md-6 ph10">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                        <label for="name" class="field prepend-icon">
                            <input type="text" name="name" value="{{ old('name') }}" class="gui-input"
                                   placeholder="Nom & Prénom...">
                            <label for="name" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div></div>

                <div class="col-md-6 ph10">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" value="{{ old('email') }}" class="gui-input"
                                   placeholder="Email...">

                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div></div>

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
                                   placeholder="Retaper votre mot de passe...">
                            <label for="password_confirmation" class="field-icon">
                                <i class="fa fa-unlock-alt"></i>
                            </label>

                        </label>
                    </div>
                </div>
                <!-- -------------- /section -------------- -->
                <div class="section">
                    <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                        <label for="tel" class="field prepend-icon">
                            <input type="texte" name="tel" value="{{ old('tel') }}" class="gui-input"
                                   placeholder="Téléphone...">
                            <label for="tel" class="field-icon">
                                <i class="fa fa-phone"></i>
                            </label>
                        </label>
                    </div>
                </div>
                <!-- -------------- /section -------------- -->

                <div class="section">
                    <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}" style="color:red;">
                        <label for="birthDate" class="field prepend-icon">
                            <input type="text" name="birthDate" id="birthDate" value="{{ old('birthDate') }}" class="gui-input"
                                   placeholder="Date de naissance..."  required max="2002-12-31" min="1960-01-01" >
                            <label for="birthDate" class="field-icon">
                                <i class="fa fa-birthday-cake"></i>
                            </label>
                        </label>
                    </div>
                </div>
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
                        <select  name="gender" id="gender" required=true value="{{  old('gender')  }}">
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
                        <label for="address" class="field prepend-icon">
                            <input type="text" name="address" id="address" class="gui-input"
                                   placeholder="Adresse..." >
                            <label for="address" class="field-icon">
                                <i class="fa fa-home"></i>
                            </label>
                        </label>
                    </div>
                </div>

                <div class="section">
                    <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}" style="color:red;">
                        <label for="height" class="field prepend-icon">
                            <input type="texte" name="height" class="gui-input"
                                   placeholder="Taille patient..." >
                            <label for="height" class="field-icon">
                                <i class="fa fa-child"></i>
                            </label>
                        </label>
                    </div>
                </div>

                <div class="section">
                    <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}" style="color:red;">
                        <label for="size" class="field prepend-icon">
                            <input type="texte" name="size" class="gui-input"
                                   placeholder="Poids patient..." >
                            <label for="size" class="field-icon">
                                <i class="fa fa-child"></i>
                            </label>
                        </label>
                    </div>
                </div>

                <div class="section">
                    <div style="color:#00BFFF;width:80%;float:left;line-height:40px;font-size: medium;">Assurances: </div><br clear="all">
                    <label class="option block"></label>
                    <?php  $i=0;  ?>
                    @foreach($insurances as $ins)
                        <input type="checkbox" class="assurance_i" inputid="<?php echo $ins->id; ?>" name="ins<?php echo $ins->id; ?>" id="ins<?php echo $ins->id; ?>" value="{{ $ins->id }}" style="display: inline">
                        {{  $ins->pseudo }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="aff<?php echo $ins->id; ?>"
                               id ="aff<?php echo $ins->id; ?>" style="display: none"><br>

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


                <!-- -------------- /section -------------- -->

                <div class="section">
                    <div class="bs-component pull-left mt10">
                        <div class="checkbox-custom checkbox-primary mb5">
                            <input type="checkbox" checked="" id="agree">
                            <label for="agree">J'accepte les
                                <a href="#"> conditions d'utilisation. </a></label>
                        </div>
                    </div>
                    <div class="pull-right">
                        <input  type="submit" value="Créer un compte" id="register" class="btn btn-bordered btn-primary">
                    </div>
                </div>
                <!-- -------------- /section -------------- -->
                </div></div>
    </form>



 @stop


@section('footS')
         <!-- -------------- /Scripts -------------- -->

    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

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