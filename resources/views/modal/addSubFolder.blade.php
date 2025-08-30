<div class="modal fade" id="addSubFolderModal{{ $folder->id }}" tabindex="-1" aria-labelledby="addSubFolderLabel{{ $folder->id }}" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addSubFolderLabel{{ $folder->id }}">Create Subfolder</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('storeSubFolder', $folder->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Subfolder Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="description">Description (optional)</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
