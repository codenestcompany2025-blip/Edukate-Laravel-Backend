@extends('dashboard.master')

@section('css')
    <style>
        .quick-action {
            transition: all 0.2s ease-in-out;
            font-weight: bold;
        }

        .quick-action:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .thumb {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('title', 'Admin Dashboard')    

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Admin Dashboard</h1>
    </div>

    {{-- ========================= --}}
    {{-- Summary Cards --}}
    {{-- ========================= --}}
    <div class="row">

        @foreach ([['label' => 'Instructors', 'count' => $instructorsCount, 'color' => 'primary', 'route' => 'admin.instructors.index', 'icon' => 'chalkboard-teacher'], ['label' => 'Students', 'count' => $studentsCount, 'color' => 'success', 'route' => 'admin.students.index', 'icon' => 'user-graduate'], ['label' => 'Courses', 'count' => $coursesCount, 'color' => 'info', 'route' => 'admin.courses.index', 'icon' => 'book-open'], ['label' => 'Categories', 'count' => $categoriesCount, 'color' => 'warning', 'route' => 'admin.categories.index', 'icon' => 'tags']] as $card)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-{{ $card['color'] }} shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">
                                <div class="font-weight-bold text-{{ $card['color'] }} text-uppercase mb-1">
                                    {{ $card['label'] }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $card['count'] }}
                                </div>
                                <div class="mt-2 text-left">
                                    <a href="{{ route($card['route']) }}"
                                        class="text-{{ $card['color'] }} small font-weight-bold">
                                        View All {{ $card['label'] }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="icon-circle bg-{{ $card['color'] }}">
                                    <i class="fas fa-{{ $card['icon'] }} text-white"></i>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{-- Main Content with Right Sidebar --}}
    <div class="row">
        {{-- Left Column: Latest Courses + Students --}}
        <div class="col-lg-9">
            {{-- Latest Courses --}}
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Latest Courses</h6>
                    <a href="{{ route('admin.courses.index') }}" class="small font-weight-bold">View all</a>
                </div>

                <div class="card-body">
                    @forelse ($latestCourses as $course)
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">

                            {{-- Left: Icon + Title + Details --}}
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('uploads/images/courses/' . $course->image->url) }}"
                                    alt="{{ $course->name }}" class="thumb mr-3">

                                <div>
                                    <h6 class="font-weight-bold mb-1">{{ $course->name }}</h6>
                                    <p class="mb-1 text-muted">
                                        Instructor: {{ $course->instructor->name ?? '-' }} ·
                                        Category: {{ $course->category->name ?? '-' }}
                                    </p>
                                    <p class="mb-0 text-muted">
                                        Language: {{ $course->language ?? 'English' }} ·
                                        Level: {{ $course->skill_level ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Right: Price + View Button --}}
                            <div class="text-right">
                                <p class="mb-2 font-weight-bold text-dark">${{ number_format($course->price, 2) }}</p>
                                <a href="{{ route('admin.courses.show', $course->id) }}"
                                    class="btn btn-sm btn-outline-primary small font-weight-bold">
                                    View
                                </a>
                            </div>

                        </div>
                    @empty
                        <p class="text-muted">No recent courses found.</p>
                    @endforelse
                </div>
            </div>
        </div>


        <div class="col-lg-3">
            {{-- Right Column: Quick Actions --}}
            <div class="card mb-4">
                <div class="card-header">Quick Actions</div>
                <div class="card-body">
                    <a href="{{ route('admin.instructors.create') }}"
                        class="btn btn-outline-primary btn-block mb-3 quick-action">
                        <i class="fas fa-user-plus mr-2"></i> New Instructor
                    </a>
                    <a href="{{ route('admin.students.create') }}"
                        class="btn btn-outline-success btn-block mb-3 quick-action">
                        <i class="fas fa-user-graduate mr-2"></i> New Student
                    </a>
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-outline-info btn-block mb-3 quick-action">
                        <i class="fas fa-plus-circle mr-2"></i> New Course
                    </a>
                    <a href="{{ route('admin.categories.create') }}"
                        class="btn btn-outline-warning btn-block quick-action">
                        <i class="fas fa-folder-plus mr-2"></i> New Category
                    </a>
                </div>
            </div>


            {{-- Latest Students --}}
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Latest Students</h6>
                    <a href="{{ route('admin.students.index') }}" class="text-primary small font-weight-bold">View all</a>
                </div>

                <div class="card-body">
                    @forelse ($latestStudents as $student)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">

                            {{-- Left: Icon + Name + Email --}}
                            <div class="d-flex align-items-center">
                                <div class="icon-circle bg-light mr-3">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <h6 class="font-weight-bold mb-1">{{ $student->name }}</h6>
                                    <p class="mb-0 text-muted small">{{ $student->email }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No recent students found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
