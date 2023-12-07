-- roles
insert into rol (rol) values ("Administrador");
insert into rol (rol) values ("Cliente");

-- usuariospersona
call registrarCuenta("admin@gmail.com", md5("123"), 1, "12345678", "Humberto Richard", "García Toribio", "123456789");
call registrarCuenta("cliente@gmail.com", md5("123"), 2, "87654321", "Miau", "Flores Zevallos",  "852364179");

-- categorías
insert into categoria (categoria) values ('Abarrotes');
insert into categoria (categoria) values ('Bebidas Alcohólicas');
insert into categoria (categoria) values ('Bebidas sin Alcohol');
insert into categoria (categoria) values ('Galletas, Chocolates, Golosinas');
insert into categoria (categoria) values ('Piqueos, Snacks');
insert into categoria (categoria) values ('Limpieza');
insert into categoria (categoria) values ('Mascotas');

-- proveedores
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor1', '111111111', 'prov1@gmail.com', 'Av. dirProv.1');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor2', '222222222', 'prov2@gmail.com', 'Av. dirProv.2');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor3', '333333333', 'prov3@gmail.com', 'Av. dirProv.3');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor4', '444444444', 'prov4@gmail.com', 'Av. dirProv.4');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor5', '555555555', 'prov5@gmail.com', 'Av. dirProv.5');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor6', '666666666', 'prov6@gmail.com', 'Av. dirProv.6');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor7', '777777777', 'prov7@gmail.com', 'Av. dirProv.7');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor8', '888888888', 'prov8@gmail.com', 'Av. dirProv.8');
insert into proveedor (proveedor, telefono, correo, direccion) values ('proveedor9', '999999999', 'prov9@gmail.com', 'Av. dirProv.9');

-- productos
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Aceite de Arroz Costeño Botella 900ml', 1, 8, 15, 13, 'aceiteCosteno.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Aceite de Girasol Ideal Botella 1L', 1, 7, 13, 3, 'aceiteIdealGirasol.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Aceite de Ajonjolí Sesame Oil Frasco 108ml', 1, 8, 7.5, 6, 'aceiteAjonjoliSesame.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Aceite de Oliva Extra Virgen El Olivar Vidrio 200ml', 1, 8, 12, 0, 'aceiteOlivaExtraVirgen.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Aceite Vegetal Primor Clásico Botella 900ml', 1, 7, 11.5, 7, 'aceiteVegetalPrimor.jpg');

insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Anisado Anís Najar Crema Especial Botella 750ml', 2, 7, 37.9, 2, 'anisNajarCrema.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Bebida Alcohólica Preparada Four Loko Green Lata 473ml', 2, 5, 10.7, 3, 'fourLokoVerde.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Bebida Alcohólica Preparada Four Loko Ponche de Frutas Lata 473ml', 2, 5, 10.7, 6, 'fourLokoRojo.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Bebida Alcohólica Preparada Four Loko Purple Lata 473ml', 2, 5, 10.7, 0, 'fourLokoMorado.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Cerveza Cristal Bicolor Botella 330ml [Six Pack]', 2, 7, 21, 10, 'cervezaCristalSixPack.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Cerveza Heineken Botella 330ml', 2, 2, 5, 16, 'cervezaHeineken.jpg');

insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Agua Cielo Sin Gas Botella 625ml', 3, 7, 1.2, 15, 'aguaCielo625ml.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Agua Cielo Sin Gas Botella Tapa Sport 1L', 3, 7, 2, 6, 'aguaCielo1l.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Gaseosa 7up Botella 500ml', 3, 8, 2, 3, 'gaseosa7up.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Gaseosa Big Cola Botella 3.3L', 3, 8, 6.5, 3, 'bigCola3l.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Gaseosa Coca Cola Original Botella 1.5L', 3, 8, 6, 10, 'cocaCola15l.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Gaseosa Fanta Naranja Botella 3L', 3, 4, 7.9, 2, 'fantaNaranja3l.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Gaseosa Inca Kola Original Botella 2.25L', 3, 4, 7.5, 11, 'incaKola225l.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Bebida Cifrut Fruit Punch Botella 400ml', 3, 4, 1, 3, 'cifrut400ml.jpg');

insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Caramelos Bubbaloo Sparkies Bolsa 25gr', 4, 1, 1, 0, 'bubbalooSparkies25gr.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Chicles Trident Sabor Mora Azul Paquete [6 unidades]', 4, 1, 1.2, 5, 'tridentMora.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Chocolate Lentejas en Grajeas Caja 30gr', 4, 1, 1, 6, 'chocolateLentejas.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Chocolate Princesa Blanco Barra 30gr', 4, 1, 1.6, 10, 'princesaBlanco30gr.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Chocolate Triángulo Barra 30gr', 4, 1, 1.6, 5, 'chocolateTriangulo30gr.jpg');

insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Camotes Fritos Inka Chips 130gr', 5, 2, 5.5, 4, 'comotesFritosInkaChips.jpeg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Chifles Salados Karinto 42gr', 5, 2, 1, 6, 'chiflesKarinto.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Doritos Queso Atrevido 40g', 5, 2, 1.3, 2, 'doritos40g.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Papas Lays Clásicas 70gr', 5, 2, 2, 6, 'papasLays70gr.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Los Cuates Picantes 69gr', 5, 2, 1, 1, 'cuatesPicantes69gr.jpg');

insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Ambientador en Aerosol Glade Alegría Floral y Frutos Rojos 400ml', 6, 9, 8.5, 5, 'aerosolGladeAlegria.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Betún Color Negro Sapolio', 6, 9, 2.5, 9, 'betunSapolio.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Bolsas para Basura Tachitos 30 Litros Rollo [10 unidades]', 6, 9, 2.5, 6, 'bolsasTachitos30l.jpg');

insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Comida para Perro Ricocan Adulto Raza Mediana y Grande Sabor a Cordero y Cereales 1kg', 7, 3, 10.5, 7, 'ricocanAdulto1kg.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Comida para Gatitos Mimaskot Sabor a Pollo, Carne y Leche Bolsa 1kg', 7, 3, 10.5, 4, 'gatitosMimaskot1kg.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Comida para Gato Mimaskot Adulto Sabor a Pollo, Carne y Salmón Bolsa 1kg', 7, 9, 10, 10, 'gatosMimaskot1kg.jpg');
insert into producto (nombre, idCategoria, idProveedor, precio, stock, imagen) values ('Comida para Perro Mimaskot Cachorros Carne y Cereales Bolsa 1kg', 7, 9, 8.5, 3, 'cachorrosMimaskot1kg.jpg');