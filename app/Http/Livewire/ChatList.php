<?php

namespace App\Http\Livewire;

use App\Mensaje;
use Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $chatMessages;
    public $chat_id;

    protected $listeners = ["catchMessage"];

    public function mount(){
        $this->chatMessages = [];
    }

    public function catchMessage($message){
        if($this->chat_id == $message['message']['chat_id']){
            array_push($this->chatMessages, $message);
        }
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
