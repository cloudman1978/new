@extends('layouts.layout')

        @section('title')
            Mon espace personnel
            @stop



@section('chercher')

    <div style="height: 300px" class="tg-location-map tg-haslayout"></div>
    <div class="tg-banner-content">
        <div class="tg-displaytable">
            <div class="tg-displaytablecell">

            <div class="container">
        <div class="col-md-12 col-sm-7 col-xs-9 tg-verticalmiddle">
            <div class="row">
                <form class="form-searchdoctors"  method="post" name="form" action="/search">
                    {!! csrf_field() !!}



                    <fieldset>
                        <div class="tab-content tg-tab-content">
                            <div role="tabpanel" class="tab-pane active" id="nephrologist">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address"
                                                   id="address" name="address">
                                            <a style="height: 69px;margin-left: -104px;padding-top: 28px;position: absolute;"
                                               href="javascript:void(0);" class="search__doc-where__geolc geolc icon-location"
                                               data-toggle="popover" data-placement="bottom"
                                               data-trigger="manual"><span>Autour de moi</span></a>

                                        </div>


                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">

                                            {!! csrf_field() !!}
                                            <span class="select">
                                                                         <select  class="group" name="speciality" id="speciality">
                                                                             <option value="-1">Sélectionner une spécialité s'il vous plaît</option>
                                                                             @foreach($specialities as $specialite)

                                                                                 @if($specialite->id <> 1)
                                                                                     <option value="{{$specialite->id}}">{{$specialite->intituleProf}}</option>
                                                                                 @endif
                                                                             @endforeach
                                                                         </select>
                                                                    </span>

                                        </div>

                                        <input type="hidden" name="long" id="long">
                                        <input type="hidden" name="lat" id="lat">

                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="Nom du docteur"
                                                   name="name">
                                        </div>


                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                        <div class="form-group">
                                            <button class="tg-btn" type="submit">Chercher</button>
                                            <!--    <button  type="search" class="tg-btn" >Chercher</button>!-->
                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-sm-12 col-xs-12 tg-verticalmiddle">


                                    </div>
                                    <div class="col-md-10 col-sm-12 col-xs-12 tg-verticalmiddle">

                                        <h5>Trouvez un docteur et prendre un rendez-vous immédiatement.</h5>

                                    </div></div>
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    <div class="show-search"><i class="fa fa-search"></i></div>

    <script type="text/javascript">
        var x = document.getElementById("long");
        var y = document.getElementById("lat");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            y.value =  position.coords.latitude ;


            x.value =   position.coords.longitude;

            // document.write (x.value+ ', '+ y.value);
        }
    </script>



    @stop

