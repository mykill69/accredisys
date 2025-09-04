@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body">

                    <h3 class="card-title mb-4">Colleges</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle w-100" id="example1">
                            <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 40%;">College Name</th>
                                    <th style="width: 30%;">Campus</th>
                                    <th style="width: 30%;">Dean</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colleges as $college)
                                    <tr>
                                        <td>{{ $college->col_name }}</td>
                                        <td>{{ $college->campus->cam_name ?? 'N/A' }}</td>
                                        <td>{{ $college->dean ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
