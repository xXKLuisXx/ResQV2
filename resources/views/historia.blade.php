@extends('layouts.navigation')
@section('title', 'Inicio')
@section('content')
@parent
@php
$ActualStory=0;
@endphp
@foreach ($historias as $historia)
@php
$ActualStory += 1;
@endphp
@include('partial.historia')
@endforeach
@include('partial.modalHistoria')
@endsection

@section('js')
@include('partial.scriptsHistorias')
@endsection
