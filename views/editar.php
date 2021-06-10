<?php
require_once 'layout/header.php';
require_once '../includes/user.php';
require_once '../includes/user_session.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario

//si existe sesión mostrar home
/*
if (isset($_SESSION['user'])) {
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
*/

if (isset($_REQUEST['id'])) {   
    $resultado = $user->editarUser($_REQUEST['id']);
}

if (isset($_POST['username']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_REQUEST['id']) && isset($_POST['rol'])) {

    $userForm = $_POST['username'];
    $apellidoForm = $_POST['apellido'];
    $emailForm = $_POST['email'];
    //$passForm = $_POST['password'];
    $rolForm = $_POST['rol'];
    $idForm = $_REQUEST['id'];

    if ($user->actualizarUser($userForm, $apellidoForm, $emailForm, $rolForm, $idForm)) {

        header('Location: http://localhost/SystemLog/views/usuarios.php');
       
       } else {
        echo "usuario no editado correctamente";
       }
}

?>
<body>
    <form class="login" action="" method="POST" autocomplete="off">
       
		<div class="form-group">
			<label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $resultado['nombre']; ?>">
		</div>
                                <div class="form-group">
			<label for="Apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $resultado['apellido']; ?>">
		</div>
                                <div class="form-group">
			<label for="Email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $resultado['email'];?>">
		</div>
		<div class="form-group">
			<label for="Pass">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="" disabled="">
		</div>
                                
                                <div class="form-group">
                                    <label for="Rol">Rol</label>
                                        <select name="rol">
                                            <option selected value="0">Elige una opción</option>
                                            
                                                <?php foreach ($user->mostrarRol() as $mostrar): ?>
                                                    <option value="<?php echo $mostrar['id']  ?>"<?php echo $mostrar['id'] == $resultado['id_rol'] ? 'selected' : '' ?>><?php echo $mostrar['nombre'] ;   ?></option>
                                                <?php endforeach; ?>
                                                    
                                        </select>
                                </div>
                               

		<p class="text-center">
			<button class="btn btn-primary">Editar</button>
		</p>
                    <br></br>
           
            
         <span>or <a href="http://localhost/SystemLog/views/usuarios.php">Atrás</a></span>   
        </form> 
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>