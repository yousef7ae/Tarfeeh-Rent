<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $create_product_id , $edit_product_id , $delete_id , $product_id;

    public function createProduct()
    {
        $this->create_product_id = rand(1000,9999);
    }
    public function editProduct($id)
    {
        $this->edit_product_id = $id;
    }

    public function deleteProduct($id)
    {
        $this->delete_id = $id;
    }

    public function Status($id)
    {
        $this->product_id = $id;
    }
    public function active()
    {
        $product = Product::findOrFail($this->product_id);
        $product->status = 1;
        $product->save();
        $this->dispatch('success' , __("Product Active"));
    }

    public function inActive()
    {
        $product = Product::findOrFail($this->product_id);
        $product->status = 0;
        $product->save();
        $this->dispatch('success' , __("Product InActive"));
    }

    public function delete()
    {
        $product = Product::find($this->delete_id);
        $product->delete();
        $this->delete_id = "";
        $this->dispatch('success' , __("Product Deleted"));
    }

    #[On('refreshModal')]
    public function refreshModal()
    {
        $this->create_product_id = "";
        $this->edit_product_id = "";
    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        $products = Product::query();
        $products = $products->paginate(10);
        return view('livewire.admin.products.products',compact('products'));
    }
}
