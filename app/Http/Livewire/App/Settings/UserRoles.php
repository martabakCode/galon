<?php

namespace App\Http\Livewire\App\Settings;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRoles extends Component
{
    public $item_id;
    public $roles;
    public $role;
    public $name;
    public $readOnly = false;
    public $isOpen = false;
    public $isDeleteOpen = false;

    protected $rules = [
        'name' => 'required',
    ];

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.app.settings.user-roles');
    }



    public function resetFields()
    {
        $this->item_id = '';
        $this->role = '';
        $this->name = '';
        $this->readOnly = false;
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openDeleteModal()
    {
        $this->isDeleteOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteOpen = false;
    }

    public function create()
    {
        $this->resetFields();
        $this->role = new Role;
        $this->openModal();
    }
    public function edit($id, $readOnly = false)
    {
        $this->item_id = $id;
        $this->readOnly = $readOnly;
        $role = Role::findOrFail($id);
        $this->role = $role;
        $this->name = $role->name;
        $this->openModal();
    }
    public function view($id)
    {
        $this->edit($id, true);
    }
    public function save()
    {
        $this->validate();

        if ($this->item_id)
            $this->role->Update(['name' => $this->name]);
        else {
            $role = Role::Create(['name' => $this->name]);
            $this->item_id = $role->id;
        }

        $this->resetFields();
        session()->flash('success', 'role updated successfully.');
        $this->closeModal();
    }

    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->role = Role::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        $role = Role::findOrFail($this->item_id);
        $role->delete();
        $this->resetFields();
        $this->closeDeleteModal();
    }
}