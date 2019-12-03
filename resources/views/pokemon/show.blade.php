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
            <div class="abilitiesp1">
            @foreach($abilitiesP as $abilityP)
                @if($abilityP->pokemon->id == $pokemon->id)
                <div class="ability">
                    <h1 class="imgattack"> <img  src="{{url('/assets/img/ability.png')}}" /> {{$abilityP-> ability -> ability}}</h1>
                </div>
               
                @endif
            @endforeach
            </div>
            @auth
            <a href="{{url('pokemon')}}" class="newability"><i class="fas fa-plus"></i><img  src="{{url('/assets/img/ability.png')}}" /></a>
            @endauth
        </div>
         
    </div>
    <div class="showp2">
         <img src="{{url('/assets/img/'. $pokemon->image)}}" /> 
    </div>
</div>
  <a href="{{url('pokemon')}}" class="pokemonback">RETURN</a>
@stop