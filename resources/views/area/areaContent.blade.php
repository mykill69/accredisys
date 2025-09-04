@extends('layouts.main')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="row">
                    <div class="card-body pb-0">
                        <h4 class="mb-3 text-success">{{ $program->prog_name }}</h4>
                        <span class="text-lg">{{ $program->subFolder->name }}</span>
                    </div>
                </div>

                <hr class="w-100">
                <div class="card-body pt-0">
                    <form id="uploadForm">
                        <!-- Hidden program_id -->
                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                        <input type="hidden" name="area_id" value="{{ $area->id }}">


                        <div class="mb-4">
                            <h5 class="text-primary">{{ $area->area_name }}</h5>
                            <span class="fw-bold">Parameters</span>
                            <hr>

                            @forelse ($area->parameters as $parameter)
                                <div class="row mb-2 p-2">
                                    <div class="col">
                                        <span class="text-bold">
                                            {{ $parameter->param_name }}. {{ $parameter->description }}
                                        </span>
                                        <hr>

                                        <!-- Existing Files -->
                                        <ul id="file-list-{{ $parameter->id }}" class="list-unstyled">
                                            @forelse ($parameter->files as $file)
                                                <li id="file-{{ $file->id }}"
                                                    class="d-flex justify-content-between align-items-center mb-2 p-2">
                                                    <!-- File link -->
                                                    <div>
                                                        <a href="{{ asset('storage/' . $file->file_path) }}"
                                                            target="_blank" class="text-primary text-decoration-underline">
                                                            <i class="fas fa-file-pdf text-danger"></i>
                                                            <span>{{ $file->file_name }}</span>
                                                        </a>
                                                    </div>

                                                    <!-- Delete form -->
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="deleteFile('{{ route('files.destroy', $file->id) }}')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                </li>
                                            @empty
                                                <small class="text-muted">No files uploaded</small>
                                            @endforelse
                                        </ul>


                                        <!-- Drag & Drop Upload -->
                                        <div class="upload-box border border-dashed p-3 mt-2 text-center"
                                            data-param="{{ $parameter->id }}">
                                            <i class="fas fa-file-pdf text-muted"></i>
                                            <span class="text-muted">Drag & drop PDF here or click to select</span>
                                            <input type="file" name="files[{{ $parameter->id }}][]"
                                                accept="application/pdf" class="file-input d-none" multiple>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No parameters for this area.</p>
                            @endforelse
                        </div>


                        <button type="submit" class="btn btn-success mt-3">Upload Selected Files</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("{{ url('/parameters/files/upload-multiple') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Files uploaded successfully!");
                        location.reload();
                    } else {
                        alert(data.message || "Upload failed.");
                    }
                })
                .catch(err => console.error("Upload error:", err));
        });

        document.querySelectorAll('.upload-box').forEach(box => {
            const input = box.querySelector('.file-input');
            const preview = document.createElement('div');
            preview.classList.add('file-preview', 'mt-2', 'text-start');
            box.appendChild(preview);

            box.addEventListener('click', () => input.click());

            box.addEventListener('dragover', e => {
                e.preventDefault();
                box.classList.add('bg-light');
            });

            box.addEventListener('dragleave', () => box.classList.remove('bg-light'));

            box.addEventListener('drop', e => {
                e.preventDefault();
                box.classList.remove('bg-light');
                if (e.dataTransfer.files.length) {
                    const dt = new DataTransfer();
                    Array.from(e.dataTransfer.files).forEach(file => dt.items.add(file));
                    input.files = dt.files;

                    preview.innerHTML = '';
                    Array.from(input.files).forEach(file => {
                        const p = document.createElement('p');
                        p.textContent = `📄 ${file.name}`;
                        preview.appendChild(p);
                    });
                }
            });

            input.addEventListener('change', () => {
                preview.innerHTML = '';
                Array.from(input.files).forEach(file => {
                    const p = document.createElement('p');
                    p.textContent = `📄 ${file.name}`;
                    preview.appendChild(p);
                });
            });
        });
    </script>

    <script>
        function deleteFile(url) {
            if (confirm('Are you sure you want to delete this file?')) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                form.appendChild(method);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>


@endsection
