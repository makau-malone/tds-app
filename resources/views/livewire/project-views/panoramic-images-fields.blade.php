<div class="row">
    <div class="col-md-6">


    <div class="form-group row mb-2">
    <div class="col-12">
        <label for="project_id" class="col p-0">Project ID</label>
        <input type="text" value="{{ $image_edit_id }}" id="project_id" class="form-control" wire:model="image_edit_id" disabled>
        @error('project_id')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-12">
        <label for="image_title" class="col p-0">Image Title</label>
        <input type="text" id="image_title" class="form-control" wire:model="image_title">
        @error('image_title')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-12">
        <label for="hfov" class="col p-0">Field of View</label>
        <input type="number" id="hfov" step="0.1" min="-360" max="360" class="form-control" wire:model="hfov">
        @error('hfov')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-12">
        <label for="pitch" class="col p-0">Pitch</label>
        <input type="number" step="0.1" min="-360" max="360" id="pitch" class="form-control" wire:model="pitch">
        @error('pitch')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-12">
        <label for="yaw" class="col p-0">Yaw</label>
        <input type="number" step="0.1" min="-360" max="360" id="yaw" class="form-control" wire:model="yaw">
        @error('yaw')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
        @enderror
    </div>
</div>

    </div>


    <div class="col-md-6">

    <div class="form-group row my-3"> <!--|||||||||||||||||-->
        <div class="col-md-12 mx-auto text-center d-flex position-relative">
            <label for="panoramic_image" class="mx-auto custom-file-upload position-relative">
                <i class="fas fa-image d-block"></i>
                Upload Image
            </label>
                <input type="file" id="panoramic_image" class="form-control" wire:model="panoramic_image">
                @error('panoramic_image')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
        </div>
    </div>

    </div>
</div>



                        