<?php

namespace App\Http\Livewire\App;

use App\Models\Contact;
use App\Models\Status;
use Livewire\Component;

class Contacts extends Component
{
    public $contacts;
    public $contact;
    public $item_id;
    public $readOnly = false;
    public $isDeleteOpen = false;
    public $search;
    public $contact_status = [];
    public $setStatus = true;
    public $status;
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $is_read;
    public $isOpen = false;

    public function render()
    {
        $this->contacts = Contact::all();
        $this->status = Status::all();
        return view('livewire.app.contacts');
    }
    public function fillStatus()
    {
        if ($this->setStatus) {
            foreach ($this->contacts as $contact)
                $this->contact_status[$contact->id] = $contact->status_id;
            $this->setStatus = false;
        }
    }
    public function resetFields()
    {
        $this->item_id = '';
        $this->isDeleteOpen = false;
        $this->contact = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
        $this->is_read = 0;
        $this->readOnly = false;
        $this->isOpen = false;
    }
    public function edit($id, $readOnly = false)
    {
        $this->item_id = $id;
        $this->readOnly = $readOnly;
        $contact = Contact::findOrFail($id);
        $this->contact = $contact;
        $this->name = $contact->first_name . ' ' . $contact->last_name;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        //$this->is_read = $contact->is_read;
        $contact->update(['is_read' => 1]);
        $this->openModal();
    }
    public function view($id)
    {
        $this->edit($id, true);
    }
    public function save()
    {
        $this->validate();
        $name['en'] = $this->name;
        $name['id'] = $this->name_id;
        $data['name'] = $name;
        $data['description_en'] = $this->description_en;
        $data['description_id'] = $this->description_id;
        $data['parent_id'] = $this->parent_id;
        $data['sort'] = $this->sort;
        if ($this->item_id)
            $this->category->Update($data);
        else {
            $category = $this->category->Create($data);
            $this->item_id = $category->id;
        }
    }

    public function updateStatus($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status_id' => $this->contact_status[$id]]);
        return redirect()->route('contacts')->with('success', 'contact status updated successfully.');
    }
    public function enabled($id)
    {
        $this->enabled = !$this->enabled;
        $product = Contact::findOrFail($id);
        $product->enabled = !$product->enabled;
        $product->update();
    }
    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->product = Contact::findOrFail($id);
        $this->openDeleteModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function delete()
    {
        Contact::findOrFail($this->item_id)->delete();
        $this->resetFields();
    }

    public function openDeleteModal()
    {
        $this->isDeleteOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteOpen = false;
    }
}
