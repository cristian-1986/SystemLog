<?php require_once 'layout/header.php'; ?>

<body>
    <form action="" class="login" method="POST" autocomplete="off">
        <?php
        if (isset($errorLogin)) {
            echo $errorLogin;
        }
        ?>
        <h3 class="text-center">Inicio de sesión...</h3>
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" name="username" id="username" autocomplete="nope" placeholder="Escribe tu nombre" required pattern="[a-zA-Z ]{2,60}">
        </div>
        <div class="form-group">
            <label for="Pass">Password</label>

            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" placeholder="Escribe tu password" required maxlength="8" minlength="8">
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
        <p class="text-center">
            <button class="btn btn-primary btn-block">Iniciar Sesión</button>
        </p>
        <br></br>

        <span>or <a href="views/registro.php">Registrarse</a></span>
    </form>


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

<?php require_once 'views/layout/footer.php'; ?>
