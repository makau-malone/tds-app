<div>
<!--WIRE LOADING-->    
<div wire:loading class="position-fixed" style="z-index:5000;">
<div class="d-flex loading-div modal"><i class="fas fa-circle-notch m-auto text-white animate-spin"></i></div>
</div>
<!--WIRE LOADING--> 

    <div class="container-fluid mt-5">

        <div class="row w-90 mb-5 mx-auto">
            <div class="col-md-9 text-left">
                <h3><strong>Projects</strong></h3>
            </div>
            
            <div class="col-md-3 text-right">
            <button  class="btn-app hover-btn" style="float: right;" data-toggle="modal" data-target="#addProjectModal" wire:click="generateProjectId()"><i class="fas fa-plus"></i>New Project</button>
            </div>
        </div>
        <div class="row w-90 mx-auto">
            <div class="col-md-9"> <!--Start Column 1-->
            @include('livewire.project-views.project-table')
            </div> <!--End Column 1-->

           

            <div class="col-md-3"> <!--Start Column 2-->
            <!--PROJECT DETAILS-->
            @include('livewire.project-views.project-details')
            </div> <!--End Column 2-->
        
        </div>
    </div>

@include('livewire.project-views.project-images-modal')
@include('livewire.project-views.new-project-modal')
@include('livewire.project-views.edit-project-modal')
@include('livewire.project-views.delete-project-modal')
@include('livewire.project-views.view-project-modal')


    


</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addProjectModal').modal('hide');
            $('#editProjectModal').modal('hide');
            $('#deleteProjectModal').modal('hide');
            $('#addCategoryModal').modal('hide');
            $('#deleteCategoryModal').modal('hide');
            $('#editProjectImages').modal('hide');
        });

        window.addEventListener('show-edit-project-modal', event =>{
            $('#editProjectModal').modal('show');
        });

        window.addEventListener('show-edit-images-modal', event =>{
            $('#editProjectImages').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteProjectModal').modal('show');
        });

        window.addEventListener('show-delete-category-modal', event =>{
            $('#deleteCategoryModal').modal('show');
        });

        window.addEventListener('show-view-project-modal', event =>{
            $('#viewProjectModal').modal('show');
        });

      
    </script>
@endpush
