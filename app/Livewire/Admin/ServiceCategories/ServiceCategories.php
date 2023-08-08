<?php

namespace App\Livewire\Admin\ServiceCategories;

use App\Models\ServiceCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ServiceCategories extends Component
{
    use WithPagination;

    public $name , $description , $search , $create_service_category_id;
    public $edit_service_category_id , $deleteId;
    public function mount()
    {

    }

    public function createServiceCategory()
    {
        $this->create_service_category_id = rand(1000, 9999);
    }
    public function editServiceCategory($id)
    {
        $this->edit_service_category_id = $id;
    }

    public function delete_id($id)
    {
        $this->deleteId = $id;
    }
    public function delete()
    {
        $serviceCategory = ServiceCategory::find($this->deleteId);
        $serviceCategory->delete();
        $this->dispatch('success', __('Deleted successfully'));
    }

    #[On('refreshModal')]
    public function refreshModal()
    {
        $this->create_service_category_id = "";
        $this->edit_service_category_id = "";
    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        $service_categories = ServiceCategory::query();
        if ($this->name) {
            $service_categories = $service_categories->where('name', 'LIKE', '%' . $this->name . '%');
        }
        if ($this->description) {
            $service_categories = $service_categories->where('description', 'LIKE', '%' . $this->description . '%');
        }

        $service_categories = $service_categories->take(10)->get();

        return view('livewire.admin.service-categories.service-categories'
            , compact('service_categories'));
    }
}
