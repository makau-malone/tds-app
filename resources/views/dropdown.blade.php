<div class="dropdown">
                                                <button class="btn-app hover-btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Actions</button>
                                                <div class="dropdown-menu" id="actionMenu">
                                                    <a class="dropdown-item" href="#" wire:click="viewProductDetails({{ $product->id }})"><i class="fas fa-eye mr-2"></i>View</a>
                                                    <a class="dropdown-item" href="#" wire:click="editProducts({{ $product->id }})"><i class="fas fa-edit mr-2"></i>Edit</a>
                                                    {!! $product->product_type == 1 ? '<a class="dropdown-item" href="#" wire:click="editVariations({{ $product->id }})"><i class="fas fa-palette mr-2"></i>Variations</a>' : '<p>NoVars</p>' !!}
                                                    <a class="dropdown-item" href="#" wire:click="deleteConfirmation({{ $product->id }})"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                                                </div>
                                            </div>