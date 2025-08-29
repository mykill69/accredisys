@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <span>Manage Content Settings</span>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-plus-circle"></i> Add Transaction
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#addSurveyVisitModal">
                                    <i class="fas fa-clipboard-check text-muted"></i> Survey Visit Level
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#addCollegeExtensionModal">
                                    <i class="fas fa-university text-muted"></i> College & Extension
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addAreasModal">
                                    <i class="fas fa-layer-group text-muted"></i> Areas
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#addParametersModal"> <i class="fas fa-cogs text-muted"></i>
                                    Parameters</a>
                            </div>
                        </div>
                    </div>

                    <hr class="w-100">
                    <div class="row pt-2">
                        <!-- First Row: Survey Visit Level & Colleges -->
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List of Survey Visit Level</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap text-sm">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">No.</th>
                                                <th style="width: 70%">Level</th>
                                                <th style="width: 20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($surveyVisits as $index => $visit)
                                                <tr>
                                                    <td>{{ $index + 1 }}.</td>
                                                    <td>{{ $visit->visit_level }}</td>
                                                    <td>
                                                        <!-- Edit button -->
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                            data-target="#editSurveyVisitModal{{ $visit->id }}">
                                                            <i class="fas fa-edit"></i> 
                                                        </button>

                                                        <!-- Delete form -->
                                                        <form action="" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this level?')">
                                                                <i class="fas fa-trash"></i> 
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No survey visit levels found.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List of Colleges & Extension</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap text-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>College/Extension</th>
                                                <th>Campus</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($collegeExtensions as $index => $college)
                                                <tr>
                                                    <td>{{ $index + 1 }}.</td>
                                                    <td>{{ $college->col_name }}</td>
                                                    <td>{{ $college->campus->cam_name ?? 'N/A' }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i> 
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> 
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No colleges or extensions found.
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <!-- Second Row: Areas & Parameters -->
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List of Areas</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap text-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Area</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($areas as $index => $area)
                                                <tr>
                                                    <td>{{ $index + 1 }}.</td>
                                                    <td>{{ $area->area_name }}</td>
                                                    <td>{{ $area->surveyVisit->visit_level ?? 'N/A' }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i> 
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> 
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No areas found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List of Parameters</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap text-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>No.</th> --}}
                                                <th>Area</th>
                                                <th>Parameter Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $counter = 1; @endphp
                                            @forelse ($areas as $area)
                                                @foreach ($area->parameters as $param)
                                                    <tr>
                                                        {{-- <td>{{ $counter++ }}.</td> --}}
                                                        <td>{{ $area->area_name }}</td>
                                                        <td>{{ $param->param_name }}. {{ $param->description }}</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i> 
                                                            </button>
                                                            <button class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i> 
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No parameters found.</td>
                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>


                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>


    @include('modal.addSurveyVisit')
    @include('modal.addCollegeExtension')
    @include('modal.addAreas')
    @include('modal.addParameters')
@endsection
