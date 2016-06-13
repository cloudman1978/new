


@extends('layouts.layoutForm')

@section('title')
    Authentification
@stop

@section('body')

@section('msg')
    Mon compte
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

    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <div class="panel-body pn mv10">

            <div class="section">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="field prepend-icon">
                        <input type="texte" name="email" value="{{ old('email') }}" class="gui-input"
                               placeholder="Email...">
                        <label for="email" class="field-icon">
                            <i class="fa fa-user"></i>
                        </label>

                    </label>
                </div>
            </div>
            <!-- -------------- /section -------------- -->

            <div class="section">
                <div class="form-group{{ $errors->has('motPass') ? ' has-error' : '' }}">
                    <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input"
                               placeholder="Mot de passe...">
                        <label for="password" class="field-icon">
                            <i class="fa fa-lock"></i>
                        </label>

                    </label>
                </div>
            </div>
            <!-- -------------- /section -------------- -->
            <div class="section">
                <div class="bs-component pull-left pt5">
                    <!-- <div class="radio-custom radio-primary mb5 lh25">-->
                    <input type="checkbox" name="remember"> Rester connecté
                    <!-- </div>-->
                </div>

                <button type="submit" class="btn btn-bordered btn-primary pull-right">Connecter</button>
            </div>
            <!-- -------------- /section -------------- --><br><br>
            <a class="btn btn-link" href="/auth/reset">Mot e passe oublié?</a>
        </div>
        <!-- -------------- /Form -------------- -->
    </form>



@stop



@stop