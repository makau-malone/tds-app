<div wire:ignore.self class="modal fade" id="editProjectImages" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Images</h5>
                    <button type="button" class="close hover-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="savePanoramicImage">

                        <h4>Panoramic Images</h4>
                        @include('livewire.project-views.panoramic-images-fields')
                     
                        <div class="form-group row mb-2 mt-3">
                            <label for="" class="col p-0"></label>
                            <div class="col-12">
                                <button type="submit" class="btn-app hover-btn">Save Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>