@extends('dashboard.admin.master')

@section('title', 'Courses Management')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Courses Management</h1>

        <a href="{{ route('admin.courses.create') }}" class="btn add-btn shadow-sm">
            <i class="fas fa-plus mr-1"></i> Add New Course
        </a>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>All courses</span>

            <span class="text-muted small">
                Showing {{ $courses->firstItem() ?? 0 }} –
                {{ $courses->lastItem() ?? 0 }} of
                {{ $courses->total() }}
            </span>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price ($)</th>
                            <th>Duration (hrs)</th>
                            <th>Skill Level</th>
                            <th>Image</th>
                            <th>Instructor</th>
                            <th>Category</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <td>{{ $courses->firstItem() + $loop->index }}</td>

                                <td class="font-weight-bold text-primary">
                                    {{ $course->name }}
                                </td>

                                <td>{{ Str::limit($course->description, 50) }}</td>

                                <td>${{ number_format($course->price, 2) }}</td>

                                <td>{{ $course->duration }} hrs</td>

                                <td>
                                    <span class="badge badge-info text-capitalize">
                                        {{ $course->skill_level }}
                                    </span>
                                </td>

                                <td>
                                    @if ($course->image)
                                        <img src="{{ asset('uploads/images/courses/' . $course->image) }}"
                                            alt="{{ $course->name }}" class="img-thumbnail" width="60" height="60">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>

                                <td>{{ $course->instructor->name ?? 'N/A' }}</td>

                                <td>{{ $course->category->name ?? 'N/A' }}</td>

                                <td>
                                    <a href="{{ route('admin.courses.show', $course->id) }}" class="action-btn btn-view"
                                        title="View">
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                        <span class="sr-only">View Course</span>
                                    </a>

                                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="action-btn btn-edit"
                                        title="Edit">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        <span class="sr-only">Edit Course</span>
                                    </a>

                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button class="action-btn btn-delete" title="Delete">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                            <span class="sr-only">Delete Course</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    No Courses found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $courses->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
