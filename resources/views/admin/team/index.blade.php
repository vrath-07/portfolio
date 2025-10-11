@extends('layouts.admin')

@section('title', 'Manage Team Members')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Manage Team Members</h2>

    <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Add New Member</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Thesis Title</th>
                <th>Area of Research</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>
                        @if($member->image)
                            <img src="{{ asset('storage/'.$member->image) }}" alt="{{ $member->name }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role ?? '-' }}</td>
                    <td>{{ $member->status }}</td>
                    <td>{{ Str::limit($member->thesis_title, 40) }}</td>
                    <td>{{ Str::limit($member->area_of_research, 40) }}</td>
                    <td>
                        <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this member?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No team members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
