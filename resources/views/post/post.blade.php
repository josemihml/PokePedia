@extends('app')
@section('contenido')
<div class="containerf">
    @foreach($posts as $post)
     <div class="postcard">
        <h1>{{$post->subject}}</h1>
        <h1>{{$post->idpokemon}}</h1>
        <h1>{{$post->content}}</h1>
        <a href="{{url('post/show')}}" class="postadd">ADD POST</a>
    </div>
    @endforeach
    {{$posts->links()}}
      <a href="{{url('post/create')}}" class="postadd">ADD POST</a>
</div>
@stop