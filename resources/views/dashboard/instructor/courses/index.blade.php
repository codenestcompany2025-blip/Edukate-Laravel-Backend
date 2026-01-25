@extends('dashboard.master')

@section('title', 'My Courses')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">My Courses</h1>
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
                            <th>Category</th>
                            <th>Price ($)</th>
                            <th>Duration (hrs)</th>
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

                                <td>{{ $course->category->name ?? 'N/A' }}</td>

                                <td>${{ number_format($course->price, 2) }}</td>

                                <td>{{ $course->duration }}</td>

                                <td>
                                    <a href="{{ route('instructor.course.lectures.index', $course) }}" class="action-btn btn-view"
                                        title="View Lectures">
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                        <span class="sr-only">View Lectures</span>
                                    </a>

                                    <a href="{{ route('instructor.course.students', $course->id) }}" class="action-btn btn-view"
                                        title="View Enrolled Students">
                                        <i class="fas fa-users" aria-hidden="true"></i>
                                        <span class="sr-only">View Enrolled Students</span>
                                    </a>
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
