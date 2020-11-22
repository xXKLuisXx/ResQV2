<?php

namespace App\Http\Livewire;

use App\Mensaje;
use Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $chatMessages;

    protected $listeners = ["catchMessage"];

    public function mount(){
        $this->chatMessages = [];
    }

    public function catchMessage($message){
        $mensaje = new Mensaje();
        $mensaje->content = $message['contenido'];
        $mensaje->user_id = Auth::user()->id;
        $mensaje->chat_id = $message['chat_id'];
        $mensaje->save();
        array_push($this->chatMessages, $mensaje);
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
