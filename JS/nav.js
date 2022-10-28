$(document).ready(function() {
    const Url = './Petitions/search_name.petition.php';
    $('#btnSearch').click(function() {
        if($('#nameSearch').val() != "")
        {
            $.ajax({
                url: Url,
                type: "POST",
                data: {
                    petition: 1,
                    nombre: $('#nameSearch').val()
                },
                success: function(result){
                    if(result == 1){
                        window.location.href = "http://localhost/CarniceriaWeb/index.php";
                    } else {
                        toastr.error('Error en la petición');
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        } else {
            toastr.waring('Introduzca un nombre');
        }
    });
});