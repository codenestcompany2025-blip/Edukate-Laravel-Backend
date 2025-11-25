@extends('admin.master')
@section('title')
    Edukate | Courses Management
@endsection
@section('content')
    {{-- Add Modal --}}
    <div class="modal fade" id="add-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Add New Course</h5>
                    <button type="button" class="btn-close ms-0" data-dismiss="modal"></button>
                </div>

                <form id="add-form" method="POST" action="{{ route('admin.courses.store') }}">
                    @csrf
                    <div class="modal-body px-4">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="10"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Skill Level</label>
                                <select name="skill_level" class="form-control">
                                    <option selected disabled>Choose Skill Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Instructor</label>
                                <select name="instructor_id" class="form-control">
                                    <option selected disabled>Choose Instructor</option>
                                    @foreach ($instructors as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option selected disabled>Choose Category</option>
                                    @foreach ($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
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

                <form id="update-form" method="POST" action="{{ route('admin.courses.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="modal-body px-4">
                        <div class="row g-4">

                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Description</label>
                                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Price</label>
                                <input type="number" name="price" id="price" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Skill Level</label>
                                <select name="skill_level" id="skill_level" class="form-control">
                                    <option selected disabled>Choose Skill Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Instructor</label>
                                <select name="instructor_id" id="instructor_id" class="form-control">
                                    <option selected disabled>Choose Instructor</option>
                                    @foreach ($instructors as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected disabled>Choose Category</option>
                                    @foreach ($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label>Image</label>
                                <input type="file" name="image" id="image" class="form-control">
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
            <div class="row g-4">

                <div class="col-md-3">
                    <input type="text" id="search-name" class="form-control form-control-lg search-input"
                        placeholder="Search By Name">
                </div>

                <div class="col-md-3">
                    <select id="search-skill" class="form-control form-control-lg search-input-select">
                        <option selected disabled>Search By Skill Level</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select id="search-instructor" class="form-control form-control-lg search-input-select">
                        <option selected disabled>Search By Instructor</option>
                        @foreach ($instructors as $i)
                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select id="search-category" class="form-control form-control-lg search-input-select">
                        <option selected disabled>Search By Category</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <button id="search-btn" class="btn btn-success btn-lg px-5">search</button>
                <button id="clear-btn" class="btn btn-light btn-lg px-5">clean</button>
            </div>

            <button class="btn btn-primary btn-lg w-100 mt-4" data-toggle="modal" data-target="#add-modal">
                Add New Course
            </button>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white border-0 pt-4">
            <h5 class="fw-bold mb-0">courses</h5>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table id="datatable" class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Skill Level</th>
                            <th>Image</th>
                            <th>Insructor</th>
                            <th>Category</th>
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
                url: ' {{ route('admin.courses.getData') }}',
                // From Here Request Comes
                data: function(n) {
                    n.name = $('#search-name').val();
                    n.instructor = $('#search-instructor').val();
                    n.category = $('#search-category').val();
                    n.skill = $('#search-skill').val();
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
                    data: 'description',
                    name: 'description',
                    title: 'Description',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'price',
                    name: 'price',
                    title: 'Price',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'skill_level',
                    name: 'skill_level',
                    title: 'Skill Level',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'image',
                    name: 'image',
                    title: 'Image',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'instructor_id',
                    name: 'instructor_id',
                    title: 'Instructor',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'category_id',
                    name: 'category_id',
                    title: 'Category',
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
                var description = $(this).data('description');
                var price = $(this).data('price');
                var skill_level = $(this).data('skill-level');
                var instructor_id = $(this).data('instructor-id');
                var category_id = $(this).data('category-id');
                $('#id').val(id);
                $('#name').val(name);
                $('#description').val(description);
                $('#price').val(price);
                $('#skill_level').val(skill_level);
                $('#instructor_id').val(instructor_id);
                $('#category_id').val(category_id);
            })
        });
    </script>
@endsection
