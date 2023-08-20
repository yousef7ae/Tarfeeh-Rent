<?php

namespace App\Livewire\Admin\Reservations;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\Features\SupportPageComponents\Layout;
use Livewire\WithPagination;

class Reservations extends Component
{
    use WithPagination;


    #[Layout('layouts.Admin.app')]
    public function render()
    {
        $reservations = Reservation::query();

        $reservations = $reservations->paginate(10);
        return view('livewire.admin.reservations.reservations',compact('reservations'));
    }
}
