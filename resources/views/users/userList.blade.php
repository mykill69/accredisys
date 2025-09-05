@extends('layouts.main')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-11">
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-4">User List</h3>
                        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-users"></i> Add New User
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle w-100" id="example1">
                            <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 20%;">Full Name</th>
                                    <th style="width: 25%;">Email</th>
                                    <th style="width: 15%;">Role</th>
                                    <th style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $user->lname }}, {{ $user->fname }} {{ $user->mname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center bg-warning">{{ ucfirst($user->role) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('users.delete', $user->id) }}" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('modal.addUser')
@endsection
