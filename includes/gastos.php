<?php
require_once 'db.php';


class Gastos extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarGastos(){
       $query = $this->connect()->prepare('Select * from camion_gastos');          
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>