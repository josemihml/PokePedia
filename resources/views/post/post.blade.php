@extends('app')
@section('contenido')
<div class="containerf">
  @foreach($posts as $post)
  <div class="postcard">
   <a class="postcarda" href="{{url('post/'.$post->id) }}">
      <div class="postcard11">
          <div class="postcardtag"> 
                @foreach($pokemon as $pokemonP)
                    @if($pokemonP->id == $post->idpokemon)
                      <p>{{$pokemonP->name}}</p>
                    @endif
                @endforeach
          </div>
          <div class="postcard111"><h1> {{$post->subject}}</h1> </div>       
          <div class="postcard112"><p> Posted by
                @foreach($user as $userP)
                    @if($userP->id == $post->iduser)
                      <p> &nbsp;{{$userP->name}}</p>
                    @endif
                @endforeach
                </p>
           </div>
        </div> 
        <textarea wrap="hard" rows="7" cols="20" class="postcard12" disabled>
         {{$post->content}}
        </textarea>
      </a>
    </div>
    @endforeach
    {{$posts->links()}}
    @auth
     <a href="{{url('post/create')}}" class="postadd">ADD POST</a>
    @endauth
</div>
@stop