<div wire:ignore.self class="modal fade" id="addProjectModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Project</h5>
                    <button type="button" class="close hover-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="storeProjectData">

                                
                                <div class="form-group row mb-2">
                
                                    <div class="col-12">
                                    <label for="project_name" class="col p-0">Project Name</label>
                                        <input type="text" id="project_name" class="form-control" wire:model="project_name">
                                        @error('project_name')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </div>

       
                                <div class="form-group row mb-2">
                                <div class="col-6">
                                    <label for="project_id" class="col p-0">Project No.</label>
                                        <input type="text" id="project_id" class="form-control" wire:model="project_id">
                                        @error('project_id')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                     
                                    <div class="col-6">
                                    <label for="client_name" class="col p-0">Client Name</label>
                                        <input type="text" id="client_name" class="form-control" wire:model="client_name">
                                        @error('client_name')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row mb-2">
                                    
                                    <div class="col-6">
                                    <label for="category" class="col p-0">Category</label>
                                    <select   class="form-control" id="category" wire:model="project_category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                               
                                    
                                    <div class="col-6">
                                    <label for="project_type" class="col p-0">Project Type</label>
                                    <select   class="form-control" id="project_type" wire:model="project_type">
                                        <option value="0">Basic Project</option>
                                        <option value="1">Variable Project</option>
                                       
                                    </select>
                                    </div>

                                </div>
                           
                          
                            <div class="form-group row mb-2">
                                    
                                    <div class="col-12">
                                    <label for="description" class="col p-0">Description</label>
                                        <textarea placeholder="Max 1500 Characters" type="text" id="sku" class="form-control" wire:model="description"></textarea>
                                        @error('description')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                           

                   
                        

                        <div class="form-group row mb-2 mt-3">
                            <label for="" class="col p-0"></label>
                            <div class="col-12">
                                <button type="submit" class="btn-app hover-btn">Update Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>