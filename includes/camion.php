<?php
require_once 'db.php';


class Camion extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarCamion(){
       $query = $this->connect()->prepare('Select * from camion');          
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>