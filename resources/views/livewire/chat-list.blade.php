<div>
    @foreach ($chatMessages as $message)
    @if ($message['message']['user_id'] == Auth::user()->id)
    <div style="display:flex; justify-content: flex-end; width:100%; padding:2px">
        <p style="background:lightblue; max-width:300px; min-width:150px; padding:5px; border-radius:25px">
            {{ $message['message']['contenido'] }}
        </p>
    </div>
    @else
    <div style="display:flex; justify-content: flex-start; width:100%; padding:2px">
        <p style="background:lightgreen; max-width:300px; min-width:150px; padding:5px; border-radius:25px">
            {{ $message['message']['contenido'] }}
        </p>
    </div>
    @endif
    @endforeach

    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('bacefa0530c734dd7b0a', {
            cluster: 'us2',
            forceTLS: true
        });
        var channel = pusher.subscribe('chat-channel');

        channel.bind('message-event', function(data) {
            console.log(data);
            window.livewire.emit("catchMessage", data)
        });
    </script>
</div>
