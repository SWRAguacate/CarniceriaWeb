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
                if(result == 1){
                    toastr.success('Usuario logueado');
                    alert('Usuario logueado');
                    window.location.href = "http://localhost/CarniceriaWeb/index.php";
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