<div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog" aria-labelledby="addFolderLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addFolderLabel">
                  Create Folder
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('storeFolder') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Folder Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Enter folder name" required>
                    </div>

                    {{-- <div class="form-group">
                        <label for="description">Description (optional)</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                                  placeholder="Enter folder description"></textarea>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
