<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email , $password;

    public function mount()
    {
        if (request()->route()->getName() == "admin.logout")
        {
            auth()->logout();
            redirect()->route('admin.home');
        }
    }
    public function login()
    {

//       $this->validate([
//           'email' => 'required|email|exists:'.User::class.',email',
//           'password'=> 'required'
//        ]);

        $user = User::where('email',$this->email)->first();
        auth()->login($user);
        return redirect()->route('admin.home');
//        if (Hash::check($this->password , $user->password))
//        {
//            if ($user->status != 1)
//            {
//                $this->addError('error','This Account Not Active');
//            }else{
//                auth()->login($user);
//
//             return redirect()->route('admin.home');
//            }
//
//        }else{
//            $this->addError('error','Password Not Active');
//        }
    }

    public function logout()
    {
        Auth::logout();
    }
    public function render()
    {
        return view('livewire.admin.login')->layout('layouts.Admin.app');
    }
}
