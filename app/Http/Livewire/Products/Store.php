<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product as Products;

class Store extends Component
{
    public function render()
    {
        return view('livewire.create');
    }


    public  $products, 
            $name, 
            $description, 
            $price, 
            $productId, 
            $updateProduct = false, 
            $addProduct = false;

 
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric'
    ];
 
    /**
     * 
     * @return void
     */
    public function resetFields(){
        $this->name = '';
        $this->description = '';
        $this->price = '';
    }

    /**
     *
     * @return void
     */
    public function addProduct()
    {
        $this->resetFields();
        $this->addProduct = true;
        $this->updateProduct = false;
    }
     /**
      * 
      * @return void
      */
    public function storeProduct()
    {
        $this->validate();
        try {
            Products::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
            ]);
            session()->flash('success','Product Created Successfully.');
            $this->resetFields();
            $this->addProduct = false;
            return redirect()->route('products');
        } catch (\Exception $ex) {
            session()->flash('error','Something went wrong.');
        }
    }

}
