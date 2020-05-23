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
<div class="container mx-auto mt-10">
    <div class="max-w-sm w-full lg:max-w-full lg:flex h-48">
        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
            style="background-image: url('{{$historia->imagenes[0]->path}}')" title="Woman holding a mug">
        </div>
        <div
            class="w-full border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <p class="text-sm text-gray-600 flex items-center">
                    <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    {{ _($historia->privacidad) }}
                </p>
                <div class="text-gray-900 font-bold text-xl mb-2"> Titulo </div>
                <p class="text-gray-700 text-base">{{ _($historia->contenido) }}</p>
            </div>
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-4"
                    src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=448&q=80"
                    alt="Avatar of Jonathan Reinink">
                <div class="text-sm w-1/6">
                    <p class="text-gray-900 leading-none"> {{ _($historia->user->name) }} </p>
                    <p class="text-gray-600"> {{ _($historia->created_at) }} </p>
                </div>
                <div class="w-full text-right">
                    <button class="collapsibleComments" onclick="OpenCommentsBar({{$ActualStory}},{{$historia->id}})"><i
                            class="fas fa-comments"></i></button>
                </div>
            </div>
        </div>
        <div class="w-3/6 contentComments">
            <div id="commentsSpace_{{$historia->id}}" class="overflow-y-scroll h-full">
            </div>
            <div class="w-full">
                <form>
                    <input type="hidden" name="token_{{$historia->id}}" value="{{csrf_token()}}">
                    <div class="flex">
                        <input
                            class="my-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Comentario"
                            id="comentario_id_{{$historia->id}}">
                        <div class="mx-2 text-xl self-center">
                            <button class="AddComment" type="button" onclick="AddComment({{$historia->id}},{{Auth::user()->id}})"><i class="far fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

<button
    class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full buttonBotAdd">
    <i class="fas fa-plus"></i>
</button>

<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div
            class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6 bg-purple-600">
            <form action="" method="POST" action="{{ action('HistoriaController@store') }}"
                enctype="multipart/form-data">
                @csrf
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Historia</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="flex items-center justify-center">

                    <div class="bg-purple-500 text-white font-bold rounded-lg border shadow-lg p-10 w-full">
                        <div class="text-black">
                            <textarea name="historia"
                                class="resize border rounded focus:outline-none focus:shadow-outline w-full"
                                placeholder="Nueva Historia..."></textarea>
                        </div>
                        <div class="flex">
                            <div class="w-full">
                                <label for="files_name" class="flex">
                                    <i class="fas fa-paperclip flex mt-1"> </i>
                                    <p class="flex ml-4" id="files_label">No files selected</p>
                                </label>
                                <input id="files_name" type="file" name="imagenes[]" onchange="handleFilesUploaded()"
                                    multiple>
                            </div>

                            <div class="w-full">
                                <div class="flex right-0" style="direction: rtl">
                                    <div class="relative">
                                        <select
                                            class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="privacidad">
                                            <option selected value="Publico">Publico</option>
                                            <option value="Privado">Privado</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="m-1">
                                        <i class='fas fa-unlock'></i>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    var coll = document.getElementsByClassName("contentComments");
    var i;
    var json;
    function OpenCommentsBar(numberstory,historia_id){
        console.log(numberstory)
        if (coll[numberstory-1].style.display === "grid") {
            coll[numberstory-1].style.display = "none";
            var elem = document.getElementById('commentsSpace_'+historia_id);
            elem.innerHTML = "";
        } else {
            coll[numberstory-1].style.display = "grid";
            $.ajax({
                type:'GET',
                url:"{{ action('ComentarioController@index') }}",
                data:{historia_id:historia_id},
                success:function(data){
                    json = JSON.parse(data);
                    var elem = document.getElementById('commentsSpace_'+historia_id);
                    for (var i = 0; i < json.length; i++) {
                        // Se ejecuta 5 veces, con valores desde paso desde 0 hasta 4.
                        elem.innerHTML += '<div class="bg-indigo-800 text-white rounded-lg mx-2 px-2 my-2"><p>' + json[i].contenido +'</p></div>';
                        //console.log(json[i]);
                    };
                    //alert(json[0]);
                }
            });
        }
    }
    
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

    function handleFilesUploaded(){
        var filesCmp = document.getElementById("files_name");
        var label = document.getElementById("files_label");
        label.innerHTML = filesCmp.files.length.toString() + " Items selected";
    }
    
    function AddComment(historia_id_temp,user_id_temp){
        var contenidoCmp = document.getElementById("comentario_id_"+historia_id_temp);
        var contenido = contenidoCmp.value;
        contenidoCmp.value = "";
        //var contenido = $("input[name=comentario_name_"+historia_id_temp+"]").val();
        var token = $("input[name=token_"+historia_id_temp+"]").val();
        var user_id = user_id_temp;
        var historia_id = historia_id_temp;
        $.ajax({
            type:'POST',
            url:"{{ action('ComentarioController@store') }}",
            data:{comentario:contenido, historia_id:historia_id, user_id:user_id, _token:token},
            success:function(data){
                json = JSON.parse(data);
                var elem = document.getElementById('commentsSpace_'+historia_id);
                elem.innerHTML += '<div class="bg-indigo-800 text-white rounded-lg mx-2 px-2 my-2"><p>' + json.contenido +'</p></div>';
                //alert(data.success);
            }
        });
    }
</script>

@stop