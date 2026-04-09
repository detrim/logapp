$(document).ready(function() {
    // ✅ Setup CSRF + credentials
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        xhrFields: {
            withCredentials: true  // ✅ Kirim cookie
        }
    });

    checkAuth();
    $('#logoutBtn').click(logout);

    function checkAuth() {
        $.ajax({
            url: '/api/me',
            method: 'GET',
            success: function(response) {
                $('#userEmail').text(response.user.email);
            },
            error: function() {
                window.location.href = '/';
            }
        });
    }

    function logout() {
        $.ajax({
            url: '/api/logout',
            method: 'POST',
            success: function() {
                window.location.href = '/';
            }
        });
    }
});
