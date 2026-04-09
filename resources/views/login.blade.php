@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center min-vh-100 py-4">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">Login</h2>
                            <p class="text-muted">Masuk ke akun Anda</p>
                        </div>

                        <form id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div id="errorMessage" class="alert alert-danger d-none" role="alert"></div>
                            <div id="successMessage" class="alert alert-success d-none" role="alert"></div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2" id="loginBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                Masuk
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <small class="text-muted">Demo: admin@demo.com / password123</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/login.js') }}"></script>
    @endpush
@endsection
