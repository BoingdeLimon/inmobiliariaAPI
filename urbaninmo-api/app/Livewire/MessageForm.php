<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\MessagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageForm extends Component
{
    public $name = "";
    public $email = "";
    public $phone = "";
    public $message = "";
    public $user_id = "";

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|string|max:255',
        'message' => 'required|string|max:500',
        'user_id' => 'required|exists:users,id'
    ];
    public function mount($user_id = null)
    {
        $this->user_id = $user_id;
    }
    public function submit(MessagesController $messagesController)
    {
        $this->validate();
        $request = new Request([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
            'user_id' => $this->user_id
        ]);
        $messagesController->newMessage($request);
        $this->reset(['name', 'email', 'phone', 'message']);
    }

    public function render()
    {
        return view('livewire.message-form');
    }
}
