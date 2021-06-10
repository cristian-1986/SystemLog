<?php
require_once 'db.php';


class Rubro extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarRubro(){
       $query = $this->connect()->prepare('Select * from rubro_producto');            
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>