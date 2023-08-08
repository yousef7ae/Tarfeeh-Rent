<?php

namespace App\Livewire\Admin\ServiceCategories;

use App\Models\ServiceCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditServiceCategory extends Component
{
    use WithFileUploads;
    public $service_category , $imageTemp , $service_category_id;

    public function mount($id)
    {
        $this->service_category_id = $id;
        $service_category = ServiceCategory::findOrFail($this->service_category_id);
        $this->service_category = $service_category->toArray();
    }

    public function update()
    {
        if ($this->imageTemp) {
            $this->validate([
                'imageTemp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $this->imageTemp->store('service_categories');
            $this->service_category['image'] = 'service_categories/'.$this->imageTemp->hashName();
        }
        $service_category = ServiceCategory::findOrFail($this->service_category_id);
        $service_category->update($this->service_category);
        $this->dispatch('success');

    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        return view('livewire.admin.service-categories.edit-service-category');
    }
}
