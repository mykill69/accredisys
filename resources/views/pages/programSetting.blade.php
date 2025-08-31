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
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-end" data-toggle="modal" data-target="#addFolderModal">
                                <i class="fas fa-plus"></i> Create Folder
                            </button>
                        </div>
                        <hr class="w-100">
                    </div>
                    <div class="row">
                        @forelse ($folders as $folder)
                            <div class="col-md-2 text-center mb-4 position-relative folder-icon">
                                {{-- Subfolder count badge --}}
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                    {{ $folder->subFolders->count() }}
                                </span>

                                {{-- 3-dot dropdown --}}
                                <div class="dropdown folder-menu position-absolute top-0 end-0">
                                    <button class="btn btn-sm btn-light" type="button"
                                        id="dropdownMenuButton{{ $folder->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $folder->id }}">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                    </ul>
                                </div>

                                {{-- Folder icon --}}
                                <a href="{{ route('showFolder', $folder->id) }}" class="text-decoration-none">
                                    <i class="fas fa-folder fa-5x text-warning"></i>
                                    <div class="folder-name mt-2">{{ $folder->name }}</div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-center text-muted">No folders yet. Click "Create Folder" to add one.</p>
                            </div>
                        @endforelse
                    </div>





                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
    @include('modal.addFolder')
@endsection
