<?php
require_once 'db.php';


class Client extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarClient(){
       $query = $this->connect()->prepare('Select cliente.id, cliente.nombre, cliente.apellido, '
                . 'cliente.localidad, cliente.ramo_cliente, cliente.situacion_afip, cliente.dni_cuil, cliente.domicilio,'
               . 'cliente.email, cliente.telefono, vendedor.nombre as vendedor, zona_entrega.nombre as zona_entrega  '
               . 'from cliente inner join vendedor'
               . ' on cliente.vendedor =  vendedor.id '
               . 'inner join zona_entrega on cliente.zona_entrega = zona_entrega.id');            
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>