<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ContactForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function save()
    {
        $data = $this->validate(
            [
                'first_name' => 'required|max:255',
                'last_name' => 'nullable|max:255',
                'email' => 'required|email',
                'phone' => 'nullable',
                'subject' => 'required|max:255',
                'message' => 'required'
            ]
        );
        $data['ip_address'] = $this->getUserIpAddr();
        Contact::create($data);
        return Redirect::route('pages.contact')->with('success', 'Greate! your request sent successfully.');
    }

    public function getUserIpAddr()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}