<?php

namespace App\Http\Livewire\App;

use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Customers extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $item_id;
    public $users;
    public $user;
    public $image;
    public $name;
    public $email;
    public $address;
    public $role;
    public $roles;
    public $enabled;
    public $readOnly = false;
    public $isOpen = false;
    public $isDeleteOpen = false;
    public $search;

    public function render()
    {
        if (!empty($this->search)) {
            //DB::enableQueryLog(); // Enable query log
            $this->users = User::where('name', 'LIKE', "%" . strtolower($this->search) . "%")
                ->get();
            //dd(DB::getQueryLog());
        } else
            $this->users = User::all();

        return view('livewire.app.customers');
    }


    public function resetFields()
    {
        $this->item_id = '';
        $this->user = '';
        $this->name = '';
        $this->enabled = 1;
        $this->role = '';
        $this->email = '';
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

    public function edit($id, $readOnly = false)
    {
        $this->item_id = $id;
        $this->readOnly = $readOnly;
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->roles->pluck('name')[0] ?? '';
        $this->roles = Role::all();
        // dd($this->roles);
        $this->enabled = $this->user->enabled;
        $this->openModal();
    }
    public function view($id)
    {
        $this->edit($id, true);
    }
    public function save()
    {
        //$this->validate();
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'email', 'required', Rule::unique('users')->ignore($this->item_id),
            ],
        ]);
        if ($this->item_id)
            $this->user->Update($data);
        $this->user->roles()->detach();
        $this->user->assignRole($this->role);
        $this->resetFields();
        session()->flash('success', 'User updated successfully.');
        $this->closeModal();
    }

    public function enabled($id)
    {
        $this->enabled = !$this->enabled;
        $user = User::findOrFail($id);
        $user->enabled = !$user->enabled;
        $user->update();
    }
    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->user = User::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        if ($this->item_id == 1) return;
        $user = User::findOrFail($this->item_id);
        $user->delete();
        $this->resetFields();
        $this->closeDeleteModal();
    }
}