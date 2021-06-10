<div class="menu">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">  
        <a href="http://localhost/SystemLog/index.php" class="navbar-brand">
            <?php
            echo 'Usuario: ' . $user->getNombre();
            ?>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#secondNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>  

        <div class="collapse navbar-collapse" id="secondNavbar">
            <ul class="navbar-nav">

                <!--menú VENTAS-->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Ventas
                    </a>
                    <div class="dropdown-menu">
                        <a href="http://localhost/SystemLog/views/clientes.php" class="dropdown-item">Clientes</a>
                        <a href="http://localhost/SystemLog/views/vendedores.php" class="dropdown-item">Vendedores</a>
                        <a href="http://localhost/SystemLog/views/productos.php" class="dropdown-item">Productos</a>
                        <a href="http://localhost/SystemLog/views/zonas.php" class="dropdown-item">Zonas de venta</a>
                        <a href="#" class="dropdown-item">Cargar pedidos</a>
                        <a href="#" class="dropdown-item">Imprimir pedidos</a>                                
                    </div>
                </li>    

                <!--menú ENTREGAS-->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Reparto
                    </a>
                    <div class="dropdown-menu">
                        <a href="http://localhost/SystemLog/views/camiones.php" class="dropdown-item">Camiones</a>                               
                        <a href="http://localhost/SystemLog/views/gastos_camiones.php" class="dropdown-item">Gastos por camión</a>                                
                        <a href="#" class="dropdown-item">Pedidos pendientes</a>                                
                        <a href="#" class="dropdown-item">Imprimir cargas</a> 
                        <a href="#" class="dropdown-item">Hoja de ruta de entrega</a> 

                    </div>
                </li>    


                <!--menú INVENTARIO-->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Depósito
                    </a>
                    <div class="dropdown-menu">
                        <a href="http://localhost/SystemLog/views/almacenes.php" class="dropdown-item">Almacenes</a>
                        <a href="http://localhost/SystemLog/views/movimientos_productos.php" class="dropdown-item">Movimientos y Ajustes</a>
                        <a href="#" class="dropdown-item">Cargar Fechas</a> 
                        <a href="#" class="dropdown-item">Stock Actual</a>
                        <a href="#" class="dropdown-item">Informe de Stock crítico</a>                               
                    </div>
                </li>    


                <!--menú con REPOSICIÓN-->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Reposición
                    </a>
                    <div class="dropdown-menu">
                        <a href="http://localhost/SystemLog/views/productos.php" class="dropdown-item">Productos</a>
                        <a href="http://localhost/SystemLog/views/proveedores.php" class="dropdown-item">Proveedores</a>
                        <a href="#" class="dropdown-item">Solicitar productos</a>
                        <a href="#" class="dropdown-item">Confirmar retiros</a>
                        <a href="http://localhost/SystemLog/views/rubros.php" class="dropdown-item">Rubros</a>
                        <a href="http://localhost/SystemLog/views/marcas.php" class="dropdown-item">Marcas</a>
                        <a href="http://localhost/SystemLog/views/calibres.php" class="dropdown-item">Calibres</a>
                        <a href="http://localhost/SystemLog/views/sabores.php" class="dropdown-item">Sabores</a>
                    </div>
                </li>  

                <!--menú Usuarios-->
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Usuarios
                    </a>
                    <div class="dropdown-menu">
                        <a href="http://localhost/SystemLog/views/usuarios.php" class="dropdown-item">Usuarios</a>
                        <a href="http://localhost/SystemLog/views/registro.php" class="dropdown-item">Registrar Nuevo</a>
                        <a href="http://localhost/SystemLog/views/roles.php" class="dropdown-item">Rol de Usuario</a>                                
                        <a href="http://localhost/SystemLog/includes/logout.php" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </li>          
            </ul>              
        </div>                         
    </nav>     
</div>   
