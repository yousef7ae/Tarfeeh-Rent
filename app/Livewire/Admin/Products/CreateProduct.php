<?php

namespace App\Livewire\Admin\Products;

use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $product = [] ,$imageTemp, $services , $countries , $cities;

    public $product_times = [['time_from' => '', 'time_to' => '', 'product_id' => '']];


    public function mount()
    {
        $this->services = Service::where('status',1)->get();
        $this->countries = Country::where('status',1)->get();
    }

    public function RemoveProductTime($key): void
    {
        unset($this->product_times[$key]);
    }

    public function AddProductTime(): void
    {
        $this->product_times[] = ['time_from' => '', 'time_to' => '', 'product_id' => ''];

//        array_push($this->product_times, ['time_from' => '', 'time_to' => '', 'product_id' => '']);
    }

    public function store()
    {
        $this->validate([]);
    }
    public function getCities()
    {
        if ($this->product['country_id'])
            $this->cities = City::where('country_id' , $this->product['country_id'])->get();
    }
    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
