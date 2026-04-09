// Dark Mode Toggle
$('#darkModeToggle').click(function() {
    $('html').toggleClass('dark');
    const isDark = $('html').hasClass('dark');
    $(this).find('i').removeClass('fa-moon fa-sun').addClass(isDark ? 'fa-sun' : 'fa-moon');
    localStorage.setItem('darkMode', isDark);
});

// Load saved theme
$(document).ready(function() {
    if (localStorage.getItem('darkMode') === 'true') {
        $('html').addClass('dark');
        $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
    }
});

// Global loading
function showLoading() {
    if ($('#loadingOverlay').length === 0) {
        $('body').append(`
            <div id="loadingOverlay" class="loading-overlay">
                <div class="spinner"></div>
            </div>
        `);
    }
    $('#loadingOverlay').show();
}

function hideLoading() {
    $('#loadingOverlay').hide();
}
