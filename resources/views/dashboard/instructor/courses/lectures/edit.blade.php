@extends('dashboard.master')

@section('title', 'Edit Lecture')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Edit Lecture</h1>
        <a href="{{ route('instructor.course.lectures.index', $course) }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <div class="card custom-card mb-4">
        <div class="card-header">Edit Lecture</div>
        <div class="card-body">
            <form action="{{ route('instructor.course.lectures.update', [$course, $lecture]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $lecture->name }}" required>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="order">Order</label>
                        <input type="number" name="order" id="order"
                            class="form-control @error('order') is-invalid @enderror" value="{{ $lecture->order }}" required>

                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="duration">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration"
                            class="form-control @error('duration') is-invalid @enderror" value="{{ $lecture->duration }}"
                            required>

                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="link">Video Link</label>
                        <input type="url" name="link" id="link"
                            class="form-control @error('link') is-invalid @enderror" value="{{ $lecture->link }}" required>

                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="form-control @error('description') is-invalid @enderror" required>{{ $lecture->description }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>


                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="{{ route('instructor.course.lectures.index', $course) }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
