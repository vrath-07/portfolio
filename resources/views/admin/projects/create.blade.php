@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Add New Project</h2>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.projects.form', ['button' => 'Add Project'])
    </form>
</div>
@endsection
