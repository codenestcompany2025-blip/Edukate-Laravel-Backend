@extends('dashboard.admin.master')

@section('title', 'Add New Testimonial')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Add New Testimonial</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <div class="card custom-card mb-4">
        <div class="card-header">Create Testimonial</div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Student Name -->
                    <div class="col-md-6 mb-3">
                        <label for="student_name" class="form-label">Student Name</label>
                        <input type="text" name="student_name" id="student_name"
                            class="form-control @error('student_name') is-invalid @enderror"
                            value="{{ old('student_name') }}" required>
                        @error('student_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Specialization -->
                    <div class="col-md-6 mb-3">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="text" name="specialization" id="specialization"
                            class="form-control @error('specialization') is-invalid @enderror"
                            value="{{ old('specialization') }}" required>
                        @error('specialization')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="img" class="form-label">Testimonial Image</label>
                        <input type="file" name="img" id="img"
                            class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Comment -->
                    <div class="col-12 mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea name="comment" id="comment" rows="4" class="form-control @error('comment') is-invalid @enderror"
                            required>{{ old('comment') }}</textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-save me-1"></i> Create
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
