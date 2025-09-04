@extends('guest.mainguest')

@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-md-8 mb-3 mb-md-0">
                    <h3 class="text-success mb-2" style="font-size: 2rem">
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
            </div>
            <hr class="pb-2">

            <div class="row">

                @forelse ($areas as $area)
                    <div class="col-md-3 col-sm-6 mb-3">
                        <a href="{{ route('guest.program.areas', ['token' => $program->guest_token, 'areaId' => $area->id]) }}"
                            target="_blank" class="text-decoration-none">
                            <div class="card h-100 border-0 bg-info text-white shadow-lg rounded-3 hover-card 
                d-flex flex-column justify-content-center align-items-center 
                text-center transition-all"
                                style="min-height: 150px; cursor: pointer;">

                                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
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
@endsection
