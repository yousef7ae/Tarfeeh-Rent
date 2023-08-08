<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class UserCreateForm extends Form
{

    #[Rule('required')]
    public $name ;
    #[Rule('required')]
    public $password ;
    #[Rule('required')]
    public $role_id ;
    #[Rule('required')]
    public $status ;
    #[Rule('required|email')]
    public $email ;
    #[Rule('required')]
    public $mobile;


}
