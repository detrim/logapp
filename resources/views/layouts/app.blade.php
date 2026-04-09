<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Dark Mode Toggle -->
    <button id="darkModeToggle" class="btn btn-sm position-fixed btn-secondary"
        style="top: 60px; right: 20px; z-index: 9999; border-radius: 50%; width: 35px; height: 35px;">
        <i class="fas fa-moon"></i>
    </button>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    @stack('scripts')
</body>

</html>
