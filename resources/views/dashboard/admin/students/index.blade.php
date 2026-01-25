@extends('dashboard.master')

@section('title', 'Students Management')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Students Management</h1>

        <a href="{{ route('admin.students.create') }}" class="btn add-btn shadow-sm">
            <i class="fas fa-plus mr-1"></i> Add New Student
        </a>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>All Students</span>

            <span class="text-muted small">
                Showing {{ $students->firstItem() ?? 0 }} –
                {{ $students->lastItem() ?? 0 }} of
                {{ $students->total() }}
            </span>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Image</th>
                            <th>Date Of Birth</th>
                            <th>Gender</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $students->firstItem() + $loop->index }}</td>

                                <td class="font-weight-bold text-primary">
                                    {{ $student->name }}
                                </td>

                                <td>{{ $student->email }}</td>

                                <td>
                                    @if ($student->image)
                                        <img src="{{ asset('uploads/images/students/' . $student->image->url) }}"
                                            alt="{{ $student->name }}" class="img-thumbnail rounded-circle" width="50"
                                            height="50">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif

                                </td>
                                
                                <td>{{ $student->date_of_birth ? $student->date_of_birth->format('d M Y') : '-' }}</td>

                                <td>
                                    @if ($student->gender == 'm')
                                        <span class="badge badge-primary">Male</span>
                                    @else
                                        <span class="badge badge-pink">Female</span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('admin.students.show', $student->id) }}" class="action-btn btn-view"
                                        title="View">
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                        <span class="sr-only">View Student</span>
                                    </a>

                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="action-btn btn-edit"
                                        title="Edit">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        <span class="sr-only">Edit Student</span>
                                    </a>

                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button class="action-btn btn-delete" title="Delete">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                            <span class="sr-only">Delete Student</span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $students->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
