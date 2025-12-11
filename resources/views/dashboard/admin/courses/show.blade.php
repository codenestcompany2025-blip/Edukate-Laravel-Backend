@extends('dashboard.admin.master')

@section('title', 'Course Details')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Course Profile</h1>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card custom-card shadow-sm mb-4">
        <div class="card-header bg-primary d-flex align-items-center">
            <i class="fas fa-book fa-lg mr-2"></i>
            <h5 class="mb-0"><strong>{{ $course->name }}</strong></h5>
        </div>
        <div class="card-body">
            <div class="row g-4 align-items-center">
                @if ($course->image)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('uploads/images/courses/' . $course->image) }}" alt="{{ $course->name }}"
                            class="img-fluid rounded-circle shadow-sm border" width="150" height="150">
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p><i class="fas fa-align-left mr-2 text-muted"></i>
                                <strong>Description:</strong> {{ $course->description }}
                            </p>

                            <p><i class="fas fa-dollar-sign mr-2 text-muted"></i>
                                <strong>Price:</strong> ${{ number_format($course->price, 2) }}
                            </p>

                            <p><i class="fas fa-hourglass-half mr-2 text-muted"></i>
                                <strong>Duration:</strong> {{ $course->duration }} hrs
                            </p>

                            <p><i class="fas fa-signal mr-2 text-muted"></i>
                                <strong>Skill Level:</strong> {{ ucfirst($course->skill_level) }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <p><i class="fas fa-user-tie mr-2 text-muted"></i>
                                <strong>Instructor:</strong> {{ $course->instructor->name ?? 'N/A' }}
                            </p>

                            <p><i class="fas fa-layer-group mr-2 text-muted"></i>
                                <strong>Category:</strong> {{ $course->category->name ?? 'N/A' }}
                            </p>

                            <p><i class="fas fa-clock mr-2 text-muted"></i>
                                <strong>Created At:</strong> {{ $course->created_at->format('d M Y') }}
                            </p>

                            <p><i class="fas fa-sync-alt mr-2 text-muted"></i>
                                <strong>Updated At:</strong> {{ $course->updated_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.courses.edit', $course->id) }}"
            class="btn btn-warning d-flex align-items-center justify-content-center mr-2" style="width: 40px; height: 40px;"
            title="Edit">
            <i class="fas fa-edit" aria-hidden="true"></i>
            <span class="sr-only">Edit</span>
        </a>

        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this instructor?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center"
                style="width: 40px; height: 40px;" title="Delete">
                <i class="fas fa-trash" aria-hidden="true"></i>
                <span class="sr-only">Delete</span>
            </button>
        </form>
    </div>

@endsection
