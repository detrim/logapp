@extends('layouts.app')

@section('content')
    <div class="min-vh-100 bg-light">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <div class="navbar-nav ms-auto">
                    <button class="btn btn-outline-light" id="logoutBtn">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </button>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0 fw-bold">
                                <i class="fas fa-chart-line me-2"></i>Selamat Datang!
                            </h4>
                        </div>
                        <div class="card-body p-5">
                            <div class="row text-center">
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 border-primary border-3 shadow">
                                        <div class="card-body">
                                            <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                                            <h5 class="card-title fw-bold">Profil</h5>
                                            <p class="text-muted" id="userEmail">-</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 bg-success bg-gradient text-white shadow">
                                        <div class="card-body">
                                            <i class="fas fa-shield-alt fa-3x mb-3 opacity-75"></i>
                                            <h5 class="card-title fw-bold">Status</h5>
                                            <h3 class="fw-bold">Login Berhasil</h3>
                                            <p class="mb-0 opacity-75">JWT Token Aktif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/dashboard.js') }}"></script>
    @endpush
@endsection
