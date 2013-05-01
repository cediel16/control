<?php
session_start();
require_once 'config.php';

sesiones::logged_in();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sala Situacional Carabobo</title>
        <link href="img/favicon.ico" rel="icon"/>
        <link href="img/favicon.ico" rel="shortcut icon"/>

        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/style2.css" type="text/css" />

        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/chat.css" type="text/css" />

        <link rel="stylesheet" href="js/jquery-ui/css/smoothness/style.css" type="text/css" />
        <link rel="stylesheet" href="css/tree-view.css" type="text/css" />
        <link href="css/menu.css" rel="stylesheet" type="text/css">

        <link type="text/css" rel="stylesheet" media="all" href="js/chat/css/chat.css" />
        <link type="text/css" rel="stylesheet" media="all" href="js/chat/ccs/screen.css" />

        <script src="js/jquery-ui/js/jquery-1.8.0.min.js"></script>
        <script src="js/jquery-ui/js/jquery-ui-1.8.23.custom.min.js"></script>
        <script src="js/chat/js/chat.js"></script>        
        <script src="js/funciones.js"></script>
        <script type="text/javascript">
            $(document).ready( function() {
                $( "#tabs" ).tabs({
                    collapsible: true
                });
            });
        </script>

        <style type="text/css">
            #defaultCountdown { 
                height:30px;
                width:160px;
                position:absolute;
                display:inline;
                float:right;
                margin:10px 10px 10px 310px;
            }
        </style>
        <script type="text/javascript" src="js/jquery.countdown/jquery.countdown.js"></script>
        <script type="text/javascript" src="js/jquery.countdown/jquery.countdown-es.js"></script>
    </head>
    <body>
        <div id="page">
            <?php require('menu_sup.php'); ?>
            <div id="header">
                <h1>Sala Situacional Carabobo</h1>
                <div id="userdata">
                    <?php echo '<a  href="http://1x10.psuv.org.ve/sistema" target="_blank">1x10</a>'; ?> | <?php echo $_SESSION['usuario'] ?> | <a title="Salir del Sistema" href="session/logout.php">Salir</a>
                </div>
            </div><!-- header -->
            <?php require('menu_inf.php'); ?>
            <div id="main">
                <div class="rounded" id="menu">
                    <?php //echo select_centros();  ?>
                    <?php echo menu_centros(); ?>
                </div>
                <div class="rounded" id="content">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Incidencias</a></li>
                            <li><a href="#tabs-2">Patrulleros</a></li>
                            <li><a href="#tabs-3">Anillos (cero)</a></li>
                        </ul>
                        <div id="tabs-1">
                            <h2>Seleccione un centro electoral</h2>
                        </div>
                        <div id="tabs-2">
                            <h2>Seleccione un centro electoral</h2>
                        </div>
                        <div id="tabs-3">
                            <h2>Seleccione un centro electoral</h2>
                        </div>
                    </div>
                </div> <!-- content -->
                <div class="clearfix"></div>
            </div> <!-- main -->
            <div id="footer">
                <ul>
                    <li>&copy; PSUV 2012</li>
                    <li>Sala Situacional Carabobo</li>
                    <li>desarrollado por <strong>Johel Cediel</strong></li>
                </ul>
            </div><!-- footer -->
        </div> <!-- page -->
        <div class="min-loader">
            <div>Cargando</div>
            <img src="img/ajax-loader2.gif"></img>
        </div>
    </body>
</html>
