<?php

require_once '../includes/user.php';
require_once '../includes/user_session.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario


if (isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());   
} 

$id = $_REQUEST['id'];

        if ($user->getId() != $id) {
            $user->eliminarUser($id);
            header("Location: http://localhost/SystemLog/views/usuarios.php");
        } else {            
            header("Location: http://localhost/SystemLog/views/usuarios.php");
        }
?>












