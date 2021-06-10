<?php
require_once 'db.php';


class Producto extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario
    
public function mostrarProducto(){
       $query = $this->connect()->prepare('Select producto.id, producto.nombre, rubro_producto.nombre as rubro,'
               . 'marca.nombre as marca, sabor.nombre as sabor, calibre.nombre as calibre, estado_producto.nombre as estado, '
               . 'producto.unid_bulto, producto.stock_min, producto.precio_costo,'
               . 'producto.precio_venta from producto '
               . 'inner join rubro_producto on producto.id_rubro = rubro_producto.id '
               . 'inner join marca on producto.id_marca = marca.id '
               . 'inner join sabor on producto.id_sabor = sabor.id '
               . 'inner join calibre on producto.id_calibre = calibre.id '
               . 'inner join estado_producto on producto.id_estado = estado_producto.id');        
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
}
    

}

?>