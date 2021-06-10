<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/camion.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$camion = new Camion();

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
?>
<h3 class="text-center">Camiones</h3>
<br>
<div class="container">
    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Dominio</th>                    
                        <th>Modelo</th>
                        <th>Observación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($camion->mostrarCamion() as $mostrar): ?>
                    <tr>  
                        <td><?php echo $mostrar['id']; ?></td>
                        <td><?php echo $mostrar['marca']; ?></td>
                        <td><?php echo $mostrar['tipo']; ?></td>
                        <td><?php echo $mostrar['dominio']; ?></td> 
                        <td><?php echo $mostrar['modelo']; ?></td> 
                        <td><?php echo $mostrar['observacion']; ?></td> 
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
            