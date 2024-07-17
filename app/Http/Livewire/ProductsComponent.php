<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\Categories;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; // Import the WithFileUploads trait
use Illuminate\Support\Facades\Storage; // Add this line

class ProductsComponent extends Component


{
    use WithFileUploads; // Include the WithFileUploads trait

    public $category_id, $category_name, $category_delete_id;

    public 
    $product_id, 
    $upc, 
    $ean, 
    $sku, 
    $c_39, 
    $product_name, 
    $product_type, 
    $category, 
    $barcode,
    $main_image,
    $image_1,
    $image_2,
    $image_3,
    $image_4,
    $image_5, 
    
    $product_edit_id, 
    $product_delete_id;

    public $view_product_id, $view_product_name, $view_product_ean, $view_product_sku, $view_product_main_image;


    public function barcodeIndex(Request $request)
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $image = $generator->getBarcode('081331723987', $generator::TYPE_CODE_128);
  
        return response($image)->header('Content-type','image/png');
    }

    public function viewDropdownMenu()
    {
        $this->dispatch('show-dropdown-menu');
    }


    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'product_id' => 'required|unique:products,product_id,'.$this->product_edit_id.'', //Validation with ignoring own data
            'product_name' => 'required',
            'sku' => 'required',
            'category' => 'required',
        ]);
    }

    public function storeCategoryData()
    {
        //on form submit validation
        $this->validate([
            'category_id' => 'required|unique:categories', //products = table name
            'category_name' => 'required',
        ]);

        //Add Product Data
        $category = new Categories();
        $category->category_id = $this->category_id;
        $category->category_name = $this->category_name;

        $category->save();

        session()->flash('category-message', 'New Category has been added successfully');

        $this->category_id = '';
        $this->category_name = '';


        //For hide modal after add product success
        $this->dispatch('close-modal');
    }

    public function storeProductData()
    {
        //on form submit validation
        $this->validate([
            'product_id' => 'required|unique:products', //products = table name
            'product_name' => 'required',
            'sku' => 'required',
            'category' => 'required',
            'main_image' => 'required|image|max:2048',
            'image_1' => 'sometimes|image|max:2048',
            'image_2' => 'sometimes|image|max:2048',
            'image_3' => 'sometimes|image|max:2048',
            'image_4' => 'sometimes|image|max:2048',
            'image_5' => 'sometimes|image|max:2048',
        ]);

        //Add Product Data
        $product = new Products();
        $product->product_id = $this->product_id;
        $product->sku = $this->sku;
        $product->upc = $this->upc;
        $product->ean = $this->ean;
        $product->c_39 = $this->c_39;
        $product->product_name = $this->product_name;
        $product->product_type = $this->product_type;
        $product->category = $this->category;


        // Image handling
        $uploadMainImg = $this->main_image->store('product_images', 'public');
        $uploadImg_1 = $this->image_1->store('product_images', 'public');
        $uploadImg_2 = $this->image_2->store('product_images', 'public');
        $uploadImg_3 = $this->image_3->store('product_images', 'public');
        $uploadImg_4 = $this->image_4->store('product_images', 'public');
        $uploadImg_5 = $this->image_5->store('product_images', 'public');
    
        // Save the file object to the database
        $product->main_image = $uploadMainImg;
        $product->image_1 = $uploadImg_1;
        $product->image_2 = $uploadImg_2;
        $product->image_3 = $uploadImg_3;
        $product->image_4 = $uploadImg_4;
        $product->image_5 = $uploadImg_5;
        

        $product->save();

        session()->flash('message', 'New product has been added successfully');

        $this->product_id = '';
        $this->sku = '';
        $this->upc = '';
        $this->ean = '';
        $this->c_39 = '';
        $this->product_name = '';
        $this->product_type = '';
        $this->category = '';
        $this->main_image = '';
        $this->image_1 = '';
        $this->image_2 = '';
        $this->image_3 = '';
        $this->image_4 = '';
        $this->image_5 = '';


        //For hide modal after add product success
        $this->dispatch('close-modal');
    }

    public function resetInputs()
    {
        $this->product_id = '';
        $this->sku = '';
        $this->upc = '';
        $this->ean = '';
        $this->c_39 = '';
        $this->product_name = '';
        $this->product_type = '';
        $this->category = '';
        $this->product_edit_id = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editProducts($id)
    {
        $product = Products::where('id', $id)->first();

        $this->product_edit_id = $product->id;
        $this->product_id = $product->product_id;
        $this->sku = $product->sku;
        $this->upc = $product->upc;
        $this->ean = $product->ean;
        $this->c_39 = $product->c_39;
        $this->product_name = $product->product_name;
        $this->product_type = $product->product_type;
        $this->category = $product->category;
        

        $this->dispatch('show-edit-product-modal');
    }
    
    public function editProductData()
    {
        //on form submit validation
        $this->validate([
            'product_id' => 'required|unique:products,product_id,'.$this->product_edit_id.'', //Validation with ignoring own data
            'product_name' => 'required',
            'sku' => 'required',
            'category' => 'required',
        ]);

        $product = Products::where('id', $this->product_edit_id)->first();
        $product->product_id = $this->product_id;
        $product->sku = $this->sku;
        $product->upc = $this->upc;
        $product->ean = $this->ean;
        $product->c_39 = $this->c_39;
        $product->product_name = $this->product_name;
        $product->product_type = $this->product_type;
        $product->category = $this->category;

        $product->save();

        session()->flash('message', 'Product has been updated successfully');

        //For hide modal after add product success
        $this->dispatch('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->product_delete_id = $id; //product id

        $this->dispatch('show-delete-confirmation-modal');
    }

    public function deleteCategory($id)
    {
        $this->category_delete_id = $id; //product id

        $this->dispatch('show-delete-category-modal');
    }

    public function deleteProductData()
    {
        $product = Products::where('id', $this->product_delete_id)->first();
        $product->delete();

        session()->flash('message', 'Product has been deleted successfully');

        $this->dispatch('close-modal');

        $this->product_delete_id = '';
    }

    public function deleteCategoryData()
    {
        $category = Categories::where('id', $this->category_delete_id)->first();
        $category->delete();

        session()->flash('category-message', 'Category has been deleted successfully');

        $this->dispatch('close-modal');

        $this->category_delete_id = '';
    }

    public function cancel()
    {
        $this->product_delete_id = '';
    }

    public function viewProductDetails($id)
    {
        $product = Products::where('id', $id)->first();

        $this->view_product_id = $product->product_id;
        $this->view_product_sku = $product->email;
        $this->view_product_upc = $product->upc;
        $this->view_product_ean = $product->ean;
        $this->view_product_c_39 = $product->c_39;
        $this->view_product_name = $product->product_name;
        $this->view_product_type = $product->product_type;
        $this->view_product_category = $product->category;
        $this->view_product_main_image = $product->main_image;

        $this->dispatch('show-view-product-modal');
    }

    public function closeViewProductModal()
    {
        $this->view_product_id = '';
        $this->view_product_sku = '';
        $this->view_product_upc = '';
        $this->view_product_ean = '';
        $this->view_product_c_39 = '';
        $this->view_product_name = '';
        $this->view_product_type = '';
        $this->view_product_category = '';
    }

    public function render()
    {
        //Get all products
        $products = Products::all();
        $categories = Categories::all();

        return view('livewire.products-component', [
            'products'=>$products,
            'categories'=>$categories
            
            ])->layout('livewire.layouts.base');
    }
}
