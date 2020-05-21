@extends('layouts.navigation')
@section('title', 'Perfil')

@if($mi_perfil)
@section('menu')
editr perfil
@endsection
@endif

@section('content')

<div class="bg-orange-500 bg-purple-900 float-left pb-10 pt-10 w-full">
    <div class="w-full pb-10">
        <div class="w-full overflow-auto">
            <img src="https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg" class="float-left h-32 rounded-full w-32" style="left: 50%; position: relative; margin-left: -64px;">
        </div>
        <div class="">
            <p class="pt-3 text-black text-center text-white uppercase">
                {{$user->name}}
            </p>
        </div>
    </div>
    <div class="bg-white hover:shadow-lg mt-5 p-4 rounded shadow-md w-8/12 w-8/12 bg-white" style="position: absolute; min-height: 109px;  margin-top: -10px; left: 50%; transform: translateX(-50%);">
        <h4 class="text-2xl text-purple-900">Acerca de mí</h4>
        <p class="text-justify text-purple-600 text-sm">{{$user->biografia}}</p>
    </div>
</div>

@endsection
