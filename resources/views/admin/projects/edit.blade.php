@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Project</h2>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.projects.form', ['button' => 'Update Project'])
    </form>
</div>
@endsection
