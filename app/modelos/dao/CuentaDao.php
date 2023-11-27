<?php

require_once RUTA_RAIZ_PHP . '/app/servicios/Conexion.php';

class CuentaDao extends Conexion
{

    public function obtenerCuenta($cor, $con)
    {
        $sql = 'select c.idCuenta, p.dni, p.nombres, p.apellidos, 
        p.fechaNacimiento, p.telefono, c.correo, c.contrasena, c.foto, r.rol from 
        cuenta c inner join persona p on c.idCuenta = p.idCuenta inner join rol r on 
        c.idRol = r.idRol where c.correo = ? and c.contrasena = ?;';

        if (parent::conectar()) {
            $sentencia = mysqli_prepare(parent::getConexion(), $sql);

            if ($sentencia) {
                mysqli_stmt_bind_param($sentencia, 'ss', $cor, $con);
                mysqli_stmt_execute($sentencia);
                mysqli_stmt_bind_result($sentencia, $idCuenta, $dni, $nombres, $apellidos, 
                    $fechaNacimiento, $telefono, $correo, $contrasena, $foto, $rol);
                mysqli_stmt_fetch($sentencia);

                $resultado = [
                    'idCuenta' => $idCuenta,
                    'dni' => $dni,
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'fechaNacimiento' => $fechaNacimiento,
                    'telefono' => $telefono,
                    'correo' => $correo,
                    'contrasena' => $contrasena,
                    'foto' => $foto,
                    'rol' => $rol,
                ];

                mysqli_stmt_close($sentencia);

                parent::desconectar();
            }
        }

        return $resultado;
    }
}
