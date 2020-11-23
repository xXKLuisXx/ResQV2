<?php

namespace App\Http\Livewire;

use App\Mensaje;
use Auth;
//use App\Events\enviarMensaje;
use Livewire\Component;

class ChatForm extends Component
{
    public $contenido;
    public $chat_id;

    public function mount(){
        $this->contenido = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function sendMessage($chat_id){
        $mensaje = new Mensaje();
        $mensaje->content = $this->contenido;
        $mensaje->user_id = Auth::user()->id;
        $mensaje->chat_id = $chat_id;
        $mensaje->save();

        $message = [
            "contenido" => $this->contenido,
            "user_id" => Auth::user()->id,
            "chat_id" => $this->chat_id
        ];
        event(new \App\Events\enviarMensaje($message));
    }
}
