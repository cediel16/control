<?php
session_start();
require_once '../config.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Sala Situacional Carabobo</title>
        <style type="text/css">
            body * {
                font-family:Tahoma, Arial, sans-serif;
                font-size:10pt;
            }

            body {
                text-align:center;
                background-color: #e5e5e5;
            }

            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
            }

            #page {
                display: table;
                height: 100%;
                width: 100%;
                margin: 0;
            }

            #content {
                display: table-cell;
                vertical-align: middle;
                position: relative;
            }

            /* Formulario */
            table {
                margin:0 auto;
            }
            form *{
                color:#fff;
                text-align:left;
            }

            form {
                height: 500px;
                overflow: hidden;
                padding: 0;
                width: 325px;
                margin: 0 auto;
                background-color:#4C4C4C;
            }
            form h1 {
                background-color:#EF382A;
                font-size:30px;
                margin-top:0px;
                padding:25px;
                vertical-align:middle;
                width:300px;
                font-size:24px;
            }

            form fieldset {
                border: none;
                text-align:left;
                padding: 0;
                margin: 0;
                height: 500px;
                width: 300px;
                margin-left:25px;
            }

            input.text, input.button {
                background-color: #fff;
                border:1px solid #E5E5E5;
                color:#000000 !important;
                height:22px !important;
                padding:1px 2px !important;
                width:275px !important;
                margin-bottom:15px;
            }

            input.button {
                background-color:#CBCBCB;
                font-weight:bold;
                height:30px !important;
                margin-top:20px;
                padding:0 !important;
                text-align:center;
                text-transform:uppercase;
                width:90px !important;		
            }

            form label
            {
                display:block;
                font-weight:bold;
                vertical-align:bottom;
                width:300px;
                font-size:10pt;
                margin-bottom: 5px;
            }			

            form a {
                display: block;
                width: 300px;
                height: 20px;
                margin-bottom:5px;
                text-decoration: none;
            }

            .error{
                background:#FFFDC6 url("../img/erroricon.png") no-repeat 10px 50%;
                border:1px solid #740000;
                color:#740000;
                padding:10px 10px 10px 50px;
                width: 220px;
            }
        </style>

        <!--[if IE]>
        <style type="text/css">
        #inner {
              padding-top:expression((document.body.offsetHeight-50-document.getElementById('form').offsetHeight)/2+'px');
              height:expression(document.body.offsetHeight-50-document.getElementById('form').offsetHeight+'px');
        }
        </style>
        <![endif]-->		
        <link rel="icon" href="/favicon.ico"/>
        <link rel="shortcut icon" href="/favicon.ico"/>
        <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page">
            <div id="content">
                <div id="inner">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td>
                                    <!--
                                                                        <iframe 
                                                                            width="675" 
                                                                            height="500" 
                                                                            frameborder="0" src="img.php" 
                                                                            marginwidth="0" 
                                                                            marginheight="0" 
                                                                            vspace="0" 
                                                                            hspace="0" 
                                                                            style="border: 0pt solid black; height: 500px; overflow: hidden; width: 675px;"
                                                                        >
                                                                        </iframe>
                                    -->
                                    <div style="width:675px; height:500px; background:#FFFFFF url('../img/maduro_al_volante.png') no-repeat center;">
                                    </div>
                                </td>
                                <td style="vertical-align: top;">
                                    <form id="form" action="login.php" method="post">
                                        <h1>Sala Situacional Carabobo</h1>
                                        <fieldset>
                                            <label for="user">Nombre de usuario</label>
                                            <input type="text" id="user" name="user" class="text" />
                                            <label for="pass">Contrase&ntilde;a</label>
                                            <input type="password" id="pass" name="pass" class="text" />
                                            <input type="submit" value="Entrar" class="button" />
                                            <?php if ($_GET['error'] == 1) { ?>
                                                <p class="error">Usuario o contraseña inválidos</p>
                                            <?php } ?>
                                        </fieldset>
                                    </form>
                                </td>
                        </tbody>
                    </table>	
                </div>
            </div>
        </div>
    </div>
</body>
</html>
