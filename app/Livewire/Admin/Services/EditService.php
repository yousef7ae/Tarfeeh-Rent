<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditService extends Component
{
    public $service , $service_categories , $imageTemp;

    public function mount($id)
    {
        $this->service_categories = ServiceCategory::where('status',1)->get();
        $service = Service::findOrFail($id);
        $this->service = $service->toArray();
    }

    public function update()
    {
        $service = Service::find($this->service['id']);
        $service->update($this->service);
        $this->dispatch('success', __('Service updated successfully'));
    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        return view('livewire.admin.services.edit-service');
    }
}
