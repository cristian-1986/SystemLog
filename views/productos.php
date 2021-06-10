<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/producto.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$producto = new Producto();

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
?>
<h3 class="text-center">Productos</h3>
<br>      
<div class="container">
   <div class="table-responsive-lg">
    <table class="table table-condensed table-striped text-center" style='font-size: 12px'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Rubro</th>
                        <th>Marca</th>                       
                        <th>Calibre</th>                       
                        <th>Unid. por Bulto</th>
                        <th>Stock Mínimo</th>
                        <th>Precio Costo</th>
                        <th>Precio Venta</th>                       
                        <th>Acciones</th>                        
                    </tr>
                </thead>

                <?php foreach ($producto->mostrarProducto() as $mostrar): ?>
                    <tr>  
                        <td><?php echo $mostrar['id']; ?></td>
                        <td><?php echo $mostrar['nombre']; ?></td>
                        <td><?php echo $mostrar['rubro']; ?></td>
                        <td><?php echo $mostrar['marca']; ?></td>                       
                        <td><?php echo $mostrar['calibre']; ?></td>                        
                        <td><?php echo $mostrar['unid_bulto']; ?></td>
                        <td><?php echo $mostrar['stock_min']; ?></td>
                        <td><?php echo $mostrar['precio_costo']; ?></td> 
                        <td><?php echo $mostrar['precio_venta']; ?></td>                         
                        <td>
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-3 col-xs-12 text-left">
                                        <div class="btn-group d-flex w-100">
                                            <a href="eliminar.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-warning"style='font-size: 12px'>Eliminar</a>                    
                                            <a href="editar_prueba.php" class="btn btn-success" style='font-size: 12px'>Actualizar</a>
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
            

