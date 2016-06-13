@extends('layouts.layoutProfile')



@section('name') {{ $patient->name}} @stop

@section('pseudo') {{ $patient->name }} @stop

@section('content')

        <!--place style list-->
<div class="pg style_list">
    <div class="con">

    </div>
</div>
</div>

@stop

@section('more') <center>   <a href="/" class="comm" style="text-align: center"><i class="fa fa-search"></i>Prendre RDV</a> </center>@stop






