@extends('app')
@section('contenido')
<div class="createforma">
    <div class="createforma1">
        <form action="{{ url('ability') }}" method="post">
            @csrf
             <div class="abilitycard">
                  <div class="abilitycard1">
                      <h1> <img  src="{{url('/assets/img/ability.png')}}" /> <input type="text" name="ability" id="ability" placeholder="ability name..."></h1>
                     
                    </div>
            </div>
                <input type="submit" value="SAVE" class="abilityadd2"/>
                <a href="{{url('ability')}}" class="pokemonbacka">RETURN</a>
                
            </div>
        </form>
    </div>
</div>
@stop