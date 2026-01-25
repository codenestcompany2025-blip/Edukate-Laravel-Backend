@extends('dashboard.master')

@section('title', 'Course Lectures')

@section('css')
    <style>
        .lecture-card {
            border-radius: 10px;
        }

        .lecture-card .btn-primary {
            border-radius: 6px;
        }
    </style>
@endsection

@section('content')

    <div class="mb-4">
        <h1 class="page-title">{{ $course->name }}</h1>
        <p class="text-muted mb-0">All lectures you have added to this course.</p>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>Lectures</span>
            <a href="{{ route('instructor.course.lectures.create', $course) }}" class="btn add-btn shadow-sm">
                <i class="fas fa-plus mr-1"></i> Add New Lecture
            </a>
        </div>

        <div class="card-body">
            <div class="row">
                @forelse($lectures as $lecture)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm lecture-card">
                            <div class="card-body d-flex flex-column">

                                <h6 class="font-weight-bold text-gray-800 mb-1">
                                    {{ $lecture->name }}
                                </h6>

                                <p class="text-muted small mb-3">
                                    {{ Str::limit($lecture->description, 57) }}
                                </p>

                                <a href="{{ $lecture->link }}" target="blank" class="btn btn-primary btn-block btn-sm mb-3">
                                    <i class="fas fa-play"></i> Watch Lecture
                                </a>

                                <div class="mt-auto d-flex">
                                    <a href="{{ route('instructor.course.lectures.edit', [$course, $lecture]) }}"
                                        class="btn btn-info btn-sm mr-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('instructor.course.lectures.destroy', [$course, $lecture]) }}"
                                        method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12 text-center text-muted">
                        No lectures yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
