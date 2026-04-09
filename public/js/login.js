$(document).ready(function() {
    let showPassword = false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    // Toggle password visibility
    $('#togglePassword').click(function() {
        const passwordField = $('#password');
        showPassword = !showPassword;
        passwordField.attr('type', showPassword ? 'text' : 'password');
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });

    // Login form submission
    $('#loginForm').submit(function(e) {

        e.preventDefault();
        clearMessages();
        setLoading(true);

        const formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            url: '/api/login',
            method: 'POST',
            data: formData,
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                setLoading(false);
                showSuccess('Login berhasil! Redirecting...');
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 1500);
            },
            error: function(xhr) {
                setLoading(false);
                const response = xhr.responseJSON;

                if (xhr.status === 422) {
                    // Validation errors
                    $.each(response.errors, function(field, messages) {
                        $(`#${field}`).addClass('is-invalid').siblings('.invalid-feedback').text(messages[0]);
                    });
                } else {
                    showError(response.message || 'Login gagal!');
                }
            }
        });
    });

    function setLoading(loading) {
        const btn = $('#loginBtn');
        const spinner = btn.find('.spinner-border');
        if (loading) {
            spinner.removeClass('d-none');
            btn.prop('disabled', true);
        } else {
            spinner.addClass('d-none');
            btn.prop('disabled', false);
        }
    }

    function clearMessages() {
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        $('#errorMessage, #successMessage').addClass('d-none');
    }

    function showError(message) {
        $('#errorMessage').text(message).removeClass('d-none');
    }

    function showSuccess(message) {
        $('#successMessage').text(message).removeClass('d-none');
    }
});
