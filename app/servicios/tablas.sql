create database bdMinimarket;
use bdMinimarket;

-- Tablas
create table rol(
	idRol tinyint primary key auto_increment,
    rol varchar(40) unique not null
);

create table cuenta(
	idCuenta int primary key auto_increment,
    correo varchar(70) unique not null,
    contrasena varchar(32) not null,
    foto varchar(100) default 'usuarioDefecto.png',
    idRol tinyint not null,
    constraint fk_cue_rol foreign key (idRol) references rol(idRol)
);

create table persona(
	idCuenta int not null,
    dni varchar(8) unique default "-",
    nombres varchar(50) not null,
    apellidos varchar(50) not null,
    telefono varchar(9) unique not null,
    constraint fk_per_cue foreign key (idCuenta) references cuenta(idCuenta)
);

create table categoria(
	idCategoria tinyint primary key auto_increment,
    categoria varchar(40) unique not null
);

create table tipoEntrega(
	idTipoEntrega tinyint primary key auto_increment,
    tipoEntrega varchar(30) unique not null
);

create table proveedor(
	idProveedor smallint primary key auto_increment,
    proveedor varchar(30) unique not null,
    telefono varchar(9) unique not null,
    correo varchar(70) unique not null,
    direccion varchar(100) not null
);

create table producto(
	idProducto smallint primary key auto_increment,
    nombre varchar(150) not null,
    idCategoria tinyint not null,
    idProveedor smallint not null,
    precio float not null,
    stock tinyint not null,
    oferta float default '0',
    imagen varchar(100) default '-',
    constraint fk_pro_cat foreign key (idCategoria) references categoria(idCategoria),
    constraint fk_pro_prov foreign key (idProveedor) references proveedor(idProveedor)
);

create table venta(
	idVenta int primary key auto_increment,
    idCuenta int not null,
    fecha datetime not null,
    idTipoEntrega tinyint not null,
    direccion varchar(100) default "-",
    precioTotal float not null,
    constraint fk_ven_cli foreign key (idCuenta) references cuenta(idCuenta),
    constraint fk_ven_tip foreign key (idTipoEntrega) references tipoEntrega(idTipoEntrega)
);

create table detalleVenta(
	idVenta int not null,
    idProducto smallint not null,
    cantidad tinyint not null,
    precio float not null,
    constraint fk_det_ven foreign key (idVenta) references venta(idVenta),
    constraint fk_det_pro foreign key (idProducto) references producto(idProducto)
);

create table sugerencia(
	idSugerencia int primary key auto_increment,
    idCuenta int not null,
    asunto varchar(70) not null,
    sugerencia text not null,
    fecha datetime not null,
    constraint fk_sug_cue foreign key (idCuenta) references cuenta(idCuenta)
);

create table reclamo(
	idReclamo int primary key auto_increment,
    idCuenta int not null,
    reclamo text not null,
    fecha datetime not null,
    constraint fk_rec_cue foreign key (idCuenta) references cuenta(idCuenta)
);