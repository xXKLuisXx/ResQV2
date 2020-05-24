@isset($historia)
<div class="border-l-4 border-purple-900 hover:border-pink-500 hover:shadow-lg mt-6 mx-auto shadow w-7/12">
    <div class="w-full lg:max-w-full lg:flex h-48 relative">

    <a href="#submenu_{{ $historia->id }}" class="absolute mr-3 mt-2 right-0 top-0" onclick="event.preventDefault(); desplegar('submenu_{{ $historia->id }}');"><i class="fas fa-ellipsis-v"></i></a>
        <div id="submenu_{{ $historia->id }}" class="absolute mr-4 mr-8 mt-2 right-0 submenu_lateral text-right top-0">
            @if($historia->user->id == Auth::user()->id)
            <a class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"
                href="#edit_hist" onclick="event.preventDefault();"><i class="far fa-edit"></i>
            </a>
            <a class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"
                href="#remove_hist" onclick="event.preventDefault();"><i class="fas fa-trash-alt"></i>
            </a>
            @endif
            <a class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"
                href="#ver_hist" onclick="event.preventDefault();"><i class="far fa-eye"></i>
            </a>
        </div>
        <div class="hidden md:hidden lg:block sm:hidden h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
            style="background-image: url('{{ url(''.$historia->imagenes[0]->path.'')}}')" title="Woman holding a mug">
        </div>
        <div class="bg-white border-l flex flex-col justify-between leading-normal lg:border-l lg:border-l-0 p-4 rounded-b w-full">
            <div class="mb-8">
                <p class="flex items-center text-gray-600 text-xs" style="margin-top: -10px; margin-left: -8px;">
                    <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    {{ _($historia->privacidad) }}
                </p>
                <p class="text-gray-600 text-red-600 text-xs" style="margin-top: 1px; margin-left: -8px;"> {{ _($historia->created_at) }} </p>
                <div class="text-gray-900 font-bold text-xl mb-2"> {{ _($historia->titulo) }} </div>
                <p class="text-gray-700 text-base">{{ _($historia->contenido) }}</p>
            </div>
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-4"
                    src="{{ url(''.$historia->user->url_perfil != null ? $historia->user->url_perfil : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg".'') }}"
                    alt="{{ _($historia->user->name) }}">
                <div class="text-sm w-auto">
                    <p class="text-gray-900 leading-none"> {{ _($historia->user->name) }} </p>
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
@endisset
