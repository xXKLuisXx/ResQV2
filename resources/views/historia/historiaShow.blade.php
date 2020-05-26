@extends('layouts.navigation')

@section('title', $historia->titulo)

@if($historia->user->id == Auth::user()->id)
@section('menu')
<a class="w-full border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none mt-1 px-4 py-2 rounded text-sm hover:text-white"
href="{{ route('historia.edit', $historia->id) }}"><i class="far fa-edit"></i>
</a>
<form action="{{ route('historia.destroy', $historia->id) }}" method="POST" class="border border-transparent hover:text-white inline-block leading-none mt-1 rounded text-sm text-white w-full">
@csrf
@method('DELETE')
<button class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"><i class="fas fa-trash-alt"></i>
</button>
</form>
@endsection
@endif

@section('content')

<div class="bg-purple-900 float-left pb-10 pt-10 w-full">
    <p class="text-2xl text-center text-white">
        {{ $historia->titulo }}
    </p>

    <div class="overflow-auto pb-10 w-full">
        <div class="mt-5 p-4 w-5/12" style="margin: 0 auto;">
            <a href='{{ url('perfil/'.$historia->user->id.'') }}' class='flex float-left items-center mb-3 text-gray-600 text-xs uppercase w-full'>
                <img class="h-6 mr-1 rounded-full w-6 perfil-min"
                src="{{ url(''.$historia->user->url_perfil != null ? $historia->user->url_perfil : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg".'') }}"
                alt="{{ _($historia->user->name) }}">
            <p class="">{{ $historia->user->name}}</p>
            </a>

                <p class="float-left items-center text-gray-600 text-xs w-20">
                    <svg class="fill-current float-left h-3 mr-2 mt-1 overflow-auto text-gray-500 w-3" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    {{ _($historia->privacidad) }}
                </p>
                <p class="float-right items-center text-gray-600 text-red-600 text-xs" > {{ _($historia->created_at) }} </p>
        </div>
    </div>
    <div class="bg-white hover:shadow-lg mt-5 p-4 rounded shadow w-8/12" style="position: absolute; min-height: 109px;  margin-top: -10px; left: 50%; transform: translateX(-50%);">
        <h4 class="text-2xl text-purple-900"></h4>
        {!! Form::label('contenido', 'Contenido', ['class' =>'block text-gray-700 text-xm font-bold mb-2']) !!}
        <p class="appearance-none w-full py-2 px-3 text-gray-700 leading-tight"> {{ $historia->contenido }} </p>
        <div class="w-full bg-gray-300 hover:shadow-md mb-10 mt-10 my-5 overflow-auto px-5 py-6 shadow" style="position: absolute; min-height: 109px; left: 50%; transform: translateX(-50%);">
            <p class="block text-gray-700 text-xm font-bold mb-2">Anexos</p>
        @foreach ($historia->imagenes as $imagenes)
        <div style="height: 300px; max-height: 300px;" class="border border-transparent float-left hover:border-gray-800 rounded">
            <img src='{{ url($imagenes->path)}}' style="width: 300px; max-width: 100%; max-height: 300px;" class="">
        </div>
        @endforeach
        </div>
    </div>
</div>

@endsection

@section('js')
@include('partial/scriptsHistorias')
@endsection
