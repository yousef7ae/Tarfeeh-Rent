<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $create_product_id , $edit_product_id , $delete_id;

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

    public function delete()
    {
        Product::find($this->delete_id)->delete();
        $this->dispatch('success', __('Product Deleted Successfully'));
    }

    #[Layout('layouts.Admin.app')]
    public function render()
    {
        $products = Product::query();
        $products = $products->paginate(10);
        return view('livewire.admin.products.products',compact('products'));
    }
}
