<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}

?>
<div class="wrapper">

<h3 class="text-center">Usuarios del sistema</h3>
<br>


<div class="container">
    <div class="table-responsive-lg">
        <table class="table table-condensed table-striped text-center" style='font-size: 12px'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>


                </tr>
            </thead>

            <?php foreach ($user->mostrarUser() as $mostrar): ?>
                <tr>  
                    <td><?php echo $mostrar['id']; ?></td>
                    <td><?php echo $mostrar['nombre']; ?></td>
                    <td><?php echo $mostrar['apellido']; ?></td>
                    <td><?php echo $mostrar['email']; ?></td>
                    <td><?php echo $mostrar['rol']; ?></td>
                    <td>
                        <div class="row">
                        <!--    <div class="col-md-3 col-md-offset-3 col-xs-12 text-left">  -->
                                <div class="d-flex w-100">
                                    <a href="eliminar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-warning" style='font-size: 12px'>Eliminar</a>                    
                                    <a href="editar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-success" style='font-size: 12px'>Actualizar</a>
                                </div>
                            </div>
                        <!--   </div>   -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>  
    </div>     
    <br>       
    <a href="http://localhost/SystemLog/views/registro.php">
        <button class="btn btn-primary" >Nuevo</button>
    </a>
</div>


<!-- cierra div del cuerpo móvil-->
</div> 
            