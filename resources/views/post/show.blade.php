@extends('app')
@section('contenido')
<div class="containerf">
    <div class="postcard">
      <div class="postcarda">
      <div class="postcard11">
          <div class="postcardtag"> 
                @foreach($pokemon as $pokemonP)
                    @if($pokemonP -> id == $post -> idpokemon)
                      <p>{{$pokemonP -> name}}</p>
                    @endif
                @endforeach
          </div>
          <div class="postcard111"><h1> {{$post -> subject}}</h1> </div>       
          <div class="postcard112"><p> Posted by
                @foreach($user as $userP)
                    @if($userP->id == $post -> iduser)
                      <p> &nbsp;{{$userP->name}}</p>
                    @endif
                @endforeach
                </p>
           </div>
        </div> 
        <textarea wrap="hard" rows="7" cols="20" class="postcard12" disabled>
         {{$post->content}}
        </textarea>
      </div>  
    </div>
    <div class="comments">
        <div class="comments1">
            @foreach($comment as $commentP)
                @if($commentP -> idpost == $post -> id) 
                <div class="comment">
                    <div class="commentsP">
                          @foreach($user as $userP)
                            @if($userP->id == $commentP->iduser)
                              <p> &nbsp;{{$userP->name}}</p>
                            @endif
                          @endforeach
                    </div>
                    <div class="commentsc">
                          <p>{{$commentP -> content}}</p>
                    </div>  
                  
                </div>
                @endif
            @endforeach
        </div>
         <a href="{{url('comment/create')}}" class="postadd">ADD COMMENT</a>
    </div>
</div>
       <a href="{{url('post')}}" class="pokemonbacka">RETURN</a>
    </div>
    
</div>
@stop










