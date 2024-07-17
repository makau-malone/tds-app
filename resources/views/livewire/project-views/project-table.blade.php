                

<div class="">
    @if (session()->has('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
</div>

@if ($projects->count() > 0)
@foreach ($projects as $project)
    <div class="card-app card shadow mb-3">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                <h6 class="m-0"><strong>{{ $project->project_id }} | {{ $project->project_name }}</strong></h6>
                </div>
                <div class="col-md-6">
                

                </div>
                
            </div>
            
        </div>

        <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                
            </div>
            <div class="col-md-2">
                <button class="project-button hover-btn btn-danger mb-2" wire:click="deleteConfirmation({{ $project->project_id }})"><i class="fas fa-trash dd-icon"></i>Delete</button>
                <button class="project-button hover-btn btn-black mb-2" wire:click="editProjects({{ $project->project_id }})"><i class="fas fa-edit dd-icon"></i>Edit</button>
                <button class="project-button hover-btn btn-black mb-2" wire:click="viewProjectDetails({{ $project->project_id }})"><i class="fas fa-eye dd-icon"></i>View</button>
                               
                <div class="dropdown">
                    <button class="project-button hover-btn btn-black dropdown-toggle mb-2" wire:click="newPanoramicImage({{ $project->project_id }}) aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-images dd-icon"></i>New Image</button>
                        <div class="dropdown-menu dropdowns" id="actionMenu">
                            <button class="dropdown-item" data-toggle="modal" data-target="#editProjectImages" wire:click="newPanoramicImage({{ $project->project_id }})">
                            <svg class="dd-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M45.6 32C20.4 32 0 52.4 0 77.6V434.4C0 459.6 20.4 480 45.6 480c5.1 0 10-.8 14.7-2.4C74.6 472.8 177.6 440 320 440s245.4 32.8 259.6 37.6c4.7 1.6 9.7 2.4 14.7 2.4c25.2 0 45.6-20.4 45.6-45.6V77.6C640 52.4 619.6 32 594.4 32c-5 0-10 .8-14.7 2.4C565.4 39.2 462.4 72 320 72S74.6 39.2 60.4 34.4C55.6 32.8 50.7 32 45.6 32zM96 160a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm272 0c7.9 0 15.4 3.9 19.8 10.5L512.3 353c5.4 8 5.6 18.4 .4 26.5s-14.7 12.3-24.2 10.7C442.7 382.4 385.2 376 320 376c-65.6 0-123.4 6.5-169.3 14.4c-9.8 1.7-19.7-2.9-24.7-11.5s-4.3-19.4 1.9-27.2L197.3 265c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l26.4 33.1 87-127.6c4.5-6.6 11.9-10.5 19.8-10.5z"></path>
                            </svg>
                            Panoramic
                            </button>
                            <button class="dropdown-item" wire:click="editProjectImage({{ $project->project_id }})"><i class="fas fa-image dd-icon"></i>Still Image</button>
                        </div>
                </div>
            </div>
            </div>
        </div>

    </div>

@endforeach
@else
<span>
<p colspan="4" style="text-align: center;"><small>No Project Found</small></p>
</span>
@endif
<script>
function setProjectId(projectId) {
    document.getElementById('project_id').value = projectId;
}
</script>
                