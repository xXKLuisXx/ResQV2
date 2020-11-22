<div>
    Hola mundo
    {{-- 
    @foreach ($chatMessages as $message)
    <div>

    </div>    
    @endforeach
    --}}
    
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('bacefa0530c734dd7b0a', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('chat-channel');

        channel.bind('message-event', function(data) {
            console.log("Mensaje recibido")
        });
    </script>
</div>
