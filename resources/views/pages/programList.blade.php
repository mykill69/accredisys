@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-11"> <!-- slightly smaller on large screens -->
            <div class="card shadow-sm mt-3">
                <div class="card-body">

                    <h3 class="card-title mb-4">Programs</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle w-100" id="example1">
                            <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 25%;">Program Name</th>
                                    <th style="width: 20%;">College</th>
                                    <th style="width: 15%;">Campus</th>
                                    <th style="width: 20%;">Accreditation Level</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 10%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $program)
                                    <tr>
                                        <td>{{ $program->prog_name }}</td>
                                        <td>{{ $program->subFolder->name ?? 'N/A' }}</td>
                                        <td>{{ $program->campusRelation->cam_name ?? 'N/A' }}</td>
                                        <td>{{ $program->levelRelation->visit_level ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <span
                                                class="badge 
                                            @if (strtolower($program->status) == 'active') bg-success 
                                            @elseif(strtolower($program->status) == 'inactive') bg-secondary 
                                            @else bg-light text-dark @endif">
                                                {{ ucfirst($program->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('showProgram', $program->id) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('program.areas', ['programId' => $program->id, 'areaId' => 1]) }}"
                                                class="btn btn-secondary btn-sm">Areas</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
@endsection
