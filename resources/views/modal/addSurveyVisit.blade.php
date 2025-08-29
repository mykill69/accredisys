<!-- Modal (AdminLTE Style) -->
<div class="modal fade" id="addSurveyVisitModal" tabindex="-1" role="dialog" aria-labelledby="addSurveyVisitLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="addSurveyVisitLabel">
                    <i class="fas fa-clipboard-check"></i> Add Survey Visit Level
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- FORM -->
            <form action="{{ route('surveyStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="visit_level">Visit Level</label>
                        <input type="text" class="form-control" id="visit_level" name="visit_level" placeholder="Enter visit level (e.g., Level I)" required>
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
