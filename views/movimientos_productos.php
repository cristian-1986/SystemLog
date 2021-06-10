<?php
require_once '../includes/user.php';
require_once '../includes/user_session.php';
require_once '../includes/almacen.php';
require_once '../includes/producto.php';
require_once '../includes/almacen.php';

$userSession = new UserSession(); //nuevo objeto sesión
$user = new User(); //nuevo objeto usuario
$almacen = new Almacen();
$producto = new Producto();
$almacen = new Almacen();

//si existe sesión mostrar home
if (isset($_SESSION['user'])) {
    $user->setUser($userSession->getCurrentUser());
    require_once 'home.php';
} else {
    require_once 'login.php';
}
?>

<div class="wrapper">
<h3 class="text-center">Movimientos de Stock</h3>
<br>
<div class="container">
    <form class="form-horizontal">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="tipo_movimiento" class="control-label">Tipo de movimiento:</label>

                <select class="form-control" id="tipo_movimiento" name="Tipo_Movimiento" required="required">
                    <option selected value="">Elige una opción</option>

                    <?php foreach ($almacen->mostrarTipoMov() as $mostrar): ?>
                        <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['nombre']; ?></option>
                    <?php endforeach; ?>

                </select>

            </div>

            <div class="form-group">
                <label for="producto"class="control-label">Producto:</label>
                <select class="form-control" id="producto" name="producto" required="required">
                    <option selected value="">Elige producto</option>

                    <?php foreach ($producto->mostrarProducto() as $mostrar): ?>
                        <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['nombre']; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <div style="width: 800px; height: 75px">
                <div class="form-group" style="float: left">
                    <label for="almacen" class="control-label">Seleccione almacén (origen):</label>
                    <select class="form-control" id="almacen" name="almacen" required="required">
                        <option selected value="">Elige almacén</option>

                        <?php foreach ($almacen->mostrarAlmacen() as $mostrar): ?>
                            <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['nombre']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group" style="float: right">
                    <label for="almacen" class="control-label">Seleccione almacén (destino):</label>
                    <select class="form-control" id="almacen_destino" name="almacen" required="required" disabled="true">
                        <option selected value="">Elige almacén</option>

                        <?php foreach ($almacen->mostrarAlmacen() as $mostrar): ?>
                            <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['nombre']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                
            </div> 
            
            <div class="form-group">
                <label for="cantidad" class="control-label">Cantidad:</label>  
                <div class="input-group col-xs-4">
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="" min="1" max="2000" step="1" pattern="^[0-9]+" required> 
                </div>
            </div>
            
            <div class="form-group">
                <label for="fecha_vto" class="control-label">Fecha de Vencimiento:</label>  
                <div class="input-group col-xs-4">
                    <input type="date" class="form-control" id="fecha" name="fecha_vto" placeholder="" required="required"> 
                </div>
            </div>
            
            <br>
            <div class="form-group">
                <div class="col-sm-10">
                    <button id="adicionar" type="button" class="btn btn-primary">Cargar</button>
                </div>
            </div>
        </div>    
    </form>
</div>

<div class="container">
    <p>Elementos en la Tabla: <div id="adicionados"></div></p>

    <form action="" id="form_insert">


        <table  id="mytable" class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>Tipo_Movimiento</th>
                    <th>Producto</th>
                    <th>Almacén (origen)</th>
                    <th>Almacén (destino)</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

        </table>

        <div class="form-group">
            <div class="col-sm-10">
                <div class="acciones">
                    <button type="submit" class="btn btn-success" id="enviar">Guardar Movimientos</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--cierra body-->
</div>



<script>
//enviar datos ingresados a base de datos
jQuery(document).ready(function() {
  jQuery('#enviar').on('click', function() {
    var filas = [ ];
    $('.isres').each(function() {
      var movimiento = $(this).find('td').eq(0).text();
      var producto = $(this).find('td').eq(1).text();
      var almacen = $(this).find('td').eq(2).text();
      var almacen_destino = $(this).find('td').eq(3).text();
      var cantidad = $(this).find('td').eq(4).text();
      var fecha = $(this).find('td').eq(5).text();

      var fila = {
        movimiento,
        producto,
        almacen,
        almacen_destino,
        cantidad,
        fecha
      };
      filas.push(fila);
    });
    console.log(filas);    
  });
});
</script>

<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/cargarMovimientos.js"></script>

 