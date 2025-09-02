@extends('guest.mainguest')

@section('body')
<div class="d-flex justify-content-center">
    <div class="col-12 col-md-11">
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <h3>{{ $program->prog_name }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
