<?php
require_once 'layout/header.php';
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

echo 'editar de prueba';

for ($i=0; $i<10; $i++){
    echo 'la variable es:' .$i;
    echo '.<br>';
    
    
}
echo '<div class = "container">';
for ($a = 1; $a<=5; $a++){
    echo '<div class="form-group"><label for=" ' . $a . ' ">Label '.$a.':</label>'
            . '<input class= "form-control" type="text" name=" ' .$a. ' value = "'.$a.'"></div>';
}
echo '</div>';

?>