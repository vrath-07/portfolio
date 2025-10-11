@extends('layouts.admin')

@section('title', 'Add Course')

@section('content')
<div class="container py-4">
    <h2>Add New Course</h2>
    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Course Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Video URL (optional)</label>
            <input type="url" name="video_url" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
