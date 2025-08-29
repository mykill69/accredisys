@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    {{-- <div class="text-center mb-4">
                        <h1>Welcome to CPSU Online Accreditation System</h1>
                        <p class="lead">
                            Your one-stop solution for accreditation management at
                            Central Philippine State University.
                        </p>
                    </div> --}}

                    <div class="row">
                        <!-- Programs -->
                        <div class="col-lg-4 col-6">
                            <a href="{{ url('/programs') }}" class="small-box bg-primary text-white"
                                style="display:block; text-decoration:none;">
                                <div class="inner">
                                    <h4>Programs</h4>
                                    <p>View and manage accreditation status of academic programs.</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div class="small-box-footer text-white">
                                    Click to view <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Colleges -->
                        <div class="col-lg-4 col-6">
                            <a href="{{ url('/colleges') }}" class="small-box bg-success text-white"
                                style="display:block; text-decoration:none;">
                                <div class="inner">
                                    <h4>Campus/Colleges</h4>
                                    <p>Check accreditation progress by college.</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div class="small-box-footer text-white">
                                    Click to view <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Reports -->
                        <div class="col-lg-4 col-6">
                            <a href="{{ url('/reports') }}" class="small-box bg-info text-white"
                                style="display:block; text-decoration:none;">
                                <div class="inner">
                                    <h4>Reports</h4>
                                    <p>Generate reports and monitor accreditation performance.</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="small-box-footer text-white">
                                    Click to view <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>


                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
@endsection
