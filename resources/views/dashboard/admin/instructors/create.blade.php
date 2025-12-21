@extends('dashboard.admin.master')

@section('title', 'Add New Instructor')

@section('content')


    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Add New Instructor</h1>
        <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <div class="card custom-card mb-4">
        <div class="card-header">Create Instructor</div>
        <div class="card-body">
            <form action="{{ route('admin.instructors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @foreach ([['name', 'Name', 'text'], ['email', 'Email', 'email'], ['major', 'Major', 'text'], ['salary', 'Salary ($)', 'number'], ['password', 'Password', 'password']] as [$field, $label, $type])
                        <div class="col-md-6 mb-3">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            <input type="{{ $type }}" name="{{ $field }}" id="{{ $field }}"
                                class="form-control @error($field) is-invalid @enderror" value="{{ old($field) }}"
                                required>
                            @error($field)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div class="col-md-6 mb-3">
                        <label for="profile_img" class="form-label">Profile Image</label>
                        <input type="file" name="profile_img" id="profile_img"
                            class="form-control @error('profile_img') is-invalid @enderror">
                        @error('profile_img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select name="qualification" id="qualification"
                            class="form-control @error('qualification') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="d" {{ old('qualification') == 'd' ? 'selected' : '' }}>Diploma</option>
                            <option value="b" {{ old('qualification') == 'b' ? 'selected' : '' }}>Bachelor</option>
                            <option value="m" {{ old('qualification') == 'm' ? 'selected' : '' }}>Master</option>
                            <option value="dr" {{ old('qualification') == 'dr' ? 'selected' : '' }}>Doctor</option>
                        </select>
                        @error('qualification')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="m" {{ old('gender') == 'm' ? 'selected' : '' }}>Male</option>
                            <option value="f" {{ old('gender') == 'f' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">Create</button>
                    <a href="{{ route('admin.instructors.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
