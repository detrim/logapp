$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json'
        },
        xhrFields: {
            withCredentials: true  // ✅ CRITICAL: Kirim cookie
        }
    });

    checkAuth();

    $('#logoutBtn').click(function() {
        $.ajax({
            url: '/api/logout',
            method: 'POST',
            xhrFields: { withCredentials: true },
            success: function() {
                window.location.href = '/';
            }
        });
    });

    function checkAuth() {
        $.ajax({
            url: '/api/me',
            method: 'GET',
            xhrFields: { withCredentials: true },
            success: function(response) {
                $('#userEmail').text(response.user.email);
            },
            error: function(xhr) {
                console.log('Auth check failed:', xhr.responseJSON);
                window.location.href = '/';
            }
        });
    }
});
