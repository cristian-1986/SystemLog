<?php
require_once 'db.php';


class Vendedor extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarVendedor(){
       $query = $this->connect()->prepare('Select vendedor.id, vendedor.nombre, vendedor.apellido, vendedor.email, '
               . 'vendedor.domicilio, vendedor.telefono, rol.nombre as rol from vendedor inner join rol on vendedor.rol = rol.id');          
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>