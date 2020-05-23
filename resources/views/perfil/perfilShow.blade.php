@extends('layouts.navigation')
@section('title', 'Perfil')

@if($mi_perfil)
@section('menu')
<a href='{{ url('perfil/'.$user->id.'/edit') }}' class="w-full border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 mt-4 px-4 py-2 rounded text-sm hover:text-white"><i class="fas fa-edit"></i></a>
@endsection
@endif

@section('content')

<div class="bg-orange-500 bg-purple-900 float-left pb-10 pt-10 w-full">
    <div class="w-full pb-10">
        <div class="w-full overflow-auto">
            <img src="{{ $user->perfil != null ? $user->perfil : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg" }}" class="float-left h-32 rounded-full w-32" style="left: 50%; position: relative; margin-left: -64px;">
        </div>
        <div id="evaluacion">
            <p class="pt-3 text-black text-center text-white uppercase">
                {{$user->name}}
            </p>
            <p class="text-white text-xs pt-2">Reputación</p>
            <p class="clasificacion cancel">
                <input id="radio5" type="radio" name="estrellas" value="5" disabled>
                <label for="radio5">★</label>
                <input id="radio4" type="radio" name="estrellas" value="4" disabled>
                <label for="radio4">★</label>
                <input id="radio3" type="radio" name="estrellas" value="3" disabled>
                <label for="radio3">★</label>
                <input id="radio2" type="radio" name="estrellas" value="2" disabled>
                <label for="radio2">★</label>
                <input id="radio1" type="radio" name="estrellas" value="1" disabled>
                <label for="radio1">★</label>
            </p>
        </div>
    </div>
    <div class="bg-white hover:shadow-lg mt-5 p-4 rounded shadow w-8/12 w-8/12 bg-white" style="position: absolute; min-height: 109px;  margin-top: -10px; left: 50%; transform: translateX(-50%);">
        <h4 class="text-2xl text-purple-900">Acerca de mí</h4>
        <p class="text-justify text-purple-600 text-sm">{{$user->biografia}}</p>
        @if($mi_perfil)
        <a href="#submenu" class="absolute mr-3 mt-5 right-0 top-0" onclick="event.preventDefault(); desplegar('submenu');"><i class="fas fa-ellipsis-v"></i></a>
        <div id="submenu" class="absolute mr-8 mt-4 right-0 text-right top-0">
            <a class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 mt-4 px-4 py-2 rounded text-sm hover:text-white"
                href="#edit_bio" onclick="event.preventDefault(); edit_bio();"><i class="far fa-edit"></i>
            </a>
        </div>
        @endif
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        document.getElementById('radio'+Math.ceil({{ $rating['calificacion'] }})).checked = true;
    });
</script>
@endsection
