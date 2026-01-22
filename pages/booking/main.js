$(document).on('click', 'a[id^="aula-"]', function(e) {
    e.preventDefault();
    window.location.href = '/pages/booking/schedule/';
});