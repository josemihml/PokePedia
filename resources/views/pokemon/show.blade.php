@extends('app')
@section('contenido')
<div class="showp">
    <div class="showp1">
        <div class="showp11">
            <h1><i class="fas fa-fingerprint"></i> {{$pokemon->id}}</h1>
            <h1> <img src="{{url('/assets/img/avatar.png')}}" /> {{$pokemon->name}}</h1>
            <h1><i class="fas fa-weight-hanging"></i>  {{$pokemon->weight}}</h1>
            <h1><i class="fas fa-angle-double-up"></i> {{$pokemon->height}}</h1>
        </div>
        <div class="abilitiesp">
            
        </div>
    </div>
    <div class="showp2">
         <img src="{{url('/assets/img/'. $pokemon->image)}}" /> 
    </div>
</div>
  <a href="{{url('pokemon')}}" class="pokemonback">VOLVER</a>
@stop