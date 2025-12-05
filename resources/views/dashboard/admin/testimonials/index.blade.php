@extends('dashboard.admin.master')

@section('title', 'Testimonials Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">Testimonials Management</h1>

    <a href="{{ route('admin.testimonials.create') }}" class="btn add-btn shadow-sm">
        <i class="fas fa-plus mr-1"></i> Add New Testimonial
    </a>
</div>

<div class="card custom-card mb-4">

    <div class="card-header d-flex justify-content-between">
        <span>All Testimonials</span>

        <span class="text-muted small">
            Showing {{ $testimonials->firstItem() ?? 0 }} –
            {{ $testimonials->lastItem() ?? 0 }} of
            {{ $testimonials->total() }}
        </span>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered mb-0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Specialization</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th width="150px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonials->firstItem() + $loop->index }}</td>

                            <td class="font-weight-bold text-primary">
                                {{ $testimonial->student_name }}
                            </td>

                            <td>{{ $testimonial->specialization }}</td>

                            <td class="text-muted">
                                {{ Str::limit($testimonial->comment, 80) }}
                            </td>

                            <td>{{ $testimonial->created_at->format('d M Y') }}</td>

                            <td>

                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                   class="action-btn btn-edit" title="Edit">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                    <span class="sr-only">Edit Testimonial</span>
                                </a>

                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button class="action-btn btn-delete" title="Delete">
                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                        <span class="sr-only">Delete Testimonial</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No testimonials found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            {{ $testimonials->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>

@endsection