$(document).ready(function() {
    const Url = './Petitions/login.petition.php';
    $('#btnLogin').click(function() {
        $.ajax({
            url: Url,
            type: "POST",
            data: {
                petition: 1,
                usuario: $('#usuario').val(),
                email: $('#usuario').val(),
                contra: $('#contra').val()
            },
            success: function(result){
                console.log(result);
                if(result == 1){
                    toastr.success('Usuario logueado');
                } else {
                    toastr.error('Combinación incorrecta');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });
});