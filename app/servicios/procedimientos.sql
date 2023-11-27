delimiter $$
create procedure iniciarSesion(in cor varchar(70), in con varchar(32), out accion tinyint unsigned)
begin
	declare conTemp varchar(32);
    select contrasena into conTemp from cuenta where correo = cor;
    if conTemp is not null then
		if conTemp = con then
			set accion = 1;
		else
			set accion = 2;
		end if;
	else
		set accion = 3;
	end if;
end $$
delimiter ;

delimiter $$
create procedure registrarCuenta(in cor varchar(70), in con varchar(32), in rol tinyint, in dni varchar(8), in nom varchar(50), 
in ape varchar(50), in fec date, in tel varchar(9))
begin
	insert into cuenta (correo, contrasena, idRol) values (cor, con, rol);
    set @idCue = LAST_INSERT_ID();
    insert into persona (idCuenta, dni, nombres, apellidos, fechaNacimiento, telefono) values (@idCue, dni, nom, ape, fec, tel);
end $$
delimiter ;