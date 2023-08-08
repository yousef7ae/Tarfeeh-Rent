<?php

namespace App\Livewire\Admin\Services;

use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportPageComponents\Layout;
use Livewire\WithFileUploads;

class CreateService extends Component
{
    use WithFileUploads;

    public $imageTemp ,$service_categories = [] , $countries = [] , $cities = [] , $service = ['image' => null];

    public function mount()
    {
        $this->service_categories = ServiceCategory::where('status',1)->get();
        $this->countries = Country::where('status',1)->get();
    }

    public function store()
    {
         $this->validate([
             'service.name' => 'required',
             'service.description' => 'nullable',
         ]);

         if ($this->imageTemp)
         {
             $this->validate([
                 'imageTemp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
             $this->imageTemp->store('services');
             $this->service['image'] = 'services/'.$this->imageTemp->hashName();
         }

        Service::create($this->service);
         $this->dispatch('success',__('Service created successfully'));
    }

    public function getCities()
    {
        if ($this->service['country_id'])
            $this->cities = City::where('country_id',$this->service['country_id'])->get();
    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        return view('livewire.admin.services.create-service');
    }
}
