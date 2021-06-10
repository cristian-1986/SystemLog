<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/vendedor.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$vendedor = new Vendedor();

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
?>
<h3 class="text-center">Vendedores</h3>
<br>               
<div class="container">
    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Domicilio</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($vendedor->mostrarVendedor() as $mostrar): ?>
                    <tr>  
                        <td><?php echo $mostrar['id']; ?></td>
                        <td><?php echo $mostrar['nombre']; ?></td>
                        <td><?php echo $mostrar['apellido']; ?></td>
                        <td><?php echo $mostrar['email']; ?></td>
                        <td><?php echo $mostrar['domicilio']; ?></td>
                        <td><?php echo $mostrar['telefono']; ?></td>
                        <td><?php echo $mostrar['rol']; ?></td> 
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
            