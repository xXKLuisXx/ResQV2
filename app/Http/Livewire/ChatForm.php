<?php

namespace App\Http\Livewire;

use App\Mensaje;
use Auth;
use App\Events\enviarMensaje;
use Livewire\Component;

class ChatForm extends Component
{
    public $contenido;
    public $chat_id;

    public function mount(){
        $this->contenido = "";
        $this->chat_id = 0;
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function sendMessage(){
        event(new enviarMensaje($this->contenido, $this->chat_id));
    }
}
