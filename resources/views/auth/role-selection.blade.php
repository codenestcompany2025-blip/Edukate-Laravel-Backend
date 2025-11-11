<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container container-custom text-center">
        <h4 class="mb-4 text-white fw-bold">Who wants to log in?</h4>
        <p class="text-light mb-5">Select your account type to continue to the login page.</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom">
                    <h5>Administrator</h5>
                    <p class="text-muted small">Manage users, and permissions.</p>
                    <a href="{{ route('admin.login') }}" class="btn btn-custom btn-admin w-100">
                        <i class="bi bi-box-arrow-in-right"></i> Continue as Admin
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <h5>Instructor</h5>
                    <p class="text-muted small">Manage courses and student grades.</p>
                    <a href="{{ route('instructor.login') }}" class="btn btn-custom btn-instructor w-100">
                        <i class="bi bi-box-arrow-in-right"></i> Continue as Instructor
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <h5>Student</h5>
                    <p class="text-muted small">Access lessons and assignments.</p>
                    <a href="{{ route('student.login') }}" class="btn btn-custom btn-student w-100">
                        <i class="bi bi-box-arrow-in-right"></i> Continue as Student
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-4 gap-2">
            <h4 class="text-white fw-bold mb-0">Don't have an account?</h4>
            <a href="{{ route('register') }}" class="btn btn-custom text-light">
                <i class="bi bi-box-arrow-in-right"></i> Sign Up
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
