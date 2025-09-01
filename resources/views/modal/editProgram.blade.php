@foreach ($subFolder->programs as $program)
    <!-- Edit Program Modal -->
    <div class="modal fade" id="editProgramModal{{ $program->id }}" tabindex="-1"
        aria-labelledby="editProgramModalLabel{{ $program->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('updateProgram', $program->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editProgramModalLabel{{ $program->id }}">
                            Edit Program - {{ $program->prog_name }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Program Name -->
                        <div class="mb-3">
                            <label class="form-label">Program Name</label>
                            <input type="text" name="prog_name" class="form-control"
                                   value="{{ $program->prog_name }}">
                        </div>

                        <!-- Campus -->
                        <div class="mb-3">
                            <label class="form-label">Campus</label>
                            <select name="campus" class="form-control">
                                <option value="">-- Select Campus --</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}"
                                        {{ $program->campus == $campus->id ? 'selected' : '' }}>
                                        {{ $campus->cam_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Survey Visit Level -->
                        <div class="mb-3">
                            <label class="form-label">Survey Visit Level</label>
                            <select name="level" class="form-control">
                                <option value="">-- Select Level --</option>
                                @foreach ($visit_levels as $visit)
                                    <option value="{{ $visit->id }}"
                                        {{ $program->level == $visit->id ? 'selected' : '' }}>
                                        {{ $visit->visit_level }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="">-- Select Status --</option>
                                <option value="active" {{ $program->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $program->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Program Code -->
                        <div class="mb-3">
                            <label class="form-label">Program Code</label>
                            <div class="input-group">
                                <input type="text" id="programCode{{ $program->id }}" name="code"
                                       class="form-control" value="{{ $program->code }}">
                                <button type="button" class="btn btn-outline-primary"
                                        onclick="generateCode{{ $program->id }}()">Generate</button>
                            </div>
                            <small class="text-muted">Click "Generate" to create a new 6-digit code.</small>
                        </div>
                    </div> <!-- end modal-body -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script for this modal -->
    <script>
        function generateCode{{ $program->id }}() {
            let codeInput = document.getElementById("programCode{{ $program->id }}");
            codeInput.value = Math.floor(100000 + Math.random() * 900000);
        }
    </script>
@endforeach