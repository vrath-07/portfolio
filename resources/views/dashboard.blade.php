@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Dashboard') }}
    </h2>

    <div class="bg-white shadow-sm rounded-lg p-6">
        <p class="text-gray-900">
            {{ __("You're logged in!") }}
        </p>

        <hr class="my-4">

        <p>
            Role: <strong>{{ ucfirst(Auth::user()->role) }}</strong>
        </p>

        @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin.courses.index') }}" class="btn btn-primary mt-3">
                Go to Admin Courses
            </a>
        @else
            <p class="text-muted mt-3">You are logged in as a regular user.</p>
        @endif
    </div>
</div>
@endsection
