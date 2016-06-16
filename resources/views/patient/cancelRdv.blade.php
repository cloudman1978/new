@extends('layouts.layout')

@section('title')
    Mon espace personnel
@stop



@section('chercher')

    @include('partial')


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
                                {!!Form::open(
                                    [
                                        'method' => 'delete',
                                        'route' => ['patient.destroy', $rdv->id]
                                    ])!!}
                                {!! csrf_field() !!}
                                <div class="tg-heading-border tg-small">
                                    <h3>Annuler le rendez-vous</h3>
                                </div>
                                <div class="row">
                                                Êtes-vous sûr de vouloir annuler le rendez-vous?
                                                <div class="option-group field" name="cancel" id="cancel">
                                                    <label class="option block">
                                                        <input type="radio" name="cancel" value="0" id="c1">
                                                        <span class="radio" style="display: inline-block">Oui </span></label><br>
                                                    <label class="option block">
                                                        <input type="radio" name="cancel" value="1" id="c2">
                                                        <span class="radio" style="display: inline-block">Non</span></label>

                                                </div>
                                                <div class="tg-btnarea">
                                                    <div class="form-group">
                                                        <button class="tg-btn" type="submit">Valider</button>
                                                        <!--    <button  type="search" class="tg-btn" >Chercher</button>!-->
                                                    </div>
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



