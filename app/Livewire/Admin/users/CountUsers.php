<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class CountUsers extends Component
{
    public $amount;
    public function mount()
    {
        $this->amount = User::count();

    }
    public function placeholder()
    {
        return <<<'HTML'
        <div>
            Loading...
        </div>
        HTML;
    }


    public function render()
    {
        return view('livewire.admin.users.count-users');
    }
}
