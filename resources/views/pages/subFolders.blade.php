@extends('layouts.main')
<style>
    .folder-icon {
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .folder-icon:hover {
        transform: scale(1.1);
    }

    .folder-name {
        font-weight: 600;
        font-size: 14px;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .subfolder-list {
        margin-top: 5px;
        text-align: left;
        font-size: 13px;
    }

    .subfolder-item {
        display: flex;
        align-items: center;
        margin-bottom: 3px;
    }

    .subfolder-item i {
        margin-right: 5px;
    }

    .folder-menu {
        z-index: 10;
    }

    .folder-icon {
        margin-top: 15px;
        /* To give space for the 3-dot menu */
    }

    .dropdown-menu {
        z-index: 1050 !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-folder text-warning"></i> {{ $folder->name }}
                            </h4>
                            <p class="text-muted mb-0">{{ $folder->description }}</p>
                        </div>

                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addSubFolderModal{{ $folder->id }}">
                            Create Subfolder
                        </button>
                    </div>

                    <hr class="w-100">


                    <div class="row">
                        @forelse ($folder->subFolders as $sub)
                            <div class="col-md-2 text-center mb-4 position-relative folder-icon">
                                {{-- Subfolder count badge --}}
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                    {{ $sub->programs->count() }}
                                </span>
                                {{-- 3-dot dropdown --}}
                                <div class="dropdown folder-menu position-absolute top-0 end-0">
                                    <button class="btn btn-sm btn-light" type="button"
                                        id="dropdownMenuButtonSub{{ $sub->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSub{{ $sub->id }}">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                    </ul>
                                </div>

                                {{-- Subfolder icon (clickable) --}}
                                <a href="{{ route('showSubFolder', $sub->id) }}" class="text-decoration-none text-dark">
                                    <i class="fas fa-folder fa-5x text-warning"></i>
                                    <div class="folder-name mt-2">{{ $sub->name }}</div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-center text-muted">No subfolders yet. Click "Create Subfolder" to add one.
                                </p>
                            </div>
                        @endforelse
                    </div>


                </div>
            </div>
        </div>
    </div>

    @include('modal.addSubFolder')
@endsection
