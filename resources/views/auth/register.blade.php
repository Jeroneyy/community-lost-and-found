@extends('layouts.guest')

@section('title', 'Register — Community Recovery System')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="max-width: 520px;">
        <div class="text-center mb-4">
            <div class="mb-3">
                <span class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-4 shadow"
                      style="width: 58px; height: 58px; font-size: 1.8rem; box-shadow: 0 10px 25px rgba(37,99,235,0.4) !important;">
                    <i class="bi bi-shield-check"></i>
                </span>
            </div>
            <h3 class="fw-bold text-dark mb-1">Create an Account</h3>
            <p class="text-muted small">Join the Community Recovery System</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-medium">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}"
                           placeholder="Juan Dela Cruz" required autofocus>
                </div>
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-medium">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}"
                           placeholder="your@email.com" required>
                </div>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="barangay_id" class="form-label fw-medium">Barangay</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <select class="form-select @error('barangay_id') is-invalid @enderror"
                            id="barangay_id" name="barangay_id" required>
                        <option value="">Select your barangay</option>
                        @foreach($barangays as $barangay)
                        <option value="{{ $barangay->id }}" {{ old('barangay_id') == $barangay->id ? 'selected' : '' }}>
                            {{ $barangay->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('barangay_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label fw-medium">Phone Number <span class="text-muted">(optional)</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                           id="phone" name="phone" value="{{ old('phone') }}"
                           placeholder="09171234567">
                </div>
                @error('phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="password" class="form-label fw-medium">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" placeholder="Min 8 characters" required>
                    </div>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label fw-medium">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control"
                               id="password_confirmation" name="password_confirmation"
                               placeholder="Confirm password" required>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input @error('terms') is-invalid @enderror"
                           type="checkbox" name="terms" id="terms" value="1" {{ old('terms') ? 'checked' : '' }}>
                    <label class="form-check-label small" for="terms">
                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a>
                        and <a href="#" class="text-decoration-none">Privacy Policy</a>
                    </label>
                    @error('terms')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                <i class="bi bi-person-plus me-2"></i>Create Account
            </button>
        </form>

        <hr class="my-4">

        <p class="text-center text-muted small mb-0">
            Already have an account?
            <a href="{{ route('login') }}" class="text-decoration-none fw-medium">Sign in</a>
        </p>
    </div>
</div>
@endsection
