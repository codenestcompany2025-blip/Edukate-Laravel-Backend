@extends('dashboard.admin.master')

@section('title', 'Course Management')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Categories Management</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn add-btn shadow-sm">
            <i class="fas fa-plus mr-1"></i> Add New Category
        </a>
    </div>

    <div class="card custom-card mb-4">

        <div class="card-header d-flex justify-content-between">
            <span>All Categories</span>

            <span class="text-muted small">
                Showing {{ $categories->firstItem() ?? 0 }} –
                {{ $categories->lastItem() ?? 0 }} of
                {{ $categories->total() }}
            </span>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $loop->index }}</td>

                                <td class="font-weight-bold text-primary">
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="action-btn btn-edit"
                                        title="Edit">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        <span class="sr-only">Edit Category</span>
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button class="action-btn btn-delete" title="Delete">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                            <span class="sr-only">Delete Category</span>
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    No Categories found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