@section('detailsMenu')

    <div id="tg-innerbanner" class="tg-innerbanner tg-bglight tg-haslayout">

        <div class="tg-pagebar tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Espace patient</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="#">Accueil</a></li>
                            <li class="active">Détails patient {{ $patient->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop




@section('detailsPage')

    <main id="main" class="tg-main-section tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
                        <fieldset>
                            <div class="tg-bordertop tg-haslayout">
                                <div class="tg-formsection">
                                    {!!Form::model($patient,
                                      [ 'method' => 'put',
                                      'route' => ['patient.update', $patient->id]
                                  ]

                                  )!!}
                                    {!! csrf_field() !!}
                                    <div class="tg-heading-border tg-small">
                                        <h3>Changer informations personnelles</h3>
                                    </div>
                                    <div class="row">
                                        <table style="border-color: transparent;"border="0" frame="void">
                                            <tbody style="border-color: transparent;"border="0" frame="void">
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <div class="form-group" style="color:#00BFFF;">CIN:</div>
                                                </td>
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <label for="cin" class="field prepend-icon"  >
                                                        <input type="texte"  name="cin" value="{{ $patient->cin }}"
                                                               class="form-control" style="width: 350px">

                                                    </label>
                                                </td>
                                                    </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <div class="form-group" style="color:#00BFFF;">Nom et prénom:</div>
                                                </td>
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <label for="name" class="field prepend-icon"  >
                                                        <input type="texte"  name="name" value="{{ $patient->name }}"
                                                               class="form-control" style="width: 350px">
                                                    </label>
                                                </td>
                                                    </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                                                <td style="border-color: transparent;"border="0" frame="void">

                                                        <div class="form-group" style="color:#00BFFF;">Email:</div>
                                                </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="email" class="field prepend-icon"  >
                                                            <input type="texte"  name="email" value="{{ $patient->email }}"
                                                                   class="form-control" style="width: 350px">
                                                        </label>
                                                    </td>
                                                    </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Mot de passe :</div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <a href="patient/modifyPass" class="log_btn"> Modifier mot de passe</a>
                                                    </td>
                                                    </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Téléphone:</div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="tel" class="field prepend-icon"  >
                                                            <input type="text"  name="tel" value="{{ $patient->tel }}"
                                                                   class="form-control" style="width: 350px">
                                                        </label>
                                                    </td>
                                                    </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Date de naissance:</div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="birthDate" class="form-group"  >
                                                            <input type="text" id="birthDate" name="birthDate"
                                                                   class="datepicker-here" data-language='en' data-position="right top"
                                                                   value="{{ $patient->birthDate }}"
                                                                   style="width: 350px">
                                                        </label>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Genre:</div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="gender" class="form-group"  >
                                                            <select  name="gender" id="gender" required=true value="{{ $patient->gender }}"
                                                                     class="form-control">
                                                                <option value="-1">Veuillez selectionner le genre du patient ...</option>
                                                                @if($patient->gender == 1)
                                                                    <option value="1" selected>Masculin</option>
                                                                    <option value="2">Féminin</option>
                                                                @elseif($patient->gender == 2)
                                                                    <option value="1">Masculin</option>
                                                                    <option value="2" selected>Féminin</option>
                                                                @endif
                                                            </select>
                                                        </label>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Adresse:</div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="address" class="field prepend-icon"  >
                                                            <input type="text" id="addresse" name="address"
                                                                   class="form-control" value="{{ $patient->address }}"
                                                                   style="width: 350px">
                                                        </label>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Taille: </div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="height" class="field prepend-icon"  >
                                                            <input type="text" name="height"
                                                                   class="form-control" value="{{ $patient->height }}"
                                                                   style="width: 350px">
                                                        </label>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}" style="color:red;">
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <div class="form-group" style="color:#00BFFF;">Poids: </div>
                                                    </td>
                                                    <td style="border-color: transparent;"border="0" frame="void">
                                                        <label for="size" class="field prepend-icon"  >
                                                            <input type="text" id="size" name="size"
                                                                   class="form-control" value="{{ $patient->size }}"
                                                                   style="width: 350px">
                                                        </label>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <div style="color:#00BFFF;width:80%;float:left;line-height:40px;font-size: medium;">Assurances: </div><br clear="all">
                                                </td>
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <label class="option block"></label>
                                                    <?php  $i=0;  ?>


                                                    @foreach($inss as $ins)
                                                        <?php
                                                        $checked = "";
                                                        $display = "none";
                                                        $aff = "";
                                                        ?>

                                                        @foreach($insurances as $insurance)
                                                            @if($insurance->id == $ins->id)
                                                                <?php
                                                                $checked = "checked";
                                                                $display = "block";
                                                                $aff = $insurance->affiliation;
                                                                ?>
                                                            @endif
                                                        @endforeach

                                                            <input type="checkbox" <?php echo $checked?> class="assurance_i" inputid="<?php echo $ins->id; ?>"
                                                                   name="ins<?php echo $ins->id; ?>" id="ins<?php echo $ins->id; ?>" value="{{ $ins->id }}" style="display: inline">
                                                            {{  $ins->pseudo }}
                                                            <label for="size" class="field prepend-icon"  >
                                                            <input type="text" name="aff<?php echo $ins->id; ?>" class="form-control"
                                                                   id ="aff<?php echo $ins->id; ?>" style="display: <?php echo $display?>"
                                                                   value="<?php echo $aff ?>" maxlength="20" size="20">
                                                                </label>
                                                            <br>
                                                            <?php  $i++; ?>

                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr style="border-color: transparent;"border="0" frame="void">
                                                <td style="border-color: transparent;"border="0" frame="void"></td>
                                                <td style="border-color: transparent;"border="0" frame="void">
                                                    <div class="tg-btnarea">
                                                        <div class="form-group">
                                                            <button class="tg-btn" type="submit">Modifier patient</button>
                                                            <!--    <button  type="search" class="tg-btn" >Chercher</button>!-->
                                                        </div>
                                                    </div>

                                                </td>


                                            </tr>
                                            </tbody>
                                        </table>

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


                                    </div>
                                    {!!Form::close()!!}

                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <aside id="tg-sidebar">
                        <div class="tg-widget tg-widget-accordions">
                            <h3>Menu patient</h3>
                            <ul class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <li class="panel panel-default active">
                                    <div class="tg-panel-heading" role="tab" id="headingOne">
                                        <h3 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Modifier profil</a>
                                        </h3>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p>Vou pouvez mettre à jour vos données personnelles à tout <a href="patient">moment.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingTwo">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Liste des docteurs</a>
                                        </h3>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <p>Consultez la liste des praticiens avec lesquels vous avez pris
                                                <a href="{{ url('/patient/doctors') }}">rendez-vous.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingThree">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Historique</a>
                                        </h3>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <p>Si vous voulez voire la liste de vos anciens rendez-vous, cliquez <a href="/patient/RdvList">ici.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <div class="tg-panel-heading" role="tab" id="headingFour">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Montant payé</a>
                                        </h3>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <p>Votre montant payé pour chaque consultation ainsi que la somme <a href="/patient/payments">totale.</a> </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default">
                                    <h3 class="panel-title"><a href="/auth/logout">Signout</a></h3>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->

    <div class="modal fade fatenModal" tabindex="-1" role="dialog">
        <div class="tg-modal-content">
            <ul class="tg-modaltabs-nav" role="tablist">
                <li role="presentation" class="active"><a href="#tg-signin-formarea" aria-controls="tg-signin-formarea" role="tab" data-toggle="tab">Modifier Mot de passe</a></li>
            </ul>
            <div class="tab-content tg-haslayout">
                <div role="tabpanel" class="tab-pane tg-haslayout active" id="tg-signin-formarea">
                    <form class="tg-form-modal tg-form-signin"method="POST" action="/auth/login">
                        {!! csrf_field() !!}
                        <fieldset>

                            <label for="password" class="field prepend-icon">
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="Mot de passe...">
                            </label>
                            <label for="password_confirmation" class="field prepend-icon">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                       placeholder="Retapez votre mot de passe...">
                            </label>

                        </fieldset>
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    @stop





    @section('name') {{ $patient->name}} @stop


@section('content')

        <!--place style list-->
<div class="pg style_list">
    <div class="con">
        @foreach($doctors as $doctor)
            <?php
            $photo = $doctor->image;

            $dir = 'users/';
            if(!empty($photo)){
                echo' <img src="'.$dir.$photo.'" height="250" width="250" alt="">';
            }
            else{
                $photo = 'no-photo.PNG';
                echo' <img src="'.$dir.$photo.'" height="200" width="200" alt="">';
            }

            ?>
        <div class="content_li">

            <h2>{{ $doctor->name }}<span></span></h2>
            <span><i class="fa fa-user-md">{{ $doctor->intituleProf }}</i> </span>
            <span><i class="fa fa-home">{{ $doctor->address }}</i> </span>
            <span><i class="fa fa-envelope">{{ $doctor->email }}</i> </span>
            <span><i class="fa fa-phone">{{ $doctor->tel }}</i> </span>

                @endforeach
        </div>
    </div>
</div>

    @stop

@section('more') <center>   <a href="/" class="comm" style="text-align: center"><i class="fa fa-search"></i>Chercher d'autres</a> </center>@stop






