@extends('app')
@section('contenido')
<div class="containerf">
    <div class="postcard">
        <form action="{{ url('post') }}" method="post" class="formpostcardc">
            @csrf
            <div class="postcarda">
                <div class="postcard11">
                    <div class="postcardtagc">
                        <select name="postcardtags" id="idpokemon">
                             @foreach($pokemon as $pokemonp)
                                <option value="{{$pokemonp->id}}">{{$pokemonp->id.' '. $pokemonp->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="postcard111"><input type="text" name="subject" id="subject" placeholder="Subject..."></div>     
                </div>
                <textarea wrap="hard" rows="7" cols="20" class="postcard12" name="content" id="content">
                </textarea>
            </div>
            <input type="submit" value="SAVE" class="postadd2" />
        </form>
          <a href="{{url('post')}}" class="pokemonbacka">RETURN</a>
         
</div>
</div>
@stop