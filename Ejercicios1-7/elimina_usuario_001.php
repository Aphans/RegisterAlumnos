<?php
ini_set('display_errors', 1);
// Recibir los datos del formulario
$buscar = $_POST['buscar'];

// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root", "", "alumnos");

// Eliminar el usuario
$sql = "DELETE FROM usuarios WHERE NIF = '$buscar' OR Nombre = '$buscar' OR email = '$buscar'";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    echo "Usuario eliminado correctamente";
} else {
    echo "Error al eliminar el usuario";
}


// Mostrar todos los registros
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conn, $sql);

echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['NIF'] . "</td>";
    echo "<td>" . $row['Nombre'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Cerrar la conexión
mysqli_close($conn);

?>
