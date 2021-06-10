<?php
require_once 'layout/header.php';
require_once '../includes/user.php';
require_once '../includes/user_session.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario

/*
  if (isset($_SESSION['user'])) {
  $user->setUser($userSession->getCurrentUser());
  require_once 'layout/menu.php';
  }
 */

if (isset($_POST['username']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rol'])) {

    $userForm = $_POST['username'];
    $apellidoForm = $_POST['apellido'];
    $emailForm = $_POST['email'];
    $passForm = $_POST['password'];
    $rolForm = $_POST['rol'];


    if ($user->insertUser($userForm, $apellidoForm, $emailForm, $passForm, $rolForm)) {
        if (isset($_SESSION['user'])) {
            header('Location: http://localhost/SystemLog/views/usuarios.php');
        } else {
            header('Location: http://localhost/SystemLog');
        }
    } else {
        echo "usuario no creado correctamente";
    }
}
?>

<body>
    <form class="login" action="" method="POST" autocomplete="off">

        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Ingrese Nombre" required pattern="[a-zA-Z ]{2,60}">
        </div>
        <div class="form-group">
            <label for="Apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese Apellido" required pattern="[a-zA-Z ]{2,60}">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="nombreusuario@dominio.com" pattern="+.@dominio.com" title="Por favor, solo proporciona una dirección válida" required size="20" maxlength="20">
        </div>
        <div class="form-group">
            <label for="Pass">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,8}" maxlength="8" minlength="8" title="Debe contener 8 caracteres de al menos un número y una letra mayúscula y minúscula">
            <!-- ayuda para mostrar debajo de pass-->
            <small id="passwordHelpBlock" class="form-text text-muted">
                El password debe contener 8 carácteres, solo letras y números, y contiene mínimo una letra mayúscula, minúscula y un número.
            </small>

            <!-- checkbox de mostrar password-->
            <div class="col">
                <label for="password"></label>
                <!-- checkbox que nos permite activar o desactivar la opcion -->
                <div style="margin-top:15px;">
                    <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
                    &nbsp;&nbsp;Mostrar Contraseña</div>
            </div>
            <!-------------------------->

        </div>

        <div class="form-group">
            <label for="Rol">Rol</label>
            <select class="form-control" name="rol">
                <option selected value="0">Elige una opción</option>

                <?php foreach ($user->mostrarRol() as $mostrar): ?>
                    <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['nombre']; ?></option>
                <?php endforeach; ?>

            </select>
        </div>


        <p class="text-center">
            <button class="btn btn-primary btn-block">Registrarse</button>
        </p>
        <br></br>


        <span>or <a href="../index.php">Login</a></span>
    </form> 
    <!--librerias de javascript-->   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#mostrar_contrasena').click(function () {
                if ($('#mostrar_contrasena').is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>
    <!----------------------->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

<?php require_once 'layout/footer.php'; ?>

