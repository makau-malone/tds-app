<div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="close hover-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="storeProductData">


                    <div class="row">

                        <div class="col-md-4">

                        <h5>Product Info.</h5>
                            <!--PRODUCT NAME-->

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group row mb-2">
                                    
                                    <div class="col-12">
                                    <label for="product_name" class="col p-0">Product Name</label>
                                        <input type="text" id="product_name" class="form-control" wire:model="product_name">
                                        @error('product_name')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                </div> 
                            </div>

                            <!--PRODUCT NAME-->

                            <!--IDENTITY DATA-->

                            <div class="row"> 
                                <!--LEFT DATA-->
                                <div class="col-md-6">

                                <div class="form-group row mb-2">
                                    
                                    <div class="col-12">
                                    <label for="product_type" class="col p-0">Product Type</label>
                                    <select   class="form-control" id="product_type" wire:model="product_type">
                                        <option value="0">Basic Product</option>
                                        <option value="1">Variable Product</option>
                                       
                                    </select>
                                    </div>

                                </div>

                                <div class="form-group row mb-2">
                                    
                                    <div class="col-12">
                                    <label for="product_id" class="col p-0">Product ID</label>
                                        <input type="text" id="product_id" class="form-control" wire:model="product_id">
                                        @error('product_id')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row mb-2">

                                    <div class="col-12">
                                    <label for="upc" class="col p-0">UPC</label>
                                    <div class="input-group">
                                            <input class="form-control" type="text" id="upc" wire:model="upc">
                                            <button class="barcode-btn hover-btn" data-bs-toggle="tooltip" data-bss-tooltip title="GENERATE BARCODE" type="button"><i class="fas fa-qrcode"></i></button>
                                        </div>
                                        @error('upc')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                </div> 
                                <!--LEFT DATA-->

                                <!--RIGHT DATA-->
                                <div class="col-md-6">

                                <div class="form-group row mb-2">
                                    
                                    <div class="col-12">
                                    <label for="category" class="col p-0">Category</label>
                                    <select   class="form-control" id="category" wire:model="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                
                                <div class="form-group row mb-2">
                                    
                                    <div class="col-12">
                                    <label for="sku" class="col p-0">SKU</label>
                                        <input type="text" id="sku" class="form-control" wire:model="sku">
                                        @error('sku')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="form-group row mb-2">

                                    <div class="col-12">
                                    <label for="ean" class="col p-0">EAN</label>
                                        
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="ean" wire:model="ean">
                                            <button class="barcode-btn hover-btn" data-bs-toggle="tooltip" data-bss-tooltip title="GENERATE BARCODE" type="button"><i class="fas fa-qrcode"></i></button>
                                        </div>
                                        @error('ean')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                </div>
                                <!--RIGHT DATA-->
                            </div>

                            <!--IDENTITY DATA-->

                        </div>
                        
                        <div class="col-md-4">
                        <h5>Product Images</h5>
                            <div class="form-group row mb-2">
                                <div class="col-12">
                                <label for="main_image" class="col p-0">Main Image</label>
                                <input class="form-control file-input" id="main_image" wire:model="main_image" type="file" />
                                @error('main_image')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-12">
                                <label for="image_1" class="col p-0">Image</label>
                                <input class="form-control file-input" id="image_1" wire:model="image_1" type="file" />
                                @error('image_1')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                                <div class="form-group row mb-2">
                                <div class="col-12">
                                <label for="image_2" class="col p-0">Image</label>
                                <input class="form-control file-input" id="image_2" wire:model="image_2" type="file" />
                                @error('image_2')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                                <div class="form-group row mb-2">
                                <div class="col-12">
                                <label for="image_3" class="col p-0">Image</label>
                                <input class="form-control file-input" id="image_3" wire:model="image_3" type="file" />
                                @error('image_3')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                                <div class="form-group row mb-2">
                                <div class="col-12">
                                <label for="image_4" class="col p-0">Image</label>
                                <input class="form-control file-input" id="image_4" wire:model="image_4" type="file" />
                                @error('image_4')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                                <div class="form-group row mb-2">
                                <div class="col-12">
                                <label for="image_5" class="col p-0">Image</label>
                                <input class="form-control file-input" id="image_5" wire:model="image_5" type="file" />
                                @error('image_5')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                               </div>
                            </div>

                        </div>
                        <div class="col-md-4"></div>

                    </div>


                        

                        

                        

                        

                        <div class="form-group row mb-2 mt-3">
                            <label for="" class="col p-0"></label>
                            <div class="col-12">
                                <button type="submit" class="btn-app hover-btn">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>