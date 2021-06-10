$(document).ready(function() {
//obtenemos el valor de los input

$('#adicionar').click(function() {   
  var combo1 = document.getElementById("tipo_movimiento");
  var tipo_movimiento = combo1.options[combo1.selectedIndex].text;
   
  var combo2 = document.getElementById("producto");
  var producto = combo2.options[combo2.selectedIndex].text;
   
  var combo3 = document.getElementById("almacen");
  var almacen = combo3.options[combo3.selectedIndex].text;  
  
  var combo4 = document.getElementById("almacen_destino");
  var almacen_d = combo4.options[combo4.selectedIndex].text;  
    
  var cantidad = document.getElementById("cantidad").value;
   
  var fecha = document.getElementById("fecha").value;
  
  if (tipo_movimiento==="" || producto==="" || almacen==="" || cantidad==="" || fecha ==="" ){
      alert ("Debe completar todos los campos requeridos");
      document.getElementById("tipo_movimiento").focus();      
  }else{
  var i = 1; //contador para asignar id al boton que borrara la fila
  var fila = '<tr class="isres" id="row' + i + '"><td>' + tipo_movimiento + '</td><td>' + producto + '</td><td>' +almacen + '</td><td>' +almacen_d + '</td><td>' + cantidad + '</td><td>' + fecha + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
  i++;

    $('#mytable tr:first').after(fila);
    $("#adicionados").text(""); //esta instruccion limpia el div adicionado para que no se vayan acumulando
    
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
    //le resto 1 para no contar la fila del header
    document.getElementById("tipo_movimiento").value ="";
    document.getElementById("producto").value = "";
    document.getElementById("almacen").value = "";
    document.getElementById("almacen_destino").value = "";
    document.getElementById("cantidad").value = "";
    document.getElementById("fecha").value = "";
    document.getElementById("tipo_movimiento").focus();
    }
  });
    
$(document).on('click', '.btn_remove', function() {
  var button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    $("#adicionados").text("");
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
  });
});

//validar campo cantidad
const campoNumerico = document.getElementById('cantidad');

campoNumerico.addEventListener('keydown', function(evento) {
  const teclaPresionada = evento.key;
  const teclaPresionadaEsUnNumero =
    Number.isInteger(parseInt(teclaPresionada));

  const sePresionoUnaTeclaNoAdmitida = 
    teclaPresionada != 'ArrowDown' &&
    teclaPresionada != 'ArrowUp' &&
    teclaPresionada != 'ArrowLeft' &&
    teclaPresionada != 'ArrowRight' &&
    teclaPresionada != 'Backspace' &&
    teclaPresionada != 'Delete' &&
    teclaPresionada != 'Enter' &&
    !teclaPresionadaEsUnNumero;
  const comienzaPorCero = 
    campoNumerico.value.length === 0 &&
    teclaPresionada == 0;

  if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
    evento.preventDefault(); 
  }

});

var tipo = document.getElementById('tipo_movimiento');

tipo.addEventListener("change", function(){
	if (tipo.value.toUpperCase() == '3') {
		document.getElementById('almacen_destino').disabled = false;
	}else {
		document.getElementById('almacen_destino').disabled = true;
	}
});

