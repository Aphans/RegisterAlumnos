<?php
session_start();

// Verificar si hay una sesión iniciada
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Mostrar mensaje de bienvenida y enlace para cerrar sesión
    echo "Bienvenido, " . $_SESSION['username'] . "!";
    echo "<br><a href='logout_001.php'>Cerrar sesión</a>";
} else {
    // Redirigir al usuario al formulario de inicio de sesión
    header("Location: login_001.php");
}
?>
