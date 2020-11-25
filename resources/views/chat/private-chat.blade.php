@extends('layouts.navigation')
@section('title', 'Chat')

@section('content')
<div style="width: 100%; display: flex; justify-content: center; height: 500px;">
    <div style="width: 80%; max-width: 1300px; display: flex; justify-content: center; flex-flow: column; padding:5px">
        <div style="display:flex; padding: 5px">
            <div style="border-width: 2px; border-color: yellowgreen;border-radius: 50%; background-size: cover; background-position: center; width: 50px; height: 50px; background-image: url(
                @if (isset(\App\Chat::find($chat_id)->users->where('id', '!=', Auth::user()->id )->first()->imagen))
                {{ url(\App\Chat::find($chat_id)->users->where('id', '!=', Auth::user()->id )->first()->imagen->path) }}
                @else 
                {{ _("https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg") }}
                @endif)">
            </div>
            <div style="width: 100%; padding-left: 10px; display: flex; align-items: center;">
                {{ \App\Chat::find($chat_id)->users->where('id', '!=', Auth::user()->id )->first()->name }}
            </div>
        </div>
        <div style="box-shadow: 1px 1px 5px black; background: lightgray; height:100%; border-radius:15px; padding:5px; display: flex; flex-direction: column;">
            <div style="height: 100%; width: 100%; overflow:auto">
                @foreach ($mensajes as $mensaje)
                @if ($mensaje->user->id == Auth::user()->id)
                <div class="font-sans" style="display:flex; justify-content: flex-end; width:100%; padding:10px">
                    <p style="box-shadow: -1px 2px 4px #000000; background: lightblue; max-width: 300px; min-width: 150px; padding: 10px; border-radius: 25px; border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-top-right-radius: 30px; border-bottom-right-radius: 5px;">
                        {{ $mensaje->content }}
                    </p>
                </div>
                @else
                <div class="font-sans" style="display:flex; justify-content: flex-start; width:100%; padding:10px">
                    <p style="box-shadow: 1px 2px 4px #000000; background: lightgreen; max-width: 300px; min-width: 150px; padding: 10px; border-top-left-radius: 30px; border-bottom-left-radius: 5px; border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                        {{ $mensaje->content }}
                    </p>
                </div>
                @endif
                @endforeach
                @livewire('chat-list', ['chat_id' => $chat_id])
            </div>
            <div style="padding: 5px; width: 100%;">
                @livewire('chat-form', ['chat_id' => $chat_id])
            </div>
        </div>
    </div>
</div>
@endsection
