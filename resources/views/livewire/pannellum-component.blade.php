<!-- resources/views/livewire/pannellum-component.blade.php -->
<div class="container-fluid">
<div class="row w-90 mt-5 mb-5 mx-auto">
            <div class="col-md-9 text-left">
                <h3><strong>Projects</strong></h3>
            </div>
            <div class="col-md-3 text-right">

            <div class="dropdown float-end">
                <button class="btn-sec-header hover-btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Projects
                </button>
                <div class="dropdown-menu dropdowns projectsDropdown" id="actionMenu">
           
                @if ($projects->count() > 0)
                    @foreach ($projects as $project)
               <a class="project-list-item" href="{{ route('pannellum', ['project_id' => $project->project_id]) }}">{{ $project->project_name }}</a>
                    @endforeach
                @else
           
                    <tr>
                        <td colspan="4" style="text-align: center;"><small>No Project Found</small></td>
                    </tr>
                @endif
                </div>
            </div>

            </div>
            
        </div>
   

    <div class="row"></div> <!--NAV-->

    <div class="row">
        <div class="col-md-4">
            <div class="card-app card shadow p-3">
            <div class="card-body">
            <h5><strong>{{ $load_project_name }}</strong></h5>
            <h6>Description:</h6>
            <p>{{ $load_project_description }}</p>
            </div>
            </div>
        </div>

        <div class="col-md-8">
        <div class="card shadow">
            <div class="panel-card">
            <div id="panorama"></div>
            </div>
            </div>

    </div>
    </div>
    
    @push('scripts')
    <script>
    pannellum.viewer('panorama', {   
        "default": {
            "firstScene": "circle",
            "author": "{{ $load_project_name }}",
            "autoLoad": true,
            "sceneFadeDuration": 500,
            "cssClass": "fw-icon",
            "hotSpotDebug": true
        },
        "scenes": {
            "circle": {
                "title": "Main Gate",
                "hfov": 110,
                "pitch": 7.325220426182349,
                "yaw": -3.55050,
                "type": "equirectangular",
                "panorama": "{{ asset('storage/' . $load_panoramic_1) }}",
                "hotSpots": [
                    {
                        "cssClass": "u-icon",
                        "pitch": 6.028612685060832,
                        "yaw": 53.20928798549011,
                        "type": "scene",
                        "text": "Campus",
                        "sceneId": "campus"
                    }
                ]
            },
            "campus": {
                "title": "Campus",
                "hfov": 110,
                "yaw": -108.7,
                "pitch": 6.7,
                "type": "equirectangular",
                "panorama": "{{ asset('storage/' . $load_panoramic_2) }}",
                "hotSpots": [
                    {
                        "cssClass": "u-icon",
                        "pitch": -1.239320475505008,
                        "yaw": 15.188672607263618,
                        "type": "scene",
                        "text": "Play Ground",
                        "sceneId": "playground"
                    },
                    {
                        "cssClass": "u-icon",
                        "pitch": 7.392106795794303,
                        "yaw": -99.81222158816215,
                        "type": "scene",
                        "text": "Campus Central",
                        "sceneId": "campusCentral"
                    },
                    {
                        "cssClass": "l-icon",
                        "pitch": 5.382802215026905,
                        "yaw": -130.28415194882882,
                        "type": "scene",
                        "text": "Campus Playgrounds",
                        "sceneId": "fbGroundWay"
                    },
                    {
                        "cssClass": "u-icon",
                        "pitch": -6.786970989335789,
                        "yaw": 85.10129618611296,
                        "type": "scene",
                        "text": "Main Gate",
                        "sceneId": "circle"
                    }
                ]
            },
        }
    });
    </script>
    @endpush
</div>
