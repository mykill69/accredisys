@extends('guest.mainguest')

@section('body')
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-md-8 mb-3 mb-md-0">
                    <h3 class="text-success mb-2" style="font-size: 3rem">
                        {{ $program->prog_name }}
                    </h3>

                    <div class="d-flex flex-wrap align-items-center text-muted">
                        <span class="me-3">
                            {{ $program->levelRelation->visit_level ?? 'N/A' }}
                        </span>
                        <span class="mx-2">|</span>
                        <span>
                            {{ $program->subFolder->name ?? 'N/A' }}
                        </span>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-4 text-md-end">
                    <form action="{{ route('verifyGuestCode', $program->guest_token) }}" method="POST">
                        @csrf
                        <label for="programCode" class="form-label d-block mb-2">
                            Please enter the 6-digit code to access the survey areas
                        </label>
                        <div class="input-group">
                            <input type="text" id="programCode" name="code" class="form-control text-center"
                                maxlength="6" placeholder="Enter 6-digit code" required>
                            <button type="submit" class="btn btn-success ml-2">Enter</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
