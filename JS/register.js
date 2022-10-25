$(document).ready(function() {
    const Url = './Petitions/register.petition.php';
    $('#btnRegister').click(function() {

        if($('#contra2').val() == $('#contra').val()){
            $.ajax({
                url: Url,
                type: "POST",
                data: {
                    petition: 1,
                    usuario: $('#usuario').val(),
                    nombre: $('#nombre').val(),
                    email: $('#email').val(),
                    contra: $('#contra').val(),
                    telefono: $('#telefono').val()
                },
                success: function(result){
                    console.log(result);
                    if(result == 1){
                        toastr.success('Usuario registrado');
                    } else {
                        toastr.error('Usuario y/o correo en uso');
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        } else {
            toastr.warning('Favor de hacer coincidir las contraseñas');
        }
    });

    $('#contra2').on('input',function(e){
        if($('#contra2').val() != $('#contra').val()){
            $('#contra2').css("border", "5px solid red");
        } else {
            $('#contra2').css("border", "5px solid green");
        }
       });
        
});