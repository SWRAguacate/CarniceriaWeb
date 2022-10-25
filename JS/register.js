$(document).ready(function() {
    const Url = 'Controller/register.controller.php';
    $('btnRegister').click(function() {
        $.ajax({
            url: Url,
            type: "POST",
            data: {
                petition: 1,
                usuario: $('usuario').value,
                nombre: $('nombre').value,
                email: $('email').value,
                contra: $('contra').value,
                telefono: $('telefono').value
            },
            success: function(result){
                console.log(result)
            },
            error: function(error){
                console.log(error);
            }
        });
    });
});