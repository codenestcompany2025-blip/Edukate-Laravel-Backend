@extends('dashboard.master')

@section('title', 'Edit Student')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Edit Student</h1>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <div class="card custom-card mb-4">
        <div class="card-header">Update Student</div>
        <div class="card-body">
            <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $student->email) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Profile Image</label>
                        <input type="file" name="profile_img" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Date Of Birth</label>
                        <input type="date" name="birth_date" class="form-control"
                            value="{{ old('birth_date', $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : '') }}">

                    </div>


                    <div class="col-md-6 mb-3">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="m" {{ old('gender', $student->gender) == 'm' ? 'selected' : '' }}>Male
                            </option>
                            <option value="f" {{ old('gender', $student->gender) == 'f' ? 'selected' : '' }}>Female
                            </option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
