-- Debes crear una base de datos que se llame carniceria, o en su defecto, cambia el nombre en el script, solo debes asegurarte de ejecutar este script una sola vez en la base de datos que decidas.

use carniceria;

drop table if exists producto_compra;
drop table if exists producto_carrito;
drop table if exists compra;
drop table if exists carrito;
drop table if exists producto;
drop table if exists categoria;
drop table if exists usuario;

CREATE TABLE IF NOT EXISTS usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR (80) NOT NULL,
  nombre VARCHAR (80) NOT NULL,
  email VARCHAR (40) NOT NULL,
  contra VARCHAR (25) NOT NULL,
  telefono VARCHAR (20),
  PRIMARY KEY (id_usuario)
);

CREATE TABLE IF NOT EXISTS categoria (
  id_categoria INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR (80) NOT NULL,
  PRIMARY KEY (id_categoria)
);

CREATE TABLE IF NOT EXISTS producto (
  id_producto INT NOT NULL AUTO_INCREMENT,
  id_categoria INT NOT NULL,
  nombre VARCHAR (50) NOT NULL,
  descripcion VARCHAR (150) NOT NULL,
  foto VARCHAR(255) NOT NULL,
  descuento INT NULL,
  tipo TINYINT NOT NULL,
  precio_unitario DECIMAL(6,2) NOT NULL,
  PRIMARY KEY (id_producto),
  CONSTRAINT fk_producto_categoria
  FOREIGN KEY (id_categoria)
  REFERENCES categoria (id_categoria)
);

CREATE TABLE IF NOT EXISTS carrito (
  id_carrito INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  PRIMARY KEY (id_carrito),
  CONSTRAINT fk_usuario_carrito
  FOREIGN KEY (id_usuario)
  REFERENCES usuario (id_usuario)
);

CREATE TABLE IF NOT EXISTS compra (
  id_compra INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  fecha_compra DATE NOT NULL DEFAULT CURRENT_DATE,
  PRIMARY KEY (id_compra),
  CONSTRAINT fk_usuario_compra
  FOREIGN KEY (id_usuario)
  REFERENCES usuario (id_usuario)
);

CREATE TABLE IF NOT EXISTS producto_carrito (
  id_producto_carrito INT NOT NULL AUTO_INCREMENT,
  id_carrito INT NOT NULL,
  id_producto INT NOT NULL,
  unidades INT NOT NULL,
  kilos DECIMAL(5,2) NOT NULL,
  precio_final DECIMAL(8,2) NOT NULL,
  estatus TINYINT NOT NULL,
  PRIMARY KEY (id_producto_carrito),
  CONSTRAINT fk_producto_carrito
  FOREIGN KEY (id_carrito)
  REFERENCES carrito (id_carrito),
  CONSTRAINT fk_carrito_producto
  FOREIGN KEY (id_producto)
  REFERENCES producto (id_producto)
);

CREATE TABLE IF NOT EXISTS producto_compra (
  id_compra INT NOT NULL,
  id_usuario INT NOT NULL,
  id_producto_carrito INT NOT NULL,
  PRIMARY KEY (id_compra, id_producto_carrito),
  CONSTRAINT fk_producto_compra
  FOREIGN KEY (id_compra)
  REFERENCES compra (id_compra),
  CONSTRAINT fk_producto_carrito_compra
  FOREIGN KEY (id_producto_carrito)
  REFERENCES producto_carrito (id_producto_carrito),
  CONSTRAINT fk_usuario_producto_compra
  FOREIGN KEY (id_usuario)
  REFERENCES usuario (id_usuario)
);