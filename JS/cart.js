$(document).ready(function() {
    const UrlDelete = './Petitions/delete_product_cart.petition.php';
    const UrlPay = './Petitions/checkout_cart.petition.php';

    if(parseInt($('#pcd').val()) == 0)
    {
        $('#btnPagarCarrito').attr('disabled', true);
    }

    $("button[name = 'btnDeleteProductCart']").click(function(event) {
        var id_p_c = $(event.target).find("#id_producto_carrito").val();

        $.ajax({
            url: UrlDelete,
            type: "POST",
            data: {
                petition: 1,
                id_producto_carrito: id_p_c
            },
            success: function(result){
                if(result == 1){
                    toastr.success('Producto eliminado del carrito');
                    alert('Producto eliminado del carrito');
                    window.location.href = "http://localhost/CarniceriaWeb/cart.php";
                } else {
                    toastr.error('Error en la petición');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('#btnPagarCarrito').click(function() {
        $.ajax({
            url: UrlPay,
            type: "POST",
            data: {
                petition: 1,
                id_usuario: $('#id_usuario').val(),
                id_carrito: $('#id_carrito').val()
            },
            success: function(result){
                if(result == 1){
                    toastr.success('Producto agregado al carrito');
                    alert('Carrito pagado');
                    window.location.href = "http://localhost/CarniceriaWeb/index.php";
                } else {
                    toastr.error('Error en la petición');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

});