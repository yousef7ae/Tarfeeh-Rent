<?php

namespace App\Livewire\Admin\users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class users extends Component
{


   public /*$users ,*/$create_user , $edit_user , $deleteId;
   public function mount()
   {

   }
    public function CreateUser()
    {
        $this->create_user = rand(1,10000);
    }

    public function EditUser($id)
    {
        $this->edit_user = $id;
    }
    public function delete_id($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $user = User::findOrFail($this->deleteId);
        $user->delete();

        $this->dispatch('success' , 'deleted');
    }
    #[On('refreshModal')]
    public function refreshModal()
    {
        $this->create_user = "";
        $this->edit_user = "";
    }

    public function render()
    {
        $users = User::where('status',1)->get();
        return view('livewire.admin.users.users' , compact('users'))->layout('layouts.Admin.app');
    }


}
