<?php

namespace App\Livewire\Admin\Layouts;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('layouts.Admin.sidebar')->layout('layouts.Admin.app');
    }
}
