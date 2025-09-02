@extends('layouts.main')
<style>
    .hover-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 0.75rem;
    }

    .hover-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body">

                    <h4 class="mb-3 text-success">{{ $program->prog_name }}</h4>

                    <div class="row text-muted mb-3">
                        <div class="col-md-3 col-sm-6 mb-2">
                            <strong>Survey Visit:</strong>
                            {{ $program->levelRelation->visit_level ?? 'N/A' }}
                        </div>
                        <div class="col-md-2 col-sm-6 mb-2">
                            <strong>Campus:</strong>
                            {{ $program->subFolder->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-2 col-sm-6 mb-2">
                            <strong>Date:</strong>
                            {{ $program->created_at->format('M d, Y') }}
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        @forelse($folders->where('survey_visit_id', $program->level) as $folder)
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('levelFolders') }}" target="_blank" class="text-decoration-none">
                                    <div class="card h-100 border-0 bg-warning text-white shadow-lg rounded-3 hover-card 
                    d-flex flex-column justify-content-center align-items-center 
                    text-center transition-all"
                                        style="min-height: 150px; cursor: pointer;">

                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                                            <h5 class="fw-bold mb-0">{{ $folder->folder_name }}</h5>
                                        </div>

                                        <div class="card-footer bg-opacity-25 border-0 w-100 text-center p-2">
                                            <p class="small mb-0 text-white-75">Click to view</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-muted">No folders available.</p>
                        @endforelse
                    </div>



                    <h5 class="mb-3">Areas</h5>
                    <div class="row">
                        @forelse ($areas as $area)
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('program.areas', ['programId' => $program->id, 'areaId' => $area->id]) }}" target="_blank"
                                    class="text-decoration-none">
                                    <div class="card h-100 border-0 bg-secondary text-white shadow-lg rounded-3 hover-card 
                    d-flex flex-column justify-content-center align-items-center 
                    text-center transition-all"
                                        style="min-height: 150px; cursor: pointer;">

                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                                            <h5 class="fw-bold mb-0">{{ $area->area_name }}</h5>
                                        </div>

                                        <div class="card-footer bg-opacity-25 border-0 w-100 text-center p-2">
                                            <p class="small mb-0 text-white-75">Click to view parameters</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-muted">No areas available for this survey level.</p>
                        @endforelse
                    </div>



                </div>









            </div>
        </div>
    </div>
    </div>
@endsection
