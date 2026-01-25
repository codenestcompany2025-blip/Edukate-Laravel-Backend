@extends('dashboard.master')

@section('title', 'My Students')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">My Students in {{ $course->name }}</h1>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>Students Enrolled in {{ $course->name }}</span>

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
                            <th>Gender</th>
                            <th>Date Of Birth</th>
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
                                    @if ($student->gender == 'm')
                                        <span class="badge badge-primary">Male</span>
                                    @else
                                        <span class="badge badge-pink">Female</span>
                                    @endif
                                </td>

                                <td>{{ $student->date_of_birth?->format('d M Y') ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    No Students Enrolled Yet.
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
