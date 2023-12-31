<?php

namespace App\Livewire\Admin\Products;

use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReservationTime;
use App\Models\ReservationTime;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $product = [] ,$imageTemp, $services , $countries , $cities;

    public $product_times = [['from_time' => '', 'time_expire' => '', 'product_id' => '']];


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
        $this->product_times[] = ['from_time' => '', 'time_expire' => '', 'product_id' => ''];

//        array_push($this->product_times, ['time_from' => '', 'time_to' => '', 'product_id' => '']);
    }

    public function store()
    {

        $this->validate([
            'product.name' => 'required|max:255',
            'product.description' => '',
            // 'product.url_video' => 'required',
            'product.from_date' => 'required',
            'product.date_expire' => 'required',
            'product.address' => 'required|max:2000',
            'product.city_id' => 'required|exists:cities,id',
            'product.country_id' => 'required|exists:countries,id',
            'product_times.*.from_time' => 'required',
            'product_times.*.time_expire' => 'required',
            'product.service_id' => 'required|exists:services,id',
            'product.price1' => 'required|numeric',
            'imageTemp.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048', // 1MB Max
        ]);

        $this->product['user_id'] = auth()->user()->id;

        if (isset($this->product['file'])) {
            $this->validate(['product.file' => 'nullable|max:10240|mimes:pdf']);
            $this->product['file'] = $this->product['file']->store('products/files');
        }else{
            unset($this->product['file']);
        }

        $product = Product::create($this->product);

        foreach ($this->product_times as $key => $product_time) {
            $product_time['product_id'] = $product->id;
            ProductReservationTime::create($product_time);
        }

        if ($this->imageTemp) {
            foreach ($this->imageTemp as $key => $image) {
//                 $image->store('products/' . $product->id);
                $imagepro = new ProductImage();

                $imagepro->image = $image->store('products/' . $product->id);
                $imagepro->product_id = $product->id;
                $imagepro->save();
            }
        } else {
            unset($this->product['image']);
        }

        $this->dispatch('success', __("Added successfully"));
        $this->product = [];
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
