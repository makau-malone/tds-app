                    <div class="card-app card shadow">
                    <div class="d-flex card-header border border-0 py-4">
                        <h5 class="my-auto" style="float: left;"><strong>Categories</strong></h5>
                        <button class="btn-app hover-btn" style="float: right;" data-toggle="modal" data-target="#addCategoryModal"><i class="fas fa-plus"></i>Add</button>
                    </div>
                    <div class="card-body">
                        @if (session()->has('category-message'))
                            <div class="alert alert-success text-center">{{ session('category-message') }}</div>
                        @endif
                        <div class="card-body table-responsive">
                        <table class="table  table-striped align-middle">
                            <thead>
                                <tr>
                                   
                                    <th>Name</th>
                                   
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                           
                                            <td>{{ $category->category_name }}</td>
                                            
                                            <td style="text-align: center;">
                                            
                                                <button class="btn btn-sm btn-danger" wire:click="deleteCategory({{ $category->id }})"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>No Category Found</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>


                    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="storeCategoryData">
                        <div class="form-group row mb-2">
                            <label for="category_id" class="col-3">Category ID</label>
                            <div class="col-9">
                                <input type="text" id="category_id" class="form-control" wire:model="category_id">
                                @error('category_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="name" class="col-3">Category Name</label>
                            <div class="col-9">
                                <input type="text" id="category_name" class="form-control" wire:model="category_name">
                                @error('category_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn-app hover-btn">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this category data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteCategoryData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>