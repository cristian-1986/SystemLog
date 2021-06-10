<?php
require_once 'db.php';


class Zona extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarZona(){
       $query = $this->connect()->prepare('Select zona_entrega.id, zona_entrega.nombre, vendedor.nombre as vendedor, '
               . 'camion.tipo as camion from zona_entrega inner join vendedor on zona_entrega.id_vendedor = vendedor.id '
               . 'inner join camion on zona_entrega.id_camion = camion.id');        
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>