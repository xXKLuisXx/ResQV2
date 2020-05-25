
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
        <div class="bg-purple-900 modal-content px-6 py-4 text-left text-white">
            <form method="POST" action="{{ action('HistoriaController@store') }}" enctype="multipart/form-data">
                @csrf
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Historia</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="flex items-center justify-center">

                    <div class="border-t font-bold p-10 text-white w-full">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <label for="titulo" class="block text-white text-xm font-bold mb-2">Titulo</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" name="titulo" type="text">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <label for="contenido" class="block text-white text-xm font-bold mb-2">Contenido</label>
                            <textarea name="contenido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contenido" type="text"></textarea>
                        </div>
                        <div class="flex">
                            <div class="w-full">
                                <label class="block font-bold mb-2 right-0 text-left text-white text-xm">Archivos anexados</label>
                                <label for="files_name" class="bg-pink-700 flex px-2 py-1 rounded text-white  border border-transparent hover:border-white">
                                    <i class="fas fa-paperclip flex mt-1"> </i>
                                    <p class="flex ml-4" id="files_label">Sin archivos seleccionados</p>
                                </label>
                                <input id="files_name" type="file" name="imagenes[]" onchange="handleFilesUploaded()"
                                    multiple>
                            </div>

                            <div class="w-full">
                                <label for="privacidad" class="block font-bold mb-2 right-0 text-right text-white text-xm">Privacidad</label>
                                <div class="flex right-0" style="direction: rtl">
                                    <div class="relative">
                                        <select
                                            class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="privacidad" id="privacidad">
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
                        class="bg-blue-500 bg-pink-700 border border-transparent font-bold hover:border-white px-4 py-2 rounded text-white">
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
