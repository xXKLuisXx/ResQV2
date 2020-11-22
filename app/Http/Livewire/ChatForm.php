<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{
    public $contenido;

    public function mount(){
        $this->contenido = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function sendMessage(){
        $this->emit("messageSended");
    }
}
