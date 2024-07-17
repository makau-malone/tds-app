<div wire:ignore.self class="modal fade" id="viewProjectModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Information</h5>
                    <button type="button" class="close hover-btn" data-dismiss="modal" aria-label="Close" wire:click="closeViewProjectModal">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID: </th>
                                <td>{{ $view_project_id }}</td>
                            </tr>

                            <tr>
                                <th>Name: </th>
                                <td>{{ $view_project_name }}</td>
                            </tr>

                            <tr>
                                <th>Email: </th>
                                <td>{{ $view_project_client_name }}</td>
                            </tr>

                            <tr>
                                <th>Phone: </th>
                                <td>{{ $view_project_category }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>