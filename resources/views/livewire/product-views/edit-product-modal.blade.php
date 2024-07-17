<div wire:ignore.self class="modal fade" id="editProductModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close hover-btn" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="editProductData">
                        <div class="form-group row mb-2">
                            <label for="product_id" class="col-3">Product ID</label>
                            <div class="col-12">
                                <input type="number" id="product_id" class="form-control" wire:model="product_id">
                                @error('product_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="name" class="col-3">Name</label>
                            <div class="col-12">
                                <input type="text" id="name" class="form-control" wire:model="name">
                                @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-3">Email</label>
                            <div class="col-12">
                                <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="phone" class="col-3">Phone</label>
                            <div class="col-12">
                                <input type="number" id="phone" class="form-control" wire:model="phone">
                                @error('phone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="" class="col-3"></label>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary">Edit Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>