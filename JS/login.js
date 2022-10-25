$(document).ready(function() {
    toastr.options = {
        'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
    }

    const Url = './Petitions/login.petition.php';
    $('#btnLogin').click(function() {
        $.ajax({
            url: Url,
            type: "POST",
            data: {
                petition: 1,
                usuario: $('#usuario').val(),
                contra: $('#contra').val()
            },
            success: function(result){
                console.log(result);
                if(result == 1){
                    toastr.success('Usuario logueado');
                } else {
                    toastr.error('Usuario y/o contraseña incorrectos');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });
});