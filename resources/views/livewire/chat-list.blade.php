<div>
    @foreach ($chatMessages as $message)
    @if ($message['message']['user_id'] == Auth::user()->id)
    <div class="font-sans" style="display:flex; justify-content: flex-end; width:100%; padding:10px">
        <p style="box-shadow: -1px 2px 4px #000000; background: lightblue; max-width: 300px; min-width: 150px; padding: 10px; border-radius: 25px; border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-top-right-radius: 30px; border-bottom-right-radius: 5px;">
            {{ $message['message']['contenido'] }}
        </p>
    </div>
    @else
    <div style="display:flex; justify-content: flex-start; width:100%; padding:10px">
        <p class="font-sans" style="box-shadow: 1px 2px 4px #000000; background: lightgreen; max-width: 300px; min-width: 150px; padding: 10px; border-top-left-radius: 30px; border-bottom-left-radius: 5px; border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
            {{ $message['message']['contenido'] }}
        </p>
    </div>
    @endif
    @endforeach
</div>
