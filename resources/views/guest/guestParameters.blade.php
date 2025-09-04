@extends('guest.mainguest')

@section('body')
    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Program Info -->
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

            <!-- Parameters -->
            <div class="row">

                <div class="col-md-12 mb-4">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body">
                            <h3>{{ $area->area_name }}</h3>
                            @forelse ($area->parameters as $parameter)
                                <!-- Parameter title + description -->
                                <h5 class="fw-bold text-dark">
                                    {{ $parameter->param_name }}
                                </h5>
                                <hr>
                                @if (!empty($parameter->description))
                                    <p class="text-muted">{{ $parameter->description }}</p>
                                @endif

                                <!-- Files under this parameter -->
                                <ul class="list-unstyled mt-2">
                                    @forelse ($parameter->files as $file)
                                        <li class="mb-2">
                                            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                                class="text-decoration-none text-primary">
                                                <i class="fas fa-file-pdf text-danger"></i>
                                                {{ $file->file_name }}
                                            </a>
                                        </li>
                                    @empty
                                        <small class="text-muted">No files available for this parameter.</small>
                                    @endforelse
                                </ul>

                            @empty
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        No parameters found for this area.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
