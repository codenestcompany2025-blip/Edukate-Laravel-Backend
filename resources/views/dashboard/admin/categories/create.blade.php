@extends('dashboard.admin.master')

@section('title', 'Add New Category')

@section('content')


    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Add New Category</h1>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <div class="card custom-card mb-4">
        <div class="card-header">Create Category</div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">Create</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
