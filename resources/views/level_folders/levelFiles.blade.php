@extends('layouts.main')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-11">
            <div class="card shadow-sm mt-3">
                <div class="row">
                    <div class="card-body pb-0">
                        <h4 class="mb-3 text-success">Level Folders</h4>
                        <span class="text-lg">Manage your level-based files here</span>
                        <br>
                        <span>Folders & Files</span>
                    </div>
                </div>
                <hr class="w-100">
                <div class="card-body pt-0">
                    <form id="uploadForm">
                        @foreach ($folders as $folder)
                            <div class="row mb-2 p-2">
                                <div class="col">
                                    <span class="text-bold">{{ $folder->folder_name }}</span>
                                    <hr>

                                    <!-- Existing Files -->
                                    <ul id="file-list-{{ $folder->id }}" class="list-unstyled">
                                        @forelse ($folder->files as $file)
                                            <li id="file-{{ $file->id }}">
                                                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                                    class="text-primary text-decoration-underline">
                                                    <i class="fas fa-file-pdf text-danger"></i>
                                                    <span>{{ $file->file_name }}</span>
                                                </a>
                                                <hr>
                                            </li>
                                        @empty
                                            <small class="text-muted">No files uploaded</small>
                                        @endforelse
                                    </ul>

                                    <!-- Drag & Drop Upload -->
                                    <div class="upload-box border border-dashed p-3 mt-2 text-center"
                                        data-folder="{{ $folder->id }}">
                                        <i class="fas fa-file-pdf text-muted"></i>
                                        <span class="text-muted">Drag & drop PDF here or click to select</span>
                                        <input type="file" name="files[{{ $folder->id }}][]" accept="application/pdf"
                                            class="file-input d-none" multiple>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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

            fetch("{{ url('/level-folders/files/upload-multiple') }}", {
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
@endsection
