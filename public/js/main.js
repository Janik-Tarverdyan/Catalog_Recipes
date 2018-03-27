$(document).ready(function () {
    $('#btn_login').on('click',function () {
        // $('#signin').css('display','none');
        // $('#signup').css('display','flex');
        // $('#user').css('display','flex');
        // $('#repeat').css('display','flex');
        $('#in').css('display','none');
        $('#up').css('display','block');
    });

    $('#btn_register').on('click',function () {
        // $('#signin').css('display','flex');
        // $('#signup').css('display','none');
        // $('#user').css('display','none');
        // $('#repeat').css('display','none');
        $('#up').css('display','none');
        $('#in').css('display','block');
    })
});