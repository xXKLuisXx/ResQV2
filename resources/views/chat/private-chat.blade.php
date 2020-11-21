@extends('layouts.navigation')
@section('title', 'Chat')

@section('content')
@foreach ($mensajes as $mensaje)
{{ $mensaje}}
@endforeach
@endsection