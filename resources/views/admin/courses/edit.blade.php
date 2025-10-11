@extends('layouts.admin')

@section('title', 'Edit Course')

@section('content')

<div class="container py-4">
    <h2>Edit Course</h2>
    <form action="{{ route('admin.courses.update', $course) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Course Title</label>
            <input type="text" name="title" value="{{ $course->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control" required>{{ $course->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Video URL (optional)</label>
            <input type="url" name="video_url" value="{{ $course->video_url }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
