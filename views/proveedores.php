<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/proveedor.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$proveedor = new Proveedor();

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
?>
<h3 class="text-center">Proveedores</h3>
<br>
<div class="container">
    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Domicilio</th>
                        <th>Cuit</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($proveedor->mostrarProveedor() as $mostrar): ?>
                    <tr>  
                        <td><?php echo $mostrar['id']; ?></td>
                        <td><?php echo $mostrar['nombre']; ?></td>
                        <td><?php echo $mostrar['mail']; ?></td>
                        <td><?php echo $mostrar['telefono']; ?></td>
                        <td><?php echo $mostrar['domicilio']; ?></td>
                        <td><?php echo $mostrar['cuit']; ?></td>
                         <td>
                            <div class="btn-group">
                                <a href="eliminar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-warning">Eliminar</a>                    
                                <a href="editar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-success">Actualizar</a>
                            </div>
                        </td>                       
                    </tr>
                <?php endforeach; ?>
            </table>   
            <br>           
            
            <a href="">
                <button class="btn btn-primary">Nuevo</button>
            </a>
           

        </div>