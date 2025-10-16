@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Edit Team Member</h2>

    <form action="{{ route('admin.team.update', $teamMember) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="{{ $teamMember->name }}" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Role *</label>
        <select name="role" class="form-select" required>
            <option value="">-- Select Role --</option>
            <option value="Research Scholar" {{ $teamMember->role == 'Research Scholar' ? 'selected' : '' }}>Research Scholar</option>
            <option value="Master of Design" {{ $teamMember->role == 'Master of Design' ? 'selected' : '' }}>Master of Design</option>
            <option value="Project Staff" {{ $teamMember->role == 'Project Staff' ? 'selected' : '' }}>Project Staff</option>
            <option value="Intern" {{ $teamMember->role == 'Intern' ? 'selected' : '' }}>Intern</option>
        </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Status *</label>
            <select name="status" class="form-select" required>
                <option value="Ongoing" {{ $teamMember->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Completed" {{ $teamMember->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Thesis Title</label>
            <input type="text" name="thesis_title" class="form-control" value="{{ $teamMember->thesis_title }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Area of Research</label>
            <input type="text" name="area_of_research" class="form-control" value="{{ $teamMember->area_of_research }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            @if($teamMember->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$teamMember->image) }}" alt="{{ $teamMember->name }}" width="100" class="rounded">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Member</button>
    </form>
</div>
@endsection
