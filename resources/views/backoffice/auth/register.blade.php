@extends('backoffice.layouts.layoutForm')

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

<form method="POST" action="/backoffice/auth/register" enctype="multipart/form-data">
    {!! csrf_field() !!}


    <div class="panel-body pn">
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
                                                <label  class="field select"> 
                                               
                                                <div style="width:15%; float:left; line-height: 40px">Vous êtes : </div>

                                                    <select style="width:85%; float:left" name="role" id="role" required=true value="{{ old('role') }}"> 
                                                    <option value="0">Veuillez selectionner votre role ...</option>
                                                        <option value="10">Admin</option>
                                                        <option value="20">Professionnel</option>
                                                        <option value="30">Sécrétaire</option>
                                                    </select>
                                                     <i class="arrow"></i>
                                                <br clear="all">
                                                </label>
                                            </div> 
                                        <script>
                                            $(document).ready(function(){
                                                $("#role").change(function(){
                                                    
                                                    if($(this).val() == 20) $("#select_pro").show(); else $("#select_pro").hide();
                                                     })
                                            })
                                        </script>
                                <script>
                                    $(document).ready(function(){
                                        $("#role").change(function(){

                                            if($(this).val() == 20 || $(this).val() == 30)
                                                $("#select_est").show(); else $("#select_est").hide();
                                        })
                                    })
                                </script>
                         <!-- -------------- /section -------------- -->

                                <div class="section" id="select_est" style="display: none">
                                    <label  class="field select">

                                        <div style="width:15%; float:left; line-height: 20px">Vous travaillez chez : </div>

                                        <select style="width:85%; float:left" name="establishment_id" id="establishment_id"
                                                required=true value="{{ old('establishment_id') }}">
                                            @foreach($establishments as $establishment)
                                                @if($establishment->id <> 1)
                                                    <option value="{{$establishment->id}}">{{$establishment->nameE}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <i class="arrow"></i>
                                        <br clear="all">
                                    </label>
                                </div>
                                <!-- -------------- /section -------------- -->

                                      <div class="section" id="select_pro" style="display: none">
                                                <label  class="field select"> 
                                               
                                                <div style="width:15%; float:left; line-height: 40px">Vous êtes : </div>

                                                    <select style="width:85%; float:left" name="speciality" id="speciality" required=true value="{{ old('speciality') }}">
                                                    @foreach($specialities as $specialite)
                                                            @if($specialite->id <> 1)
                                                                <option value="{{$specialite->id}}">{{$specialite->intituleProf}}</option>
                                                            @endif
                                                      @endforeach  
                                                    </select>
                                                     <i class="arrow"></i>
                                                <br clear="all">
                                                </label>
                                            </div> 

                         <!-- -------------- /section -------------- -->

                    <?php // endif; ?>
                          <div class="section">
                             <div class="form-group{{ $errors->has('gradeHonor') ? ' has-error' : '' }}" style="color:red;">
                                <label for="gradeHonor" class="field prepend-icon">
                                    <input type="texte" name="gradeHonor" class="gui-input"
                                           placeholder="Grade Honoriphique...">
                                            <label for="gradeHonor" class="field-icon">
                                                <i class="fa fa-graduation-cap"></i>
                                            </label>
                                 </label>
                            </div>
                        </div>


                                <div class="section">
                                    {!! Form::file('image') !!}

                                    <p class="errors">{!!$errors->first('image')!!}</p>
                                    @if(Session::has('error'))
                                    <p class="errors">{!! Session::get('error') !!}</p>
                                    @endif
                                </div>
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
</form>



    @stop
    
@stop