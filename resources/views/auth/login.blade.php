<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container container-custom">
        <div class="card card-custom mx-auto" style="max-width: 420px;">
            <div class="text-center mb-3">
                <span class="badge bg-light text-dark py-2 px-3 mb-2">
                    @if ($guard === 'admin')
                        👑 Admin Login
                    @elseif ($guard === 'instructor')
                        🎓 Instructor Login
                    @elseif ($guard === 'student')
                        📘 Student Login
                    @endif
                </span>
                <h5 class="fw-bold">Sign in to {{ Str::title($guard) }}</h5>
                <p class="text-muted small">
                    @switch($guard)
                        @case('admin')
                            Manage users, settings, and permissions.
                        @break

                        @case('instructor')
                            Access your teaching tools and track student progress.
                        @break

                        @case('student')
                            View your courses, assignments, and grades.
                        @break

                        @default
                            Log in to your account securely.
                    @endswitch
                </p>
            </div>

            <form method="POST" action="{{ route($guard.'.login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control">
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                    <small class="d-block text-end mt-1"><a href="#" class="text-decoration-none">Forgot
                            password?</a></small>
                </div>

                <div class="form-check mb-3">
                    <input name="remember" type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button class="btn btn-admin w-100 btn-custom" type="submit">
                    <i class="bi bi-box-arrow-in-right"></i> Sign in
                </button>
                <div class="text-center mt-3">
                    <a href="{{ route('role.selection') }}" class="text-decoration-none small text-muted">Back to role
                        selection</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
