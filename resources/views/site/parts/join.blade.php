<!-- Join Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Want To Join Us?
                    </h6>
                    <h1 class="display-4">Enter Your Personal Details</h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success"
                        style="margin-bottom: 20px; padding: 15px; background-color: #d4edda; color: #155724; border-radius: 5px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <script>
                        window.location.hash = '#joinus-form';
                    </script>
                @endif

                <div class="contact-form">
                    <form method="POST" action="{{ route('site.join.submit') }}" id="joinus-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name"
                                class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Your Name" required="required">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email"
                                class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Your Email" required="required">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password"
                                class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" placeholder="Password" required="required">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation"
                                class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                placeholder="Password Confirmation" required="required">
                        </div>
                        <div class="form-group">
                            <select name="gender"
                                class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('gender') is-invalid @enderror"
                                required="required">
                                <option value="">Your Gender</option>
                                <option value="m" {{ old('gender') == 'm' ? 'selected' : '' }}>Male</option>
                                <option value="f" {{ old('gender') == 'f' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="date" name="date_of_birth"
                                class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}" placeholder="Your Date Of Birth"
                                required="required">
                            @error('date_of_birth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit">Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Join End -->
