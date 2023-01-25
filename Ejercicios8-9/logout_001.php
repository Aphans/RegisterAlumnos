<?php
session_start();

// Destruir la sesión
session_destroy();

unset($_SESSION['username']);
unset($_SESSION['logged_in']);

// Redirigir al usuario al formulario de inicio de sesión
header("Location: login_001.php");
?>
