<?php

namespace App\Http\Livewire\Customer;

use App\Models\Message;
use App\Models\Order;
use Livewire\Component;

class MyMessages extends Component
{
    public $messages;
    public $subject;
    public $content;
    public $search;
    public $status;
    public $isOpen;
    public function render()
    {
        $user_id = Auth()->id();

        if (!empty($this->search)) {
            $this->messages = Message::where('user_id', $user_id)
                ->where(function ($query) {
                    $query->orWhere('subject', 'LIKE', "%" . strtoupper($this->search) . "%")
                        ->orWhere('message', 'LIKE', "%" . strtoupper($this->search));
                })->orderBy('is_read')->get();
        } else
            $this->messages = Message::where('user_id', $user_id)->orderBy('is_read')->get();

        //dd($this->messages);
        return view('livewire.customer.my-messages');
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function view($id)
    {
        $message = Message::findOrFail($id);
        $this->subject = $message->subject;
        $this->content = $message->message;
        $message->update(['is_read' => 1]);
        $this->openModal();
    }
}