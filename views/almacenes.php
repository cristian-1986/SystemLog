<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/almacen.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$almacen = new Almacen();

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
?>
<h3 class="text-center">Almacenes Disponibles</h3>
<br>
<div class="container">
    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Sede</th>
                        <th>Acciones</th>                        
                    </tr>
                </thead>

                <?php foreach ($almacen->mostrarAlmacen() as $mostrar): ?>
                    <tr>  
                        <td><?php echo $mostrar['id']; ?></td>
                        <td><?php echo $mostrar['nombre']; ?></td>
                        <td><?php echo $mostrar['sede']; ?></td>
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