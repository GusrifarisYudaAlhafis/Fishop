$(document).ready(function () {
    $('.btn-hide-show').click(function () {
        let typeInputSaatIni = $('.inputPassword').attr('type');
        if (typeInputSaatIni == "password") {
            $('.inputPassword').attr('type', 'text');
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $(this).attr('title', 'Hide Password');
        } else if (typeInputSaatIni == "text") {
            $('.inputPassword').attr('type', 'password');
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $(this).attr('title', 'Show Password');
        }
    })
})