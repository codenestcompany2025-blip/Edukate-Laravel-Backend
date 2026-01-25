@extends('dashboard.master')

@section('title', 'Instructor Details')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Instructor Profile</h1>
        <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card custom-card shadow-sm mb-4">
        <div class="card-header bg-primary d-flex align-items-center">
            <i class="fas fa-user-circle fa-lg mr-2"></i>
            <h5 class="mb-0"><strong>{{ $instructor->name }}</strong></h5>
        </div>
        <div class="card-body">
            <div class="row g-4 align-items-center">
                @if ($instructor->image)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('uploads/images/instructors/' . $instructor->image->url) }}"
                            alt="{{ $instructor->name }}" class="img-fluid rounded-circle shadow-sm border" width="300"
                            height="300">
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p><i class="fas fa-envelope mr-2 text-muted m"></i><strong>Email:</strong>
                                {{ $instructor->email }}</p>
                            <p><i class="fas fa-book-open mr-2 text-muted"></i><strong>Major:</strong>
                                {{ $instructor->major }}</p>
                            <p><i class="fas fa-award mr-2 text-muted"></i><strong>Qualification:</strong>
                                @switch($instructor->qualification)
                                    @case('d')
                                        Diploma
                                    @break

                                    @case('b')
                                        Bachelor
                                    @break

                                    @case('m')
                                        Master
                                    @break

                                    @case('dr')
                                        Doctor
                                    @break

                                    @default
                                        Unknown
                                @endswitch
                            </p>
                            <p><i class="fas fa-money-bill-wave mr-2 text-muted"></i><strong>Salary:</strong>
                                ${{ number_format($instructor->salary, 2) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-venus-mars mr-2 text-muted"></i><strong>Gender:</strong>
                                {{ $instructor->gender == 'm' ? 'Male' : 'Female' }}
                            </p>
                            <p><i class="fas fa-clock mr-2 text-muted"></i><strong>Created At:</strong>
                                {{ $instructor->created_at->format('d M Y') }}</p>
                            <p><i class="fas fa-sync-alt mr-2 text-muted"></i><strong>Updated At:</strong>
                                {{ $instructor->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.instructors.edit', $instructor->id) }}"
                    class="btn btn-warning d-flex align-items-center justify-content-center mr-2"
                    style="width: 40px; height: 40px;" title="Edit">
                    <i class="fas fa-edit" aria-hidden="true"></i>
                    <span class="sr-only">Edit</span>
                </a>

                <form action="{{ route('admin.instructors.destroy', $instructor->id) }}" method="POST"
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
        </div>
    </div>

@endsection
