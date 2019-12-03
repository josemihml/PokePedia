@extends('app')
@section('contenido')
<div class="databasea">
      @foreach($abilities as $ability)
      <div class="abilitycard">
          <div class="abilitycard1">
              <h1> <img  src="{{url('/assets/img/ability.png')}}" /> {{$ability->id}}. {{$ability->ability}}</h1>
                @auth
               <form action="{{url('ability/'.$ability->id)}}" method="post" class="destroy">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >
                                <img  src="{{url('/assets/img/abilityd.png')}}" /> 
                            </button>
                </form>
                @endauth
            </div>
      </div>
      @endforeach
    </div>
    
    <br>
    <br>
    {{$abilities->links()}}
    @auth
    <a href="{{url('ability/create')}}" class="abilityadd">ADD ABILITY</a>
    @endauth
    <a href="{{url('pokemon')}}" class="pokemonbacka">RETURN</a>
@stop