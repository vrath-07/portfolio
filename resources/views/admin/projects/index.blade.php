@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold text-dark mb-0">Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary px-4 py-2 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i> Add Project
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($projects->isEmpty())
        <p class="text-muted text-center py-5">No projects found.</p>
    @else
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" 
                                 class="card-img-top rounded-top" 
                                 alt="{{ $project->title }}"
                                 style="height:230px; object-fit:cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light" style="height:230px;">
                                <span class="text-muted small">No Image</span>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-semibold mb-2 text-dark">{{ $project->title }}</h5>
                            <p class="text-muted small flex-grow-1">{{ Str::limit($project->description, 100) }}</p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <small class="text-secondary">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $project->year ?? '—' }}
                                </small>
                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="text-primary small fw-medium text-decoration-none">
                                        View Project →
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 border-top pt-3 d-flex gap-2">
                            <a href="{{ route('admin.projects.edit', $project) }}" 
                               class="btn btn-outline-primary flex-fill">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" 
                                  method="POST" class="flex-fill" 
                                  onsubmit="return confirm('Delete this project?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger w-100">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    body {
        background: #f8f9fc;
    }

    .project-card {
        border-radius: 12px;
        background-color: #fff;
        transition: all 0.25s ease;
    }

    .project-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .btn-outline-primary {
        border-color: #0d6efd;
        color: #0d6efd;
        transition: all 0.2s ease;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        transition: all 0.2s ease;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    .card-title {
        font-size: 1.05rem;
        line-height: 1.4;
    }
</style>
@endsection
