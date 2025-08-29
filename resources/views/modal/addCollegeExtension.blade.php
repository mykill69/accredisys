<!-- Add College & Extension Modal -->
<div class="modal fade" id="addCollegeExtensionModal" tabindex="-1" role="dialog"
    aria-labelledby="addCollegeExtensionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="addCollegeExtensionLabel">
                    <i class="fas fa-university"></i> Add College & Extension
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('CollegeExtStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="col_name">College Name</label>
                        <input type="text" class="form-control" name="col_name" id="col_name" placeholder="Enter College/Extension Name" required>
                    </div>
                    <div class="form-group">
                        <label for="cam_id">Campus</label>
                        <select name="cam_id" id="cam_id" class="form-control" required>
                            <option value="">-- Select Campus --</option>
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}">{{ $campus->cam_name }}</option>
                            @endforeach
                        </select>
                    </div>
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
