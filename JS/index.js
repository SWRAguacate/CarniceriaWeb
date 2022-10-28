$(document).ready(function() {
    const Url = './Petitions/add_to_cart.petition.php';
    const UrlSearchCat = './Petitions/search_cat.petition.php';
    
    if(parseInt($('#id_usuario').val()) == 0){
        $("button[name = 'btnOpenModal']").attr('disabled', true);
        toastr.warning('Favor de iniciar sesión o registrarse para desbloquear el carrito');
    }

    $('#btnOnboarding').click(function(){
        introJs().setOptions({
            steps: [{
              title: 'Bienvenido',
              intro: '!Empecemos con este breve tutorial! 👋'
            },
            {
              element: document.querySelector('#zona1'),
              intro: 'Esta es nuestra barra de navegación'
            },
            {
              title: '!Regresa!',
              element: document.querySelector('#zona2'),
              intro: 'Con este botón siempre podremos regresar al inicio'
            },
            {
                title: '!Anímate!',
                element: document.querySelector('#zona3'),
                intro: 'Este botón corresponde al carrito, solo necesitas registrarte o iniciar sesión para ir a su destino'
            },
            {
                title: '!Verifica!',
                element: document.querySelector('#zona4'),
                intro: 'Con este botón desplegaremos diferentes opciones, en las cuales podrás ir a la página para iniciar sesión, registrarte, y aún más al estar logueados'
            },
            {
                title: 'Busca',
                element: document.querySelector('#zona5'),
                intro: 'Así como la búsqueda de la navegación por nombre, también puedes buscar productos por categorías'
            },
            {
                title: 'Observa',
                element: document.querySelector('#zona6'),
                intro: 'De aquí en adelante podrás encontrar productos de tu interés'
            }]
          }).start();
    })

    $("#unidades").bind('keyup mouseup', function () {
        var porcentajeDescuento = $('#modal_descuento').val();
        var precio_unitario = parseFloat($('#modal_precio_unitario').val());
        var unidades = parseInt($('#unidades').val());
        var descuentoDecimal = porcentajeDescuento/100;
        var descuento = precio_unitario * descuentoDecimal;

        precio_unitario = precio_unitario - descuento;
        var precio_final = precio_unitario * unidades;

        $('#precioFinal').val(precio_final.toString());
    });

    $("#kilos").bind('keyup mouseup', function () {
        var porcentajeDescuento = $('#modal_descuento').val();
        var precio_unitario = parseFloat($('#modal_precio_unitario').val());
        var kilos = parseFloat($('#kilos').val());
        var descuentoDecimal = porcentajeDescuento/100;
        var descuento = precio_unitario * descuentoDecimal;

        precio_unitario = precio_unitario - descuento;
        var precio_final = precio_unitario * kilos;

        $('#precioFinal').val(precio_final.toString());
    });

    $("button[name = 'btnOpenModal']").click(function(event) {
        if(parseInt($('#id_usuario').val()) != 0){
            $('#modal_id_producto').val($(event.target).find("#id_producto").val());
            $('#modal_descuento').val($(event.target).find("#descuento").val());
            $('#modal_tipo').val($(event.target).find("#tipo").val());
            $('#modal_precio_unitario').val($(event.target).find("#precio_unitario").val());
            $('#nombreModal').val($(event.target).find("#nombre").val());

            if($('#modal_tipo').val() == 1){
                //KILOS
                var porcentajeDescuento = $('#modal_descuento').val();
                var precio_unitario = parseFloat($('#modal_precio_unitario').val());
                var kilos = parseFloat($('#kilos').val());
                var descuentoDecimal = porcentajeDescuento/100;
                var descuento = precio_unitario * descuentoDecimal;

                precio_unitario = precio_unitario - descuento;
                var precio_final = precio_unitario * kilos;

                $('#precioFinal').val(precio_final.toString());

                $('#spanKilos').show();
                $('#kilos').show();
                $('#spanUnidades').hide();
                $('#unidades').hide();
            } else {
                //UNIDADES
                var porcentajeDescuento = $('#modal_descuento').val();
                var precio_unitario = parseFloat($('#modal_precio_unitario').val());
                var unidades = parseInt($('#unidades').val());
                var descuentoDecimal = porcentajeDescuento/100;
                var descuento = precio_unitario * descuentoDecimal;

                precio_unitario = precio_unitario - descuento;
                var precio_final = precio_unitario * unidades;

                $('#precioFinal').val(precio_final.toString());

                $('#spanUnidades').show();
                $('#unidades').show();
                $('#spanKilos').hide();
                $('#kilos').hide();
            }
        }
    });

    $('#btnSearchCat').click(function() {
        if($('#categorieSelect').val() != "" && $('#categorieSelect').val() != undefined){
            $.ajax({
                url: UrlSearchCat,
                type: "POST",
                data: {
                    petition: 1,
                    id_categoria: $('#categorieSelect').val()
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
            toastr.waring('Seleccione una categoria');
        }
    });
    
    $('#btnAddToCart').click(function() {
        var kilos = 0;
        var unidades = 0;

        if($('#modal_tipo').val() == 1){
            kilos = parseFloat($('#kilos').val());
        } else {
            unidades = parseInt($('#unidades').val());
        }

        $('#cartIcon').attr("value", (parseInt($('#cartIcon').attr("value")) + 1));
        
        $.ajax({
            url: Url,
            type: "POST",
            data: {
                petition: 1,
                id_carrito: $('#modal_id_carrito').val(),
                id_producto: $('#modal_id_producto').val(),
                unidades: unidades,
                kilos: parseFloat(kilos),
                precio_final: parseFloat($('#precioFinal').val())
            },
            success: function(result){
                if(result == 1){
                    toastr.success('Producto agregado al carrito');
                } else {
                    toastr.error('Error en la petición');
                }
            },
            error: function(error){
                console.log(error);
            }
        });

        $("#btnCloseModal").click();
    });
});