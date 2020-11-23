<div class="flex">
    <input name="chat_id" type="text" wire:model="chat_id" hidden>
    <input class="mx-2 my-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="contenido" required>
    <div class="mx-2 text-xl self-center">
        <button type="button" class="AddComment" wire:click="sendMessage({{ $chat_id }})"><i class="far fa-paper-plane"></i></button>
    </div>
</div>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('bacefa0530c734dd7b0a', {
        cluster: 'us2',
        forceTLS: true
    });
    
    var channel = pusher.subscribe('chat-channel');
    channel.bind('message-event', function(data) {
        console.log(data);
        window.livewire.emit("catchMessage", data);
    });
</script>
