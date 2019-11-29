@extends('app')
@section('contenido')
    <div class="database">
        @foreach($pokemons as $pokemon)
        <div class="pokemoncard">
            <div class="pokemonimage">
                 <a href="{{url('pokemon/'.$pokemon->id) }}" >
                   <img src="{{url('/assets/img/'. $pokemon->image)}}" /> 
                 </a>
            </div>
            <div class="pokemoninfo">
                <div class="pokemoninfo1">
                    <h1 id="id">{{$pokemon->id}} - {{$pokemon->name}}</h1>
                    <h1 id="id"><i class="fas fa-weight-hanging"></i> {{$pokemon->weight}}</h1>
                    <h1><i class="fas fa-angle-double-up"></i> {{$pokemon->height}}</h1>
                </div>
                <div class="pokemoninfo2">
                    <a href="{{url('pokemon/'.$pokemon->id.'/edit') }}" class="btnp"><i class="fas fa-edit"></i></a>
                    <form action="{{url('pokemon/'.$pokemon->id)}}" method="post" class="destroy">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="X">
                    </form>
                </div>
            </div>
            
          
        </div>
            
        @endforeach
            
      
        
    </div>
    <br>
    <br>
     {{$pokemons->links()}}
      <a href="{{url('pokemon/create')}}" class="pokemonadd">ADD POKEMON</a>

    
</div>
@stop