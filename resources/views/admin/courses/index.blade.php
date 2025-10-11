@extends('layouts.admin')

@section('title', 'Manage Courses')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Manage Courses</h2>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Video URL</th>
                <th style="width: 122px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ Str::limit($course->description, 80) }}</td>
                    <td>{{ $course->video_url }}</td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
