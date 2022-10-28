-- Este script solo se ejecutará una vez, después de haber creado la base de datos y de haber corrido el script de las tablas.
-- Son inserts para categorias y productos, éstos se deben hacer en la BD debido a que el proyecto solo se enfoca al usuario

INSERT INTO categoria (nombre) VALUES ("Res");

INSERT INTO categoria (nombre) VALUES ("Cerdo");

INSERT INTO categoria (nombre) VALUES ("Pollo");

INSERT INTO categoria (nombre) VALUES ("Pescado");

INSERT INTO producto (id_categoria, nombre, descripcion, foto, descuento, tipo, precio_unitario) VALUES (1, "Aguja norteña", "Deliciosa y jugosa carne de res", "https://carnesramos.com.mx/wp-content/themes/ramos/images/productos-lightbox/aguja-nortena.png", 0, 1, 120.30);

INSERT INTO producto (id_categoria, nombre, descripcion, foto, descuento, tipo, precio_unitario) VALUES (2, "Costilla de cerdo", "Deliciosa y jugosa costilla de cerdo", "https://carnesramos.com.mx/wp-content/themes/ramos/images/productos-lightbox/cerdo-costilla.png", 10, 1, 80.90);

INSERT INTO producto (id_categoria, nombre, descripcion, foto, descuento, tipo, precio_unitario) VALUES (3, "Alitas naturales", "Delicioso y jugoso pollo", "https://carnesramos.com.mx/wp-content/themes/ramos/images/productos-lightbox/pollo-alitas.png", 15, 1, 60.80);

INSERT INTO producto (id_categoria, nombre, descripcion, foto, descuento, tipo, precio_unitario) VALUES (4, "Pescado empanizado crudo", "Marisco fresco", "https://carnesramos.com.mx/wp-content/themes/ramos/images/productos-lightbox/pescado-empanizado-crudo.png", 0, 1, 140.50);

DELIMITER $$
create function fun_total_ventas (id_prod int) returns int not deterministic
begin
    return (select count(*) from producto_carrito where id_producto = id_prod and estatus = 1);
end$$