<!-- Add Parameters Modal -->
<div class="modal fade" id="addParametersModal" tabindex="-1" role="dialog"
    aria-labelledby="addParametersLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="addParametersLabel">
                    <i class="fas fa-sliders-h"></i> Add Parameter
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('ParameterStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Parameter Name -->
                    <div class="form-group">
                        <label for="param_name">Parameter</label>
                        <input type="text" class="form-control" name="param_name" id="param_name"
                               placeholder="Enter Parameter Name" required>
                    </div>

                    <!-- Parameter Description -->
                    <div class="form-group">
                        <label for="description">Description (Optional)</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="Enter short description"></textarea>
                    </div>

                    <!-- Select Area -->
                    <div class="form-group">
                        <label for="area_id">Area</label>
                        <select name="area_id" id="area_id" class="form-control" required>
                            <option value="">-- Select Area --</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}"> {{ $area->surveyVisit->visit_level ?? 'No Level' }} - {{ $area->area_name }}</option>
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
