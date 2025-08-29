<!-- Add Area Modal -->
<div class="modal fade" id="addAreasModal" tabindex="-1" role="dialog"
    aria-labelledby="addAreasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="addAreasLabel">
                    <i class="fas fa-layer-group"></i> Add Area
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('AreaStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="area_name">Area Name</label>
                        <input type="text" class="form-control" name="area_name" id="area_name"
                               placeholder="Enter Area Name" required>
                    </div>

                    <div class="form-group">
                        <label for="survey_visit_id">Survey Visit Level</label>
                        <select name="survey_visit_id" id="survey_visit_id" class="form-control" required>
                            <option value="">-- Select Visit Level --</option>
                            @foreach ($surveyVisits as $visit)
                                <option value="{{ $visit->id }}">{{ $visit->visit_level }}</option>
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
