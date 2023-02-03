<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;

class Product extends Component
{
    public  $products, 
            $name, 
            $description, 
            $price, 
            $productId, 
            $updateProduct = false, 
            $addProduct = false;


    protected $listeners = [
        'deleteProductListener' => 'deleteProduct'
    ];
 
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required'
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

    public function render()
    {
        $this->products = Products::select('id', 'name', 'description', 'price')->get();
        return view('livewire.product')->layout('layouts.app');
    }
 
    /**
     * 
     * @param mixed $id
     * @return void
     */
    public function editProduct($id){
        try {
            $product = Products::findOrFail($id);
            if( !$product) {
                session()->flash('error','Product not found');
            } else {
                $this->name = $product->name;
                $this->description = $product->description;
                $this->price = $product->price;
                $this->productId = $product->id;
                $this->updateProduct = true;
                $this->addProduct = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something went wrong.');
        }
 
    }
 
    /**
     * 
     * @return void
     */
    public function updateProduct()
    {
        $this->validate();
        try {
            Products::whereId($this->productId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price
            ]);
            session()->flash('success','Product Updated Successfully.');
            $this->resetFields();
            $this->updateProduct = false;
            return redirect()->back();
        } catch (\Exception $ex) {
            session()->flash('success','Something went wrong.');
        }
    }
 
    /**
     * 
     * @return void
     */
    public function cancelProduct()
    {
        $this->addProduct = false;
        $this->updateProduct = false;
        $this->resetFields();
    }
 
    /**
     * 
     * @param mixed $id
     * @return void
     */
    public function deleteProduct($id)
    {
        try{
            Products::find($id)->delete();
            session()->flash('success',"Product Deleted Successfully.");
        }catch(\Exception $e){
            session()->flash('error',"Something went wrong.");
        }
    }
}
