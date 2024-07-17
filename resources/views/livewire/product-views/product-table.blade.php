<div class="card-app card shadow">
                    <div class="d-flex card-header border border-0 py-4">
                        <h5 class="my-auto" style="float: left;"><strong>All Products</strong></h5>
                        <button class="btn-app hover-btn" style="float: right;" data-toggle="modal" data-target="#addProductModal"><i class="fas fa-plus"></i>New Product</button>
                        
                        
                    </div>
                    <div class="card-body table-responsive">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Prod. Name</th>
                                    <th>Category</th>
                                    <th style="text-align: right;">Actions</th>
                                </tr>
                                
                               
                            </thead>
                            <tbody class="">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                           
                                            <td>{{ $product->category }}</td>
                                            <td style="text-align: right;">
                                            
                                            <div class="dropdown">
                                                <button class="btn-app hover-btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Actions</button>
                                                <div class="dropdown-menu dropdowns" id="actionMenu">
                                                    <button class="dropdown-item" wire:click="viewProductDetails({{ $product->id }})"><i class="fas fa-eye dd-icon"></i>View</button>
                                                    <button class="dropdown-item" wire:click="editProducts({{ $product->id }})"><i class="fas fa-edit dd-icon"></i>Edit</button>
                                                    {!! $product->product_type == 1 ? '<button class="dropdown-item" wire:click="editVariations({{ $product->id }})"><i class="fas fa-palette dd-icon"></i>Variations</button>' : '<button class="dropdown-item" disabled><i class="fas fa-ban dd-icon"></i>No Variations</button>' !!}
                                                    <button class="dropdown-item" wire:click="deleteConfirmation({{ $product->id }})"><i class="fas fa-trash-alt dd-icon"></i>Delete</button>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>No Product Found</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>