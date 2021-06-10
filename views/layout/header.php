<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
         <title>Sistema Logístico</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href = "https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel = "hoja de estilo">
        <link rel="stylesheet" href="http://localhost/SystemLog/css/estilos.css"> 
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        
        <!-- FIJAR BARRA DE MENU EN TODAS LAS VISTAS -->
        <script>
        posicionarMenu();
        
        $(window).scroll(function() {    
            posicionarMenu();
        });
        
        function posicionarMenu() {
            var altura_del_header = $('.header').outerHeight(true);
            var altura_del_menu = $('.menu').outerHeight(true);
        
            if ($(window).scrollTop() >= altura_del_header){
                $('.menu').addClass('fixed');
                $('.wrapper').css('margin-top', (altura_del_menu) + 'px');                
            } else {
                $('.menu').removeClass('fixed');
                $('.wrapper').css('margin-top', '0');               
            }
        }
        
    </script>

        
    </head>

    <body>
        <div class="header"> 
            <div class="container" style="text-align: center;">
                <h2><b>GESTION DE PRODUCTOS</b></h2>
            </div>
        </div>
        
