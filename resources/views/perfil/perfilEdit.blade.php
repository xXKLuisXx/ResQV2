@extends('layouts.navigation')
@section('title', 'Editar Perfil')

@section('content')

<div class="bg-purple-900 float-left pb-10 pt-10 w-full">
    {!! Form::model($user, ['route' => ['perfil.update', $user->id], 'method' => 'PATCH', 'enctype' => "multipart/form-data"]) !!}
    {!! Form::token() !!}
    <div class="w-full pb-10">
        <div class="w-full overflow-auto">
            <label for="perfil" class="float-left h-40 rounded-full text-center text-white w-32" style="left: 50%; position: relative; margin-left: -64px;">
                <img id="perfil_img" src="{{ url(''.$user->url_perfil != null ? $user->url_perfil : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg" .'') }}" class="float-left h-32 rounded-full w-32">
                Actualizar imagen<br>
            </label>
            <input type="file" name="perfil" id ='perfil' class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
        </div>

        <div class="mt-5 p-4 w-5/12" style="margin: 0 auto;">
            <p class="pt-3 text-black text-center text-white uppercase">
                <div class="flex flex-wrap -mx-3 mb-6">
                    {!! Form::label('name', 'Nombre usuario', ['class' =>'block text-white text-xm font-bold mb-2']) !!}
                    {!! Form::text('name', isset($user) ? $user->name : null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'name', 'required']) !!}

                    <!--{!! Form::label('apodo', 'Pseudonombre', ['class' =>'block text-gray-700 text-xm font-bold mb-2']) !!}
                    {!! Form::text('apodo', isset($user) ? $user->apodo : null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'apodo', 'required']) !!}-->
                </div>
            </p>
        </div>
    </div>
    <div class="bg-white hover:shadow-lg mb-20 mt-5 p-4 rounded shadow w-8/12" style="position: absolute; min-height: 109px;  margin-top: -10px; left: 50%; transform: translateX(-50%);">
        <h4 class="text-2xl text-purple-900"></h4>
        {!! Form::label('biografia', 'Acerca de mí', ['class' =>'block text-gray-700 text-xm font-bold mb-2']) !!}
        {!! Form::textarea('biografia', isset($user) ? $user->biografia : null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'biografia', 'required']) !!}
    </div>
    <button type="submit" class="bg-blue-900 bottom-0 fixed hover:bg-pink-700 mb-5 mr-1 p-3 right-0 rounded-sm text-white">Guardar</button>
    {!! Form::close() !!}
    <a href='{{ url('') }}' class="bg-red-700 bottom-0 fixed hover:bg-pink-700 mb-20 mr-1 p-3 right-0 rounded-sm text-white">Solicitar Verificación</a>
</div>

@endsection

@section('js')
<script>
function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#perfil_img').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#perfil").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
</script>
@endsection
