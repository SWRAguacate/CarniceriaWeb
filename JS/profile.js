$(document).ready(function() {
    const Url = './Petitions/update_user.petition.php';
    const UrlSuccess = './Petitions/login.petition.php';

    $('#btnUpdate').click(function() {

        if($('#contra2').val() == $('#contra').val() || $('#contra').val() == $('#contraOriginal').val()){

            $.ajax({
                url: Url,
                type: "POST",
                data: {
                    petition: 1,
                    id_usuario: parseInt($('#id_usuario').val()),
                    usuario: $('#usuario').val(),
                    usuarioOriginal: $('#usuarioOriginal').val(),
                    nombre: $('#nombre').val(),
                    email: $('#email').val(),
                    emailOriginal: $('#emailOriginal').val(),
                    contra: $('#contra').val(),
                    telefono: parseInt($('#telefono').val())
                },
                success: function(result){
                    console.log(result);
                    if(result == 1){
                        toastr.success('Usuario actualizado');
                        $.ajax({
                            url: UrlSuccess,
                            type: "POST",
                            data: {
                                petition: 1,
                                usuario: $('#usuario').val(),
                                email: $('#email').val(),
                                contra: $('#contra').val()
                            },
                            success: function(result){
                                console.log(result);
                            },
                            error: function(error){
                                console.log(error);
                            }
                        });
                        alert('Usuario actualizado');
                        window.location.href = "http://localhost/CarniceriaWeb/profile.php";
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