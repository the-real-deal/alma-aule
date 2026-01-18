$(document).ready(function () {
    const url = document.location.href;
    
    // Get the current page filename
    const currentPage = url.split('/').pop().split('?')[0] || 'index.html';
    
    // Find navbar links and add 'active' class to matching one
    $('.navbar a.nav-link').each(function () {
        const linkHref = $(this).attr('href');
        const linkPage = linkHref.split('/').pop().split('?')[0];
        if (linkPage === currentPage || linkHref === url) {
            $(this).addClass('active');
        }
    });
});