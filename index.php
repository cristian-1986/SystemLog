
<?php 

require_once 'includes/user.php';
require_once 'includes/user_session.php';


$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario

//si existe sesión mostrar home
if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    require_once 'views/home.php';

        //si recibe datos para iniciar sesión validar ejecutar función exists   
        }else if(isset ($_POST['username']) && isset($_POST['password'])){

            $userForm = $_POST['username'];
            $passForm = $_POST['password'];

                    if($user->userExists($userForm, $passForm)){
                        $userSession->setCurrentUser($userForm);
                        $user->setUser($userForm);
                        require_once 'views/home.php';

                    } else {    //si los datos son incorrectos    
                        $errorLogin ="Nombre de usuario y/o password es incorrecto";
                        require_once 'views/login.php';
                    }
    
        }else{
            //muestra por defecto
            include_once 'views/login.php';
        }
        

?>
