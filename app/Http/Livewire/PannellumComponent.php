<?php

namespace App\Http\Livewire;
use App\Models\Projects;
use App\Models\Panoramic;
use App\Models\Hotspots;
use App\Models\Products;
use App\Models\Categories;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; // Import the WithFileUploads trait
use Illuminate\Support\Facades\Storage; // Add this line


class PannellumComponent extends Component


{
    use WithFileUploads; // Include the WithFileUploads trait

    public $panoramic_image, $image_title, $hfov, $pitch, $yaw, $type,
    $hs_type, $hs_yaw, $hs_pitch, $hs_text, $sourceScene, $targetScene,  $image_edit_id, $image_delete_id;

    public 
    $project_id,  
    $project_name, 
    $project_type, 
    $project_category, 
    $client_name,
    $description,
   
    
    $project_edit_id, 
    $project_delete_id;

    public $panoramicImageUrl;

    public $view_project_id, $view_project_name, $view_project_type, $view_project_client_name, $view_project_category,
    $load_project_id, $load_project_name, $load_project_type, $load_project_client_name, $load_project_description, $load_project_category,
    $load_panoramic_1, $load_panoramic_2;


    


    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'project_id' => 'required|unique:projects,project_id,'.$this->project_edit_id.'', //Validation with ignoring own data
            'project_name' => 'required',
           
        ]);
    }

    //mount inventory new inventory ID (current_inventory +1)
    public function generateProjectId()
    {
        $this->resetInputs();
        //$prefix = 'PR'; // Your desired prefix
        $randomNumber = mt_rand(10000, 99999); // Random number between 10000 and 99999
        // $date = now()->format('dmY'); // Current date in ddmmyyyy format
        $this->project_id = "$randomNumber";
    }

    public function storeProjectData()
    {
        //on form submit validation
        $this->validate([
            'project_id' => 'required|unique:projects', //projects = table name
            'project_name' => 'required',
            
        ]);

        //Add Project Data
        $project = new Projects();
        $project->project_id = $this->project_id;
        $project->project_name = $this->project_name;
        $project->project_type = $this->project_type;
        $project->project_category = $this->project_category;
        $project->description = $this->description;
        $project->client_name = $this->client_name;

        $project->save();

        $projectImage = new ProjectImages();
        $projectImage->project_id = $this->project_id;

        $projectImage->save();

        session()->flash('message', 'New project has been added successfully');

        $this->project_id = '';
        $this->project_name = '';
        $this->project_type = '';
        $this->project_category = '';
        $this->description = '';
        $this->client_name = '';


        //For hide modal after add project success
        $this->dispatch('close-modal');
    }

    

    public function editProjectImages($project_id)
    {
        //Edit Project Images
        $projectImage = ProjectImages::where('project_id', $project_id)->first();
        
        $this->image_edit_id = $projectImage->project_id;
        $this->panoramic_1 = $projectImage->panoramic_1;
        $this->panoramic_2 = $projectImage->panoramic_2;
        $this->panoramic_3 = $projectImage->panoramic_3;
        $this->panoramic_4 = $projectImage->panoramic_4;
        $this->panoramic_5 = $projectImage->panoramic_5;
        
        $this->dispatch('show-edit-images-modal');
    
    }

    public function editProjectImageData()
    {
        
        
        // Panoramic Image handling
        $upPan1 = $this->panoramic_1->store('project_images', 'public');
        $upPan2 = $this->panoramic_2->store('project_images', 'public');
        //$upPan3 = $this->panoramic_3->store('project_images', 'public');
        //$upPan4 = $this->panoramic_4->store('project_images', 'public');
        //$upPan5 = $this->panoramic_5->store('project_images', 'public');

        //Standard image handling
        //$upImg1 = $this->std_img_1->store('project_images', 'public');
        //$upImg2 = $this->std_img_2->store('project_images', 'public');
        //$upImg3 = $this->std_img_3->store('project_images', 'public');
        //$upImg4 = $this->std_img_4->store('project_images', 'public');
        //$upImg5 = $this->std_img_5->store('project_images', 'public');
        //$upImg6 = $this->std_img_6->store('project_images', 'public');
        //$upImg7 = $this->std_img_7->store('project_images', 'public');
        //$upImg8 = $this->std_img_8->store('project_images', 'public');
        //$upImg9 = $this->std_img_9->store('project_images', 'public');
        //$upImg10 = $this->std_img_10->store('project_images', 'public');

        $projectImage = ProjectImages::where('project_id', $this->image_edit_id)->first();

        $projectImage->project_id = $this->image_edit_id;
        // Save the file object to the database
        $projectImage->panoramic_1 = $upPan1;
        $projectImage->panoramic_2 = $upPan2;
        $projectImage->panoramic_3 = $this->panoramic_3;
        $projectImage->panoramic_4 = $this->panoramic_4;
        $projectImage->panoramic_5 = $this->panoramic_5;
        $projectImage->std_img_1 = $this->std_img_1;
        $projectImage->std_img_2 = $this->std_img_2;
        $projectImage->std_img_3 = $this->std_img_3;
        $projectImage->std_img_4 = $this->std_img_4;
        $projectImage->std_img_5 = $this->std_img_5;
        $projectImage->std_img_6 = $this->std_img_6;
        $projectImage->std_img_7 = $this->std_img_7;
        $projectImage->std_img_8 = $this->std_img_8;
        $projectImage->std_img_9 = $this->std_img_9;
        $projectImage->std_img_10 = $this->std_img_10;
        
        $projectImage->save();

        session()->flash('message', 'Project images have been updated successfully');

        //For hide modal after add project success
        $this->dispatch('close-modal');
    }

    

    public function resetInputs()
    {
        $this->project_id = '';
        $this->project_name = '';
        $this->client_name = '';
        $this->project_type = '';
        $this->project_categoty = '';
        $this->description = '';
        
        $this->project_edit_id = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editProjects($id)
    {
        $project = Projects::where('id', $id)->first();

        $this->project_edit_id = $project->id;
        $this->project_id = $project->project_id;
        $this->project_name = $project->project_name;
        $this->client_name = $project->client_name;
        $this->project_type = $project->project_type;
        $this->project_category = $project->project_category;
        $this->description = $project->description;
       
        

        $this->dispatch('show-edit-project-modal');
    }
    
    public function editProjectData()
    {
        //on form submit validation
        $this->validate([
            'project_id' => 'required|unique:projects,project_id,'.$this->project_edit_id.'', //Validation with ignoring own data
            'project_name' => 'required',
            
        ]);

        $project = Projects::where('id', $this->project_edit_id)->first();
        $project->project_id = $this->project_id;
        $project->project_name = $this->project_name;
        $project->project_type = $this->project_type;
        $project->project_category = $this->project_category;
        $project->description = $this->description;
        $project->client_name = $this->client_name;

        $project->save();

        session()->flash('message', 'Project has been updated successfully');

        //For hide modal after add project success
        $this->dispatch('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($project_id)
    {
        $this->project_delete_id = $project_id; //project id
        $this->image_delete_id = $project_id; //project id
        
        $this->dispatch('show-delete-confirmation-modal');
    }

    

    public function deleteCategory($id)
    {
        $this->category_delete_id = $id; //project id

        $this->dispatch('show-delete-category-modal');
    }

    public function deleteProjectData()
    {
        $project = Projects::where('project_id', $this->project_delete_id)->first();
        $projectImage = ProjectImages::where('project_id', $this->image_delete_id)->first();

        $project->delete();
        $projectImage->delete();
        
        

        session()->flash('message', 'Project has been deleted successfully');

        $this->dispatch('close-modal');

        $this->project_delete_id = '';
    }

    public function deleteCategoryData()
    {
        $category = Categories::where('id', $this->category_delete_id)->first();
        $category->delete();

        session()->flash('category-message', 'Category has been deleted successfully');

        $this->dispatch('close-modal');

        $this->category_delete_id = '';
    }

    public function cancel()
    {
        $this->project_delete_id = '';
    }

    public function viewProjectDetails($id)
    {
        $project = Projects::where('id', $id)->first();

        $this->view_project_id = $project->project_id;
        $this->view_project_name = $project->email;
        $this->view_project_client_name = $project->upc;
        $this->view_project_type = $project->ean;
        $this->view_project_category = $project->c_39;
        $this->view_project_description = $project->project_name;
        

       
    }

    
    public function resetLoadedDetails()
    {
        $this->load_panoramic_1 = '';
        $this->load_panoramic_2 = '';
        $this->load_project_name = '';
        $this->load_project_id = '';
        $this->load_project_client_name = '';
        $this->load_project_type = '';
        $this->load_project_category = '';
        $this->load_project_description = '';
        $this->std_img_4 = '';
        $this->std_img_5 = '';
        $this->std_img_6 = '';
        $this->std_img_7 = '';
        $this->std_img_8 = '';
        $this->std_img_9 = '';
        $this->std_img_10 = '';
    }

    public function closeViewProjectModal()
    {
        $this->view_project_id = '';
        $this->view_project_name = '';
        $this->view_project_client_name = '';
        $this->view_project_type = '';
        $this->view_project_category = '';
        $this->view_project_description = '';
     
    }

    public function mount($project_id)
    {
        $this->loadProjectDetails($project_id);
    }

    public function loadProjectDetails($project_id)
    {
        $this->resetLoadedDetails();
        $project = Projects::where('project_id', $project_id)->first();
        $projectImage = ProjectImages::where('project_id', $project_id)->first();

        $this->load_project_id = $project->project_id;
        $this->load_project_name = $project->project_name;
        $this->load_project_client_name = $project->client_name;
        $this->load_project_type = $project->project_type;
        $this->load_project_category = $project->project_category;
        $this->load_project_description = $project->description;

        $this->load_panoramic_1 = $projectImage->panoramic_1;
        $this->load_panoramic_2 = $projectImage->panoramic_2;  
    }

    public function render()
    {
        //Get all projects
        $projects = Projects::all();

        return view('livewire.pannellum-component', [
            'projects'=>$projects
            ])->layout('livewire.layouts.base');
    }


}
