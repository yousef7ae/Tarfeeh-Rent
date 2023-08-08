<?php

namespace App\Livewire\Admin\ServiceCategories;

use App\Models\Country;
use App\Models\ServiceCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateServiceCategory extends Component
{
    use WithFileUploads;

    public $service_category = [] , $imageTemp ;

    public function store()
    {
        $this->validate([
           'service_category.name' => 'required',
            'service_category.description' => '',
            'service_category.image' => '',
        ]);

        if ($this->imageTemp)
        {
            $this->validate([
                'imageTemp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $this->imageTemp->store('service_categories');
            $this->service_category['image'] = 'service_categories/'.$this->imageTemp->hashName();

//            $this->service_category['image'] = $this->imageTemp->store('service_categories');
        }else{
            unset($this->service_category['image']);
        }

        $service_category = ServiceCategory::create($this->service_category);
        $this->dispatch('success');
        $this->service_category = [];

    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        return view('livewire.admin.service-categories.create-service-category');
    }
}
