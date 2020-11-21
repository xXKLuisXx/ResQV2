@extends('layouts.navigation')
@section('title', 'Chat')

@section('content')
@foreach ($mensajes as $mensaje)
{{ $mensaje }}

<form action="{{action('MensajeController@store')}}" method="POST">
    @csrf
    <input name="text" type="text">
    <input name="chat_id" type="text" value="{{ $chat_id }}" hidden>
    <input name="user_id" type="text" value="{{ Auth::user()->id }}" hidden>
    <button type="submit">Enviar</button>
</form>
@endforeach
@endsection