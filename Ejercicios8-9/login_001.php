<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($host, $username, $password, $dbname);
echo '<h2> Iniciar sesión </h2>';

// Verificar si se ha enviado el formulario
if (isset($_POST['submit'])) {
    // Recibir datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar si existe el usuario
    $query = "SELECT * FROM usuarios WHERE Nombre = '$username' AND passw = '$password'";
    $result = mysqli_query($conn, $query);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($result) > 0) {
        // Iniciar sesión y almacenar datos del usuario en variables de sesión
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;

        // Redirigir al usuario a la página de bienvenida
        header("Location: welcome.php");
    } else {
        // Mostrar mensaje de error
        echo "Usuario o contraseña incorrectos";
        echo "<br><a href='login_001.php'>Iniciar sesión</a>";
    }
} elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Mostrar datos del usuario y enlace para cerrar sesión
    echo "Bienvenido, " . $_SESSION['username'] . "!";
    echo "<br><a href='logout_001.php'>Cerrar sesión</a>";
} else {
    // Mostrar formulario de inicio de sesión
    echo '<form action="login_001.php" method="post">';
    echo '  <label for="username">Nombre de usuario:</label>';
    echo '  <input type="text" name="username" id="username">';
    echo '  <br>';
    echo '  <label for="password">Contraseña:</label>';
    echo '  <input type="password" name="password" id="password">';
    echo '  <br>';
    echo '  <input type="submit" name="submit" value="Iniciar sesión">';
    echo '</form>';
}

mysqli_close($conn);
?>
