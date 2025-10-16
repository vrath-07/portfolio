@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Add Team Member</h2>

    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role *</label>
            <select name="role" class="form-select" required>
                <option value="">-- Select Role --</option>
                <option value="Research Scholar">Research Scholar</option>
                <option value="Master of Design">Master of Design</option>
                <option value="Project Staff">Project Staff</option>
                <option value="Intern">Intern</option>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Status *</label>
            <select name="status" class="form-select" required>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Thesis Title</label>
            <input type="text" name="thesis_title" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Area of Research</label>
            <input type="text" name="area_of_research" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success w-100">Save Member</button>
    </form>
</div>
@endsection
