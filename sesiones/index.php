<?php
require_once '../config.php';
if (count($_POST) > 0) {
    if (sesiones::login($_POST['username'], $_POST['password'])) {
        redirect();
    } else {
        $msg = 'Usuario o contraseña inválidos';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Control de documentos</title>

        <link rel="icon" href="/favicon.ico"/>
        <link rel="shortcut icon" href="/favicon.ico"/>
        <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    </head>
    <body>
        <div class="content-fluid">
            <div class="span4 offset4 well">
                <legend>Inicio de sesión</legend>
                <form method="POST" action="." accept-charset="UTF-8">
                    <div class="control-group">
                        <!-- Username -->
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="Usuario" class="span4">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="Contraseña" class="span4">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn">Entrar</button>
                        </div>
                    </div>
                </form>
                <?php if (strlen($msg) > 1) { ?>
                    <p class="error"><?php echo $msg ?></p>
                <?php } ?>
            </div>
        </div>
        <!--
        <div id="page">
            <div id="content">
                <div id="inner">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td>
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
                                        </fieldset>
                                    </form>
                                </td>
                        </tbody>
                    </table>	
                </div>
            </div>
        </div>
    </div>
        -->
    </body>
</html>
