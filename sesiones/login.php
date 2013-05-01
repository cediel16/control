<?php

require_once '../config.php';

if (!sesiones::login($_POST['username'], $_POST['password'])) {
    header('location: .?error=1');
} else {
    header('location: ..');
}
?>
