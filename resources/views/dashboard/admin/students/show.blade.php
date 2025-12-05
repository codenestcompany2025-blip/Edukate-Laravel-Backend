@extends('dashboard.admin.master')

@section('title', 'Student Details')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Student Profile</h1>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card custom-card shadow-sm mb-4">
        <div class="card-header bg-primary d-flex align-items-center">
            <i class="fas fa-user-circle fa-lg mr-2"></i>
            <h5 class="mb-0"><strong>{{ $student->name }}</strong></h5>
        </div>

        <div class="card-body">
            <div class="row g-4 align-items-center">
                @if ($student->profile_image)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('uploads/images/students/' . $student->profile_image) }}"
                            alt="{{ $student->name }}" class="img-fluid rounded-circle shadow-sm border" width="300"
                            height="300">
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p><i class="fas fa-envelope mr-2 text-muted"></i><strong>Email:</strong><br>
                                {{ $student->email }}
                            </p>
                            <p><i class="fas fa-calendar-alt mr-2 text-muted"></i><strong>Date of Birth:</strong><br>
                                {{ $student->date_of_birth->format('d M Y') }}
                            </p>
                            <p><i class="fas fa-venus-mars mr-2 text-muted"></i><strong>Gender:</strong><br>
                                {{ $student->gender == 'm' ? 'Male' : 'Female' }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <p><i class="fas fa-clock mr-2 text-muted"></i><strong>Created At:</strong><br>
                                {{ $student->created_at->format('d M Y') }}
                            </p>
                            <p><i class="fas fa-sync-alt mr-2 text-muted"></i><strong>Updated At:</strong><br>
                                {{ $student->updated_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning mr-2">
            <i class="fas fa-edit"></i> Edit
        </a>

        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this student?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>

@endsection
