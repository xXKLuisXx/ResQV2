@extends('layouts.navigation')
@section('title', 'Chat')

@section('content')
<div style="width: 100%; height: 50px; display: flex; position: relative; justify-content: space-around;margin-top: 5px; margin-bottom: 5px;">
    @foreach ($psicologos as $psicologo)
    <div style="width: 50px; height: 100%">
        <a href="{{ route('perfil', ['user' => $psicologo->id])}}">
            <div style="border-width: 2px; border-color: yellowgreen;border-radius: 50%; background-size: cover; background-position: center; width: 100%; height: 100%; background-image: url(
                @if (isset($psicologo->imagen))
                {{ url($psicologo->imagen->path) }}
                @else 
                {{ _("https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg") }}
                @endif)">
            </div>
        </a>
    </div>
    @endforeach
</div>
<br>

@foreach ($chats as $chat)
<div style="width: 100%; display:flex; justify-content: center; margin-top: 5px; margin-bottom: 5px; padding-top: 5px; padding-bottom: 5px; background: lightgray">
    <div style="width: 100%; display: flex; max-width: 1000px">
		<div style="width: 80px">
			<div style="width: 50px; height: 50px">
				<div style="width: 50px; height: 100%">
					<a href="{{ route('perfil', ['user' => $chat->id])}}">
						<div style="border-width: 2px; border-color: yellowgreen;border-radius: 50%; background-size: cover; background-position: center; width: 100%; height: 100%; background-image: url(
							@if (isset($chat->users->where('id', '!=', Auth::user()->id )->first()->imagen))
							{{ url($chat->users->where('id', '!=', Auth::user()->id )->first()->imagen->path) }}
							@else 
							{{ _("https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg") }}
							@endif)">
						</div>
					</a>
				</div>
			</div>
		</div>
		<div style="width: 100%">
			<dt class="text-lg leading-6 font-medium text-gray-900">
				{{ $chat->users->where('id', '!=', Auth::user()->id )->first()->name }}
			</dt>
			<dd class="mt-2 text-base text-gray-500">
				@if (isset($chat->mensajes->last()->content))
				{{ $chat->mensajes->last()->content}}	
				@endif
			</dd>
		</div>
		<div style="display: flex">
			<div class="inline-flex rounded-md shadow">
				<a href="{{route('chat.show', ['chat' => $chat->id])}}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
				  Abrir
				</a>
			</div>
		</div>
    </div>
</div>
@endforeach
@endsection