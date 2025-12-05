@extends('dashboard.admin.master')

@section('title', 'Edit Instructor')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">Edit Instructor</h1>
    <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left mr-1"></i> Back
    </a>
</div>

<div class="card custom-card mb-4">
    <div class="card-header">Update Instructor</div>
    <div class="card-body">
        <form action="{{ route('admin.instructors.update', $instructor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $instructor->name) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $instructor->email) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Major</label>
                    <input type="text" name="major" class="form-control"
                           value="{{ old('major', $instructor->major) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Salary ($)</label>
                    <input type="number" name="salary" class="form-control"
                           value="{{ old('salary', $instructor->salary) }}">
                </div>

                {{-- <div class="col-md-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <small class="text-muted">Leave blank to keep current password</small>
                </div> --}}

                <div class="col-md-6 mb-3">
                    <label>Qualification</label>
                    <select name="qualification" class="form-control">
                        <option value="d" {{ old('qualification', $instructor->qualification) == 'd' ? 'selected' : '' }}>Diploma</option>
                        <option value="b" {{ old('qualification', $instructor->qualification) == 'b' ? 'selected' : '' }}>Bachelor</option>
                        <option value="m" {{ old('qualification', $instructor->qualification) == 'm' ? 'selected' : '' }}>Master</option>
                        <option value="dr" {{ old('qualification', $instructor->qualification) == 'dr' ? 'selected' : '' }}>Doctor</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="m" {{ old('gender', $instructor->gender) == 'm' ? 'selected' : '' }}>Male</option>
                        <option value="f" {{ old('gender', $instructor->gender) == 'f' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('admin.instructors.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection