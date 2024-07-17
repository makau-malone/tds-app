<div>
    <div class="container-fluid mt-5">

        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h3><strong>Spec. Define</strong></h3>
            </div>
        </div>
        <div class="row w-90 mx-auto">
            <div class="col-md-4"> <!--Start Column 1-->
            @include('livewire.product-views.product-table')
            </div> <!--End Column 1-->

            <div class="col-md-2"> <!--Start Column 2-->
            @include('categories')
            </div> <!--End Column 2-->
        
        </div>
    </div>

@include('livewire.product-views.new-product-modal')
@include('livewire.product-views.edit-product-modal')
@include('livewire.product-views.delete-product-modal')
@include('livewire.product-views.view-product-modal')


    


</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addProductModal').modal('hide');
            $('#editProductModal').modal('hide');
            $('#deleteProductModal').modal('hide');
            $('#addCategoryModal').modal('hide');
            $('#deleteCategoryModal').modal('hide');
        });

        window.addEventListener('show-edit-product-modal', event =>{
            $('#editProductModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteProductModal').modal('show');
        });

        window.addEventListener('show-delete-category-modal', event =>{
            $('#deleteCategoryModal').modal('show');
        });

        window.addEventListener('show-view-product-modal', event =>{
            $('#viewProductModal').modal('show');
        });

        window.addEventListener('show-dropdown-menu', event =>{
            $('#actionMenu').dropdown-menu('show');
        });
    </script>
@endpush
