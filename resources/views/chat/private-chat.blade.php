@extends('layouts.navigation')
@section('title', 'Chat')

@section('content')
<div style="width: 100%; display: flex; justify-content: center; height: 500px;">
    <div style="width: 80%; max-width: 1300px; display: flex; justify-content: center; flex-flow: column; padding:5px">
        <div style="background: lightgray; height:100%; border-radius:15px; padding:5px; display: flex; flex-direction: column;">
            <div style="height: 100%; width: 100%; overflow:auto">
                @foreach ($mensajes as $mensaje)
                @if ($mensaje->user->id == Auth::user()->id)
                <div style="display:flex; justify-content: flex-end; width:100%; padding:2px">
                    <p style="background:lightblue; max-width:300px; min-width:150px; padding:5px; border-radius:25px">
                        {{ $mensaje->content }}
                    </p>
                </div>
                @else
                <div style="display:flex; justify-content: flex-start; width:100%; padding:2px">
                    <p style="background:lightgreen; max-width:300px; min-width:150px; padding:5px; border-radius:25px">
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
