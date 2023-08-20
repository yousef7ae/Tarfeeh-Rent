<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    public $create_service_id , $edit_service_id , $delete_id , $service_id;

    public function mount()
    {

    }
    public function createService()
    {
        $this->create_service_id = rand(1000,9999);
    }

    public function editService($id)
    {
        $this->edit_service_id = $id;
    }

    public function deleteService($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        $service = Service::find($this->delete_id);
        $service->delete();
        $this->dispatch('success', __('Service deleted successfully'));
    }

    public function Status($id)
    {
        $this->service_id = $id;
    }
    public function active()
    {
        $service = Service::findOrFail($this->service_id);
        $service->status = 1;
        $service->save();
        $this->dispatch('success' , __("Service Active"));
    }

    public function inActive()
    {
        $service = Service::findOrFail($this->service_id);
        $service->status = 0;
        $service->save();
        $this->dispatch('success' , __("Service Active"));
    }


    #[On('refreshModal')]
    public function refreshModal()
    {
        $this->create_service_id = "";
        $this->edit_service_id = "";
    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        $services = Service::query();
        $services = $services->paginate(10);

        return view('livewire.admin.services.services',compact('services'));
    }
}
