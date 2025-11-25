@extends('admin.master')
@section('title')
    Edukate | Instructors Management
@endsection
@section('content')
    {{-- Add Modal --}}
    <div class="modal fade" id="add-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Add New Instructor</h5>
                    <button type="button" class="btn-close ms-0" data-dismiss="modal"></button>
                </div>

                <form id="add-form" method="POST" action="{{ route('admin.instructors.store') }}">
                    @csrf
                    <div class="modal-body px-4">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <div class="invalid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Qualification</label>
                                <select name="qual" class="form-control">
                                    <option selected disabled>Choose Qualification</option>
                                    <option value="d">Diploma</option>
                                    <option value="b">Bachelor’s</option>
                                    <option value="m">Master’s</option>
                                    <option value="dr">Doctorate</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Major</label>
                                <input type="text" name="major" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option selected disabled>Choose Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Salary</label>
                                <input type="number" name="salary" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Add</button>
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
                    <h5 class="modal-title fw-bold">Edit Instructor</h5>
                    <button type="button" class="btn-close ms-0" data-dismiss="modal"></button>
                </div>

                <form id="update-form" method="POST" action="{{ route('admin.instructors.update') }}">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="modal-body px-4">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <div class="invalid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Qualification</label>
                                <select name="qual" id="qual" class="form-control">
                                    <option selected disabled>Choose Qualification</option>
                                    <option value="d">Diploma</option>
                                    <option value="b">Bachelor’s</option>
                                    <option value="m">Master’s</option>
                                    <option value="dr">Doctorate</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Major</label>
                                <input type="text" name="major" id="major" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected disabled>Choose Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Salary</label>
                                <input type="number" name="salary" id="salary" class="form-control">
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

    {{-- Filter Section --}}
    <div class="card shadow-sm border-0 mb-4 rounded-4">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="fw-bold mb-0">Filter</h5>
        </div>

        <div class="card-body pt-0 px-4 pb-4">
            <div class="row g-3">

                <div class="col-md-4">
                    <input type="text" id="search-name" class="form-control form-control-lg search-input"
                        placeholder="Name">
                </div>

                <div class="col-md-4">
                    <input type="email" id="search-email" class="form-control form-control-lg search-input"
                        placeholder="Email">
                </div>

                <div class="col-md-4">
                    <input type="text" id="search-phone" class="form-control form-control-lg search-input"
                        placeholder="Phone">
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="search-btn" class="btn btn-success btn-lg px-5">search</button>
                <button id="clear-btn" class="btn btn-light btn-lg px-5">clean</button>
            </div>

            <button class="btn btn-primary btn-lg w-100 mt-4" data-toggle="modal" data-target="#add-modal">
                Add New Instructor
            </button>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="fw-bold mb-0">Instructors</h5>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table id="datatable" class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Major</th>
                            <th>Qualification</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>Salary</th>
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
                url: ' {{ route('admin.instructors.getData') }}',
                // From Here Request Comes
                data: function(n) {
                    n.name = $('#search-name').val();
                    n.email = $('#search-email').val();
                    n.phone = $('#search-phone').val();
                }
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
                    data: 'email',
                    name: 'email',
                    title: 'Email',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'major',
                    name: 'major',
                    title: 'Major',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'qualification',
                    name: 'qualification',
                    title: 'Qualification',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'phone',
                    name: 'phone',
                    title: 'Phone',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'gender',
                    name: 'gender',
                    title: 'Gender',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'salary',
                    name: 'salary',
                    title: 'Salary',
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
                var email = $(this).data('email');
                var major = $(this).data('major');
                var qual = $(this).data('qual');
                var phone = $(this).data('phone');
                var gender = $(this).data('gender');
                var salary = $(this).data('salary');
                $('#id').val(id);
                $('#name').val(name);
                $('#email').val(email);
                $('#major').val(major);
                $('#qual').val(qual);
                $('#phone').val(phone);
                $('#gender').val(gender);
                $('#salary').val(salary);
            })
        });
    </script>
@endsection
