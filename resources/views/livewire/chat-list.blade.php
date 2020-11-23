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
</div>
