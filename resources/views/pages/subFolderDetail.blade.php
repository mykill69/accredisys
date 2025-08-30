@extends('layouts.main')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-folder text-warning"></i> {{ $subFolder->name }} - <span>Program List</span>
                            </h4>
                            <p class="text-muted mb-0">{{ $subFolder->description }}</p>
                        </div>

                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addProgramModal{{ $subFolder->id }}">
                            Add Program
                        </button>
                    </div>

                    <hr class="w-100">
                </div>
                <div class="col-lg-12 col-12">
                    <!-- /.card-header -->
                    <div class="table-responsive p-2">
                        <table class="table table-head-fixed text-nowrap text-sm" id="example1">
                            <thead>
                                <tr>
                                    <th>PROGRAM NAME</th>
                                    <th>SURVEY VISIT LEVEL</th>
                                    <th>CAMPUS</th>
                                    <th>DATE CREATED</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subFolder->programs as $program)
                                    <tr>
                                        <td>
                                            <a href="{{ route('showProgram', $program->id) }}" target="_blank"
                                                class="text-primary text-decoration-underline">
                                                {{ $program->prog_name }}
                                                <span class="small text-muted">(click to view)</span>
                                            </a>
                                        </td>

                                        <td>
                                            {{-- If level is FK to survey_visit --}}
                                            <span class="badge bg-warning">{{ optional($program->levelRelation)->visit_level ?? 'N/A' }}</span>
                                        </td>
                                        <td>{{ $program->campusRelation->cam_name ?? 'N/A' }}</td>
                                        <td>{{ $program->created_at->format('M d, Y') }}</td>
                                        <td>{{ ucfirst($program->status) }}</td>
                                        <td>
                                            <!-- Edit button -->
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProgramModal{{ $program->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Delete form -->
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this program?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No programs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>


                    </div>
                </div>


            </div>
        </div>
    </div>

    @include('modal.addProgram')
@endsection
