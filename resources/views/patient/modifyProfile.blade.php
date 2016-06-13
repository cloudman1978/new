@extends('layouts.layoutProfile')



@section('name') {{ $patient->name}} @stop

@section('pseudo') {{ $patient->name }} @stop

@section('content')

        <!--place style list-->
<div class="pg style_list">
    <div class="con">
        {!!Form::model($patient,
                                        [ 'method' => 'put',
                                        'route' => ['patient.update', $patient->id]
                                    ]

                                    )!!}
        {!! csrf_field() !!}

        <div class="section">
            <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}" style="color:red;">
                <div class="form-group" style="color:blue;">CIN:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="cin" class="field prepend-icon"  >
                    <input type="texte"  name="cin" value="{{ $patient->cin }}"
                           class="form-control" style="width: 350px">
                </label>
               </div></div>
        </div>

        <div class="section">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="color:red;">
                <div class="form-group" style="color:blue;">Nom et prénom:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="name" class="field prepend-icon"  >
                        <input type="texte"  name="name" value="{{ $patient->name }}"
                               class="form-control" style="width: 350px">
                    </label>
                </div></div>
        </div>

        <div class="section">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="color:red;">
                <div class="form-group" style="color:blue;">Email:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    <label for="email" class="field prepend-icon"  >
                        <input type="texte"  name="email" value="{{ $patient->email }}"
                               class="form-control" style="width: 350px">
                    </label>
                </div></div>
        </div>

        <div class="section">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="color:red;">
                <div class="form-group" style="color:blue;">Mot de passe :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    <a href="#Pass" class="log_btn"> Modifier mot de passe</a>
                </div></div>
        </div>



    <div class="section">
        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" style="color:red;">
            <div class="form-group" style="color:blue;">Téléphone:
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="tel" class="field prepend-icon"  >
                    <input type="text"  name="tel" value="{{ $patient->tel }}"
                           class="form-control" style="width: 350px">
                </label>
            </div></div>
    </div>

    <div class="section">
        <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}" style="color:red;">
            <div class="form-group" style="color:blue;">Date de naissance:
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="birthDate" class="field prepend-icon"  >
                    <input type="text" id="birthDate" name="birthDate"
                           class="form-control" value="{{ $patient->birthDate }}"
                           style="width: 350px">
                </label>
            </div></div>
    </div>
        <script>
            $("document").ready(function(){
                $("#birthDate").datepicker({
                    maxDate: '12/31/1999',
                    minDate: '01/01/1906',
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
        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}" style="color:red;">
            <div class="form-group" style="color:blue;">Genre:
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <label for="gender" class="field prepend-icon"  >
                    <select  name="gender" id="gender" required=true value="{{ $patient->gender }}"
                    class="form-control">
                        <option value="-1">Veuillez selectionner le genre du patient ...</option>
                        <option value="1">Masculin</option>
                        <option value="2">Féminin</option>
                    </select>
                </label>
            </div></div>
    </div>

    <div class="section">
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="color:red;">
            <div class="form-group" style="color:blue;">Adresse:
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="address" class="field prepend-icon"  >
                    <input type="text" id="address" name="address"
                           class="form-control" value="{{ $patient->address }}"
                    style="width: 350px">
                </label>
            </div></div>
    </div>
    <div class="section">
        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}" style="color:red;">
            <div class="form-group" style="color:blue;">Taille:
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="height" class="field prepend-icon"  >
                    <input type="text" name="height"
                           class="form-control" value="{{ $patient->height }}"
                           style="width: 350px">
                </label>
            </div></div>
    </div>

    <div class="section">
        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}" style="color:red;">
            <div class="form-group" style="color:blue;">Poids:
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="size" class="field prepend-icon"  >
                    <input type="text" id="size" name="size"
                           class="form-control" value="{{ $patient->size }}"
                           style="width: 350px">
                </label>
            </div></div>
    </div>


        <div class="section">
            <div class="pull-right">
                <input  type="submit" value="Modifier patient" id="create" class="btn btn-bordered btn-primary">
            </div>
        </div>


        {!!Form::close()!!}

    </div>
</div>
</div>

@stop

@section('more') <center>   <a href="/" class="comm" style="text-align: center"><i class="fa fa-search"></i>Prendre RDV</a> </center>@stop

@section('footS')



@stop






