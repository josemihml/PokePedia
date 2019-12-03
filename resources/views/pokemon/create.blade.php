@extends('app')
@section('contenido')
<div class="createformp">
    <div class="createformp1">
        <div class="createformp11">
         <form action="{{ url('pokemon') }}" method="post" class="formpostcardcf" enctype="multipart/form-data">
            @csrf
             <input type="text" name="name" id="name" class="name">
             <br>
             <input type="number" name="weight" id="weight" class="weight">
             <br>
             <input type="number" name="height" id="height" class="height">
             <br>
             <input type="file" name="file" id="file" class="postadd2f">
             <br>
             <input type="submit" value="SAVE" class="postadd2" />

        </form>
        </div>
    </div>
</div>
  <a href="{{url('pokemon')}}" class="pokemonbacka">VOLVER</a>
@stop