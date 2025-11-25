@extends('admin.master')
@section('title')
    Edukate | Categories Management
@endsection
@section('content')
    {{-- Add Modal --}}
    <div class="modal fade" id="add-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Add New Category</h5>
                    <button type="button" class="btn-close ms-0" data-dismiss="modal"></button>
                </div>

                <form id="add-form" method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="modal-body px-4">
                        <div class="row g-4">
                            <div class="col-md-4 w-100">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 px-4 pb-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="update-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Edit Category</h5>
                    <button type="button" class="btn-close ms-0" data-dismiss="modal"></button>
                </div>

                <form id="update-form" method="POST" action="{{ route('admin.categories.update') }}">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="modal-body px-4">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4 rounded-4">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="fw-bold mb-0">Categories</h5>

            <button class="btn btn-primary btn-lg w-100 mt-4" data-toggle="modal" data-target="#add-modal">
                Add New Category
            </button>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="fw-bold mb-0">Categories</h5>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table id="datatable" class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- AJAX Data Here --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var table = $('#datatable').DataTable({
            searching: false,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: ' {{ route('admin.categories.getData') }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    title: 'Name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    title: 'Actions',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        $(document).ready(function() {
            $(document).on('click', '.btn-update', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#id').val(id);
                $('#name').val(name);
            })
        });
    </script>
@endsection
