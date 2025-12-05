@extends('dashboard.admin.master')

@section('title', 'Edit Category')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">Edit Category</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left mr-1"></i> Back
    </a>
</div>

<div class="card custom-card mb-4">
    <div class="card-header">Update Category</div>
    <div class="card-body">Category
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $category->name) }}">
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection