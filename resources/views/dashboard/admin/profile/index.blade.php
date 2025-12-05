@extends('dashboard.admin.master')

@section('title', 'Admin Profile')

@section('content')
    <style>
        /* Page background like screenshot */
        body,
        .page-bg {
            background: #f6f7fb;
        }

        /* Card container */
        .profile-card {
            width: 520px;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(34, 50, 84, 0.08);
            border: 1px solid rgba(34, 50, 84, 0.04);
            background: #ffffff;
        }

        /* Header: subtle pale-blue band and centered title */
        .profile-card .card-header {
            background: #fbfbfe;
            /* very pale */
            border-bottom: 1px solid #eef1f6;
            text-align: center;
            padding: 14px 16px;
        }

        .profile-card .card-header h5 {
            margin: 0;
            font-weight: 600;
            color: #4a62d9;
            /* blue title */
            font-size: 14px;
            letter-spacing: 0.2px;
        }

        /* Avatar circle */
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            color: #e6e6e6;
            /* grey circle */
            margin: 18px auto 8px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Name & email in center area */
        .profile-name {
            margin-bottom: 6px;
            font-weight: 700;
            color: #555e6a;
            /* slightly warm grey */
            font-size: 18px;
        }

        .profile-label {
            font-weight: 700;
            color: #555e6a;
            margin-right: 8px;
            font-size: 18px;
        }

        .profile-email {
            margin: 0;
            color: #9aa3ad;
            font-size: 13px;
        }

        /* thin section divider like screenshot */
        .thin-divider {
            height: 1px;
            background: #eef1f6;
            margin: 18px 0;
        }

        /* Edit button style (rounded small blue) */
        .edit-btn {
            background: #4a62d9;
            border-color: #4a62d9;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 3px 0 rgba(74, 98, 217, 0.12);
        }

        .edit-btn i {
            margin-right: 6px;
            vertical-align: -1px;
        }

        /* ensure card is vertically spaced like screenshot */
        .profile-wrap {
            padding: 48px 0;
        }
    </style>

    <div class="container profile-wrap">
        <h3 class="mb-4" style="font-weight:500; color:#6b7280;">Admin Profile</h3>

        <div class="d-flex justify-content-center">
            <div class="profile-card">

                <div class="card-header">
                    <h4>Your Profile</h4>
                </div>

                <div class="card-body text-center px-4">

                    <div class="profile-avatar">
                        <img src="{{ Avatar::create($admin->name)->toBase64() }}" alt="avatar" class="rounded-circle">
                    </div>

                    <div>
                        <div class="profile-name">{{ $admin->name ?? 'admin' }}</div>
                        <p class="profile-email">{{ $admin->email ?? 'admin@gmail.com' }}</p>
                    </div>

                    <div class="thin-divider"></div>

                    <div class="px-3">
                        <div class="mb-2 d-flex">
                            <div class="profile-label">Name:</div>
                            <div>{{ $admin->name ?? 'admin' }}</div>
                        </div>

                        <div class="mb-2 d-flex">
                            <div class="profile-label">Email:</div>
                            <div>{{ $admin->email ?? 'admin@gmail.com' }}</div>
                        </div>
                    </div>



                    <div class="thin-divider"></div>

                    <div class="d-flex justify-content-center mb-3">
                        <a href="{{ route('admin.profile.edit') }}" class="btn edit-btn">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                            Edit Profile
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
