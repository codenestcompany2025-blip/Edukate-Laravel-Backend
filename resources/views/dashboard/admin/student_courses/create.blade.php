@extends('dashboard.master')

@section('title', 'Add Student Course')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">Add Student - Course</h1>
    <a href="{{ route('admin.student_courses.index') }}" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left mr-1"></i> Back
    </a>
</div>

<div class="card custom-card mb-4">
    <div class="card-header">Create Student- Course</div>
    <div class="card-body">
        <form action="{{ route('admin.student_courses.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Student -->
                <div class="col-md-6 mb-3">
                    <label for="student_id" class="form-label">Student</label>
                    <select name="student_id" id="student_id"
                            class="form-control @error('student_id') is-invalid @enderror" required>
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Course -->
                <div class="col-md-6 mb-3">
                    <label for="course_id" class="form-label">Course</label>
                    <select name="course_id" id="course_id"
                            class="form-control @error('course_id') is-invalid @enderror" required>
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-save me-1"></i> Create
                </button>
                <a href="{{ route('admin.student_courses.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection