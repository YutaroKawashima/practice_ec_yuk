$(function () {
    $('.modal_open').on('click', function () {
        var target = $(this).data('target');
        var modal = document.getElementById(target);
        $('.modal').fadeIn();
        return false;
    });

    $('.modal_close').on('click', function () {
        $('.modal').fadeOut();
        return false;
    });

    $('#confirm').on('click', function() {
        $('#register_form').submit();
    });

})
