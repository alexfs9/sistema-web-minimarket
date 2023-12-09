<tr>
    <th scope="row">
        <?php echo $producto['idProducto'] ; ?>
    </th>
    <td>
        <?php echo $producto['nombre'] ; ?>
    </td>
    <td>
        <?php echo $producto['categoria'] ; ?>
    </td>
    <td>
        <?php echo $producto['proveedor'] ; ?>
    </td>
    <td>
        <?php echo $producto['precio'] ; ?>
    </td>
    <td>
        <?php echo $producto['stock'] ; ?>
    </td>
    <td>
        <?php echo $producto['oferta'] ; ?>
    </td>
    <td>
        <img src="<?php echo RUTA_RAIZ_WEB . '/app/vistas/img/subidas/' . $producto['imagen'] ; ?>" alt="<?php echo $producto['imagen']; ?>" class="img-fluid border border-1 border-success" style="width: 4rem;"/>
    </td>
    <td>
        <a href="<?php echo RUTA_RAIZ_WEB . '/productos/' . $producto['idProducto'] . '/modificar' ; ?>" class="mb-1 btn btn-warning" style="margin-right: 2px;">
            <i class="fa-solid fa-pencil fa-xl" style="color: #ffffff;"></i>
        </a>
        <a href="<?php echo RUTA_RAIZ_WEB . '/productos/' . $producto['idProducto'] . '/eliminar' ; ?>" class="mb-1 btn btn-danger">
            <i class="fa-sharp fa-solid fa-trash fa-xl" style="color: #ffffff;"></i>
        </a>
    </td>
</tr>