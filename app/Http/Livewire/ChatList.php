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
        array_push($this->chatMessages, $message);
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
