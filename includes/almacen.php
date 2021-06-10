<?php
require_once 'db.php';


class Almacen extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarAlmacen(){
       $query = $this->connect()->prepare('Select almacen.id, almacen.nombre, sede.nombre as sede from almacen inner join sede on almacen.id_sede = sede.id');          
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
public function mostrarTipoMov(){
        $query = $this->connect()->prepare('Select id, nombre from movimiento_tipo');          
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
        
    

}

?>