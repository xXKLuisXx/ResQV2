@extends('layouts.navigation')
@section('title', 'Chat')

@section('content')
<div style="width: 100%; height: 50px; display: flex; position: relative; justify-content: space-around;margin-top: 5px; margin-bottom: 5px;">
    @for ($i = 0; $i < 10; $i++)
    <div style="width: 50px; height: 100%">
        <div style="border-radius: 50%; background: gray; width: 100%; height: 100%;">
            <a href="">
                <img src="" alt="">
            </a>
        </div>
    </div>
    @endfor
</div>
<br>
@for ($i = 0; $i < 10; $i++)
<div style="width: 100%; display:flex; justify-content: center; margin-top: 5px; margin-bottom: 5px; padding-top: 5px; padding-bottom: 5px; background: lightgray">
    <div style="width: 100%; height: 50px; display: flex; max-width: 1000px">
        <div style="width: 100px">
            <div style="width: 50px; height: 100%">
                <div style="border-radius: 50%; background: gray; width: 100%; height: 100%;">
                    <a href="">
                        <img src="" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div style="width: 100%; display: flex">
            <div style="width: 100%">
                <div>Nombre</div>
                <div>Ultimo mensaje</div>
            </div>
            <div style="width: 15%;">
                <button style="width: 100%; height:100%; background: beige; border-radius: 25px; align-items: center; display: flex; justify-content: center;">Abrir</button>
            </div>
        </div>
    </div>
</div>
@endfor

@endsection