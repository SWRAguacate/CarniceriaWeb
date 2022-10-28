$(document).ready(function() {
    const UrlDelete = './Petitions/delete_product_cart.petition.php';
    const UrlPay = './Petitions/checkout_cart.petition.php';
    const UrlUpdate = './Petitions/update_product_cart.petition.php';

    if(parseInt($('#pcd').val()) == 0)
    {
        $('#btnPagarCarrito').attr('disabled', true);
    }

    $("input[name = 'unidades']").bind('keyup mouseup', function (event) {
        var precioAntiguoFinal = parseFloat($(event.target).parent().find("input[name = 'precioFinal']").val());
        var id_producto_carrito = $(event.target).parent().find("input[name = 'id_producto_carrito']").val();
        var porcentajeDescuento = $(event.target).parent().find("input[name = 'descuento']").val();
        var precio_unitario = parseFloat($(event.target).parent().find("input[name = 'precio_unitario']").val());
        var unidades = parseInt($(event.target).val());
        var kilos = 0;
        var descuentoDecimal = porcentajeDescuento/100;
        var descuento = precio_unitario * descuentoDecimal;
        var pcd = $('#pcd').val();

        precio_unitario = precio_unitario - descuento;
        var precio_final = precio_unitario * unidades;
        var nuevopcd = pcd - precioAntiguoFinal + precio_final;

        $(event.target).parent().find("input[name = 'precioFinal']").val(precio_final.toString());
        
        $.ajax({
            url: UrlUpdate,
            type: "POST",
            data: {
                petition: 1,
                id_producto_carrito: id_producto_carrito,
                unidades: unidades,
                kilos: parseFloat(kilos),
                precio_final: parseFloat(precio_final)
            },
            success: function(result){
                if(result == 1){
                    toastr.success('Producto modificado');
                    $('#pcd').val(nuevopcd.toString());
                    $('#spanpcd').text(nuevopcd.toString());
                } else {
                    toastr.error('Error en la petición');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $("input[name = 'kilos']").bind('keyup mouseup', function (event) {
        var precioAntiguoFinal = parseFloat($(event.target).parent().find("input[name = 'precioFinal']").val());
        var id_producto_carrito = $(event.target).parent().find("input[name = 'id_producto_carrito']").val();
        var porcentajeDescuento = $(event.target).parent().find("input[name = 'descuento']").val();
        var precio_unitario = parseFloat($(event.target).parent().find("input[name = 'precio_unitario']").val());
        var kilos = parseFloat($(event.target).val());
        var unidades = 0;
        var descuentoDecimal = porcentajeDescuento/100;
        var descuento = precio_unitario * descuentoDecimal;
        var pcd = $('#pcd').val();

        precio_unitario = precio_unitario - descuento;
        var precio_final = parseFloat(precio_unitario * kilos);
        var nuevopcd = pcd - precioAntiguoFinal + precio_final;

        $(event.target).parent().find("input[name = 'precioFinal']").val(precio_final.toString());

        $.ajax({
            url: UrlUpdate,
            type: "POST",
            data: {
                petition: 1,
                id_producto_carrito: id_producto_carrito,
                unidades: unidades,
                kilos: parseFloat(kilos),
                precio_final: parseFloat(precio_final)
            },
            success: function(result){
                if(result == 1){
                    toastr.success('Producto modificado');
                    $('#pcd').val(nuevopcd.toString());
                    $('#spanpcd').text(nuevopcd.toString());
                } else {
                    toastr.error('Error en la petición');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

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