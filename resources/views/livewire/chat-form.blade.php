<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <label for="contenido">Contenido</label>
        <input type="text" id="contenido" wire:model="contenido">
        {{ $contenido }}

        <button type="button" wire:click="sendMessage">Enviar</button>
    </div>
    <div id="event">
        Prueba
    </div>
</div>

<script>
    window.livewire.on("messageSended", function() {
        console.log("entra a esta funcion");
    });
</script>