<!-- Modal: Add Program -->
<div class="modal fade" id="addProgramModal{{ $subFolder->id }}" tabindex="-1"
    aria-labelledby="addProgramLabel{{ $subFolder->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="addProgramLabel{{ $subFolder->id }}">Add Program to {{ $subFolder->name }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('storeProgram', $subFolder->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Program Name -->
                    <div class="mb-3">
                        <label for="prog_name" class="form-label">Program Name</label>
                        <input type="text" name="prog_name" class="form-control" required>
                    </div>

                    <!-- Campus -->
                    <div class="mb-3">
                        <label for="campus" class="form-label">Campus</label>
                        <select name="campus" class="form-control select" required>
                            <option value="" disabled selected>-- Select Campus --</option>
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}">{{ $campus->cam_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Level -->
                    <div class="mb-3">
                        <label for="level" class="form-label">Survey Visit Level</label>
                        <select name="level" class="form-control select" required>
                            <option value="" disabled selected>-- Select Level --</option>
                            @foreach ($visit_levels as $level)
                                <option value="{{ $level->id }}">{{ $level->visit_level }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control select" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Program</button>
                </div>
            </form>
        </div>
    </div>
</div>
