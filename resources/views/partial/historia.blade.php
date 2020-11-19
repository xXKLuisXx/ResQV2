@isset($historia)
<div class="border-l-4 border-purple-900 hover:border-pink-500 hover:shadow-lg mt-6 mx-auto shadow w-7/12">
    <div class="w-full lg:max-w-full lg:flex h-auto sm:h-48 md:h-48 lg:h-48 relative">

    <a href="#submenu_{{ $historia->id }}" class="absolute mr-3 mt-2 right-0 top-0" onclick="event.preventDefault(); desplegar('submenu_{{ $historia->id }}');"><i class="fas fa-ellipsis-v"></i></a>
        <div id="submenu_{{ $historia->id }}" class="absolute mr-4 mr-8 mt-2 right-0 submenu_lateral text-right top-0">
            @if($historia->user->id == Auth::user()->id)
            <a class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"
            href="{{ route('historia.edit', $historia->id) }}"><i class="far fa-edit"></i>
            </a>
            <form action="{{ route('historia.destroy', $historia->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
            <button class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"><i class="fas fa-trash-alt"></i>
            </button>
        </form>
            @endif
            <a class="border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none lg:mt-0 px-4 py-2 rounded text-sm hover:text-white"
            href="{{ url('historia/'.$historia->id) }}"><i class="far fa-eye"></i>
            </a>
        </div>
        <div class="relative hidden md:hidden lg:block sm:hidden h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
            style="background-image: url('{{ url( isset($historia->imagenes[0]) ? $historia->imagenes[0]->path : 'https://lh3.googleusercontent.com/proxy/ZPiQpbQoOV5_fbufxTPB9IxLPe9QNK-sa0uaaZNUs9fCeW2EAFNju0guWqJbY5teab2G9691dGs4QlTcRqWjvax6Cng_s3c' ) }}')"
             title="{{ _($historia->titulo) }}">
            <div class="absolute hidden hover:opacity-100 items-center lg:flex md:hidden mt-2 opacity-50 sm:hidden w-full">
            <a href='{{ url('perfil/'.$historia->user->id.'') }}' class='flex hover:bg-gray-300 items-center pr-3 py-1 rounded-r-full'>
                <img class="h-8 ml-2 mr-1 rounded-full w-8"
                    src="{{ url(''.$historia->user->imagen != null ? $historia->user->imagen->path : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg".'') }}"
                    alt="{{ _($historia->user->name) }}">
                <div id="user_despegable" class="text-sm w-auto">
                    <p class="leading-none text-gray-500 uppercase text-xs"> {{ \Illuminate\Support\Str::limit($historia->user->name, 14, $end='...') }} </p>
                </div>
            </a>
            </div>
        </div>
        <div class="bg-white border-l flex flex-col justify-between leading-normal lg:border-l lg:border-l-0 p-4 rounded-b w-full">
            <div class="mb-8">
                <div class="text-gray-900 font-bold text-xl mb-2 truncate"> {{ \Illuminate\Support\Str::limit(_($historia->titulo)) }} </div>
                <p class="float-left items-center text-gray-600 text-xs w-20" style="margin-top: -10px; margin-left: 0px;">
                    <svg class="fill-current float-left h-3 mr-2 mt-1 overflow-auto text-gray-500 w-3" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    {{ _($historia->privacidad) }}
                </p>
                <p class="float-right items-center text-gray-600 text-red-600 text-xs" style="margin-top: -10px; margin-left: -8px;"> {{ _($historia->created_at) }} </p>
                <div class="w-full mt-4">
                    <p class="text-gray-700 text-base">{{ \Illuminate\Support\Str::limit($historia->contenido, 119, $end='...') }}</p>
                </div>
            </div>
            <div class="flex items-center relative">
                <div class="flex md:flex lg:hidden sm:flex ">
                    <a href='{{ url('perfil/'.$historia->user->id.'') }}' class='flex items-center'>
                    <img class="h-8 mr-2 rounded-full w-8 perfil-min"
                    src="{{ url(''.$historia->user->imagen != null ? $historia->user->imagen->path : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg".'') }}"
                    alt="{{ _($historia->user->name) }}">
                    <div class="text-sm w-auto">
                        <p class="text-gray-500 leading-none text-xs"> {{ _($historia->user->name) }} </p>
                    </div>
                    </a>
                </div>
                <div class="absolute bottom-0 right-0">
                    <button class="collapsibleComments" onclick="OpenCommentsBar({{$ActualStory}},{{$historia->id}})"><i
                            class="fas fa-comments"></i></button>
                </div>
            </div>
        </div>
        <div class="w-3/6 contentComments" style="display: flex; flex-direction: column; padding: 0;">
            <div id="commentsSpace_{{$historia->id}}" class="overflow-y-scroll h-full w-full">
                @foreach ($historia->comentarios as $comentario)
                    <div class="bg-indigo-800 text-white rounded-lg mx-2 px-2 my-2">
                        <p>{{$comentario->contenido }}</p>
                    </div>
                @endforeach
            </div>
            <div class="w-full" style="height: 50px; padding-left: 10pxd">
                <form>
                    <input type="hidden" name="token_{{$historia->id}}" value="{{csrf_token()}}">
                    <div class="flex">
                        <input
                            class="mx-2 my-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
