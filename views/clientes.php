<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/client.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$client = new Client();

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}

?>
<h3 class="text-center">Clientes</h3>
<br>       
<div class="container">
    <div class="table-responsive-lg">
    <table class="table table-condensed table-striped text-center" style='font-size: 12px'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        
                        <th>DNI-CUIT</th>
                        <th>Domicilio</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Vendedor</th>
                        <th>Zona</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($client->mostrarClient() as $mostrar): ?>
                    <tr>  
                        <td><?php echo $mostrar['id']; ?></td>
                        <td><?php echo $mostrar['nombre']; ?></td>
                        <td><?php echo $mostrar['apellido']; ?></td>                        
                        <td><?php echo $mostrar['dni_cuil']; ?></td>
                        <td><?php echo $mostrar['domicilio']; ?></td>
                        <td><?php echo $mostrar['email']; ?></td>
                        <td><?php echo $mostrar['telefono']; ?></td>
                        <td><?php echo $mostrar['vendedor']; ?></td>
                        <td><?php echo $mostrar['zona_entrega']; ?></td>
                        <td>
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-3 col-xs-12 text-left">
                                        <div class="btn-group d-flex w-100">
                                            <a href="eliminar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-warning" style='font-size: 12px'>Eliminar</a>                    
                                            <a href="editar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-success" style='font-size: 12px'>Actualizar</a>
                                        </div>
                                    </div>
                                </div>   
                            </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
            <br>           
            
            <a href="">
                <button class="btn btn-primary">Nuevo</button>
            </a>
           

        </div>
            