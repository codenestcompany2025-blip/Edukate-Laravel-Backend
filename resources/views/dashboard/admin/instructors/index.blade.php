@extends('dashboard.admin.master')

@section('title', 'Instructors Management')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Instructors Management</h1>

        <a href="{{ route('admin.instructors.create') }}" class="btn add-btn shadow-sm">
            <i class="fas fa-plus mr-1"></i> Add New Instructor
        </a>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>All Instructors</span>

            <span class="text-muted small">
                Showing {{ $instructors->firstItem() ?? 0 }} –
                {{ $instructors->lastItem() ?? 0 }} of
                {{ $instructors->total() }}
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
                            <th>Major</th>
                            <th>Qualification</th>
                            <th>Salary ($)</th>
                            <th>Gender</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($instructors as $instructor)
                            <tr>
                                <td>{{ $instructors->firstItem() + $loop->index }}</td>

                                <td class="font-weight-bold text-primary">
                                    {{ $instructor->name }}
                                </td>

                                <td>{{ $instructor->email }}</td>
                                <td>{{ $instructor->major }}</td>

                                <td>
                                    @php
                                        $qual = [
                                            'd' => 'Diploma',
                                            'b' => 'Bachelor',
                                            'm' => 'Master',
                                            'dr' => 'Doctor',
                                        ];
                                    @endphp
                                    <span>{{ $qual[$instructor->qualification] }}</span>
                                </td>

                                <td>${{ number_format($instructor->salary, 2) }}</td>

                                <td>
                                    @if ($instructor->gender == 'm')
                                        <span class="badge badge-primary">Male</span>
                                    @else
                                        <span class="badge badge-pink">Female</span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('admin.instructors.show', $instructor->id) }}"
                                        class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                        <span class="sr-only">View Instructor</span>
                                    </a>

                                    <a href="{{ route('admin.instructors.edit', $instructor->id) }}"
                                        class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        <span class="sr-only">Edit Instructor</span>
                                    </a>

                                    <form action="{{ route('admin.instructors.destroy', $instructor->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button class="action-btn btn-delete" title="Delete">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                            <span class="sr-only">Delete Instructor</span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    No instructors found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $instructors->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
