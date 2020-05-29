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
        label.innerHTML = filesCmp.files.length.toString() + " archivos seleccionados";
    }

    function AddComment(historia_id_temp,user_id_temp,tipo = ""){
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
                if(tipo==""){
                var elem = document.getElementById('commentsSpace_'+historia_id);
                elem.innerHTML += '<div class="bg-indigo-800 text-white rounded-lg mx-2 px-2 my-2"><p>' + json.contenido +'</p></div>';
            } else {
                var elem = document.getElementById('commentsSpace');
                elem.innerHTML += '<div class="w-full my-2" id="coment_'+json.id+ ' "><img src="{{ url(''.Auth::user()->imagen != null ? Auth::user()->imagen->path : "https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg".'') }}" class="border border-purple-500 flex float-right h-8 ml-1 mr-2 mt-1 rounded-full w-8"><p class="bg-white border pl-3 py-2 rounded-l-lg rounded-r-lg text-gray-600">'+json.contenido+'</p></div>';
            }
                //alert(data.success);
            }
        });
    }
</script>
