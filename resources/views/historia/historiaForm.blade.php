@extends('layouts.navigation')

@isset($historia)
@php
$title = 'Editar historia'
@endphp
@else
@php
$title = 'Crear historia'
@endphp
@endisset
@section('title', $title)

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@isset($historia)
{!! Form::model($historia, ['route' => ['historia.update', $historia->id], 'method' => 'PATCH', 'enctype' => "multipart/form-data"]) !!}
@else
{!! Form::open(['route' => 'historia.store', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
@endisset
<div class="bg-purple-900 float-left pb-10 pt-10 w-full">
    {!! Form::token() !!}
    <div class="w-full pb-10">
        <div class="mt-5 p-4 w-5/12" style="margin: 0 auto;">
            <p class="pt-3 text-black text-center text-white uppercase">
                <div class="flex flex-wrap -mx-3 mb-6">
                    {!! Form::label('titulo', 'Titulo', ['class' =>'block text-white text-xm font-bold mb-2']) !!}
                    {!! Form::text('titulo', isset($historia) ? $historia->titulo : null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'titulo']) !!}

                    {!! Form::label('privacidad', 'Privacidad', ['class' =>'block text-white text-xm font-bold mb-2 mt-2']) !!}
                    {!! Form::select('privacidad', ['Publico', 'Privado'], isset($historia) ? $historia->privacidad : null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}

                                <label for="files_name" class="mt-5 bg-pink-700 flex px-2 py-1 rounded text-white  border border-transparent hover:border-white">
                                    <i class="fas fa-paperclip flex mt-1"> </i>
                                    <p class="flex ml-4" id="files_label">Sin archivos seleccionados</p>
                                </label>
                                <input id="files_name" type="file" name="imagenes[]" onchange="handleFilesUploaded()"
                                    multiple>
                </div>
            </p>
        </div>
    </div>
    <div class="bg-white hover:shadow-lg mb-20 mt-5 p-4 rounded shadow w-8/12" style="position: absolute; min-height: 109px;  margin-top: -10px; left: 50%; transform: translateX(-50%);">
        <h4 class="text-2xl text-purple-900"></h4>
        {!! Form::label('contenido', 'Contenido', ['class' =>'block text-gray-700 text-xm font-bold mb-2']) !!}
        {!! Form::textarea('contenido', isset($historia) ? $historia->contenido : null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'contenido']) !!}
    </div>
    <button type="submit" class="bg-blue-900 bottom-0 fixed hover:bg-pink-700 mb-5 mr-1 p-3 right-0 rounded-sm text-white">@isset($historia) Guardar @else Actualizar  @endisset</button>
</div>
{!! Form::close() !!}
@isset($historia)
@foreach ($historia->imagenes as $historia)
<form action="{{ route('imagen.destroy', $historia->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
<img src='{{ url($historia->path)}}'>
@endforeach
@endisset

@endsection

@section('js')
@include('partial.scriptsHistorias')
<script>
    function handleFilesUploaded(){
    var filesCmp = document.getElementById("files_name");
    var label = document.getElementById("files_label");
    label.innerHTML = filesCmp.files.length.toString() + " archivos seleccionados";
}
</script>
@endsection
