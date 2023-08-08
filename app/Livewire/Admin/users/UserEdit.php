<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use function Symfony\Component\String\s;

class UserEdit extends Component
{
    public $roles = [] , $user  , $user_id;
    public function mount($user_id)
    {
        $this->user_id = $user_id;

        $user = User::findOrFail($user_id);
        $this->user = $user->toArray();

//        dd($this->user);

//        $this->user['password'] = $user['password'];

        $this->roles = Role::get();
        $this->user['role_id'] = $user->roles->first()->id;

    }

    public function update()
    {
        $this->validate([
            'user.name' => 'nullable|string',
            'user.email' => 'nullable',
            'user.mobile' => 'nullable|numeric',
            'user.status' => 'nullable|in:0,1,2',
            'user.role_id' => 'nullable|exists:roles,id',
        ]);

        $user = User::findOrFail($this->user_id);

        if (!empty($this->user['password']) and $this->user['password'] != "")
        {
            $this->validate([
                'user.password' => 'required|min:6',
            ]);
            $this->user['password'] = bcrypt($this->user['password']);
        }

        $user->syncRoles($this->user['role_id']);
        $user->update($this->user);

        $this->dispatch('success' , 'added');

//        return $this->redirect(route('admin.users'));

    }
    #[Layout('layouts.Admin.app')]
    public function render()
    {
        return view('livewire.admin.users.user-edit');
    }
}
