<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatList extends Component
{
    public $chatMessages;

    protected $listeners = ["catchMessage"];

    public function mount(){
        $this->$chatMessages = [];
    }

    public function chatMessage($message){
        $this->chatMessages = $message;
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
