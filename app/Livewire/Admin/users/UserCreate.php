<?php

namespace App\Livewire\Admin\users;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;
use Spatie\Permission\Models\Role;
use App\Livewire\Forms\UserCreateForm;
use Illuminate\Support\Facades\Hash;


class UserCreate extends Component
{
    public $user = [] , $roles = [] ;

//    public UserCreateForm $form;
    public function mount()
    {
        $this->roles = Role::get();
    }
    public function store()
    {
        $this->validate([
            'user.name' => 'required|string',
            'user.email' => 'required|email|unique:users,email',
            'user.mobile' => 'required|numeric',
            'user.status' => 'required|in:0,1,2',
            'user.role_id' => 'required|exists:roles,id',
        ]);

        if ($this->user['password'])
        {
            $this->validate([
                'user.password' => 'required|min:6',
            ]);
            $this->user['password'] = bcrypt($this->user['password']);
        }

        $user = User::create($this->user);

        $user->syncRoles($this->user['role_id']);

        $this->dispatch('success');
        $this->user = [];

//        return $this->redirect(route('admin.users'));
    }


    #[Layout('layouts.Admin.app')]
    public function render()
    {
        return view('livewire.admin.users.user-create');
    }
}
