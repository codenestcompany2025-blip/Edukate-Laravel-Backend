@extends('dashboard.master')

@section('title', 'Students - Courses Management')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Students - Courses Management</h1>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>All Students - Courses</span>

            <span class="text-muted small">
                Showing {{ $studentCourses->firstItem() ?? 0 }} –
                {{ $studentCourses->lastItem() ?? 0 }} of
                {{ $studentCourses->total() }}
            </span>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Enrolled At</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($studentCourses as $studentCourse)
                            <tr>
                                <td>{{ $studentCourses->firstItem() + $loop->index }}</td>
                                <td class="font-weight-bold text-primary">
                                    {{ $studentCourse->student->name }}
                                </td>
                                <td>{{ $studentCourse->course->name }}</td>
                                <td>{{ $studentCourse->created_at->format('d M Y') }}</td>
                                <td>

                                    <a href="{{ route('admin.student_courses.edit', $studentCourse->id) }}" class="action-btn btn-edit"
                                        title="Edit">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        <span class="sr-only">Edit Student</span>
                                    </a>

                                    <form action="{{ route('admin.student_courses.destroy', $studentCourse->id) }}" method="POST"
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
                                <td colspan="5" class="text-center text-muted py-4">
                                    No student - course records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $studentCourses->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
