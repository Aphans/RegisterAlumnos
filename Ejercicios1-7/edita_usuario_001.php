<?php
    // Conexión a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "test");

    // Verificar si se ha enviado el formulario
    if(isset($_POST['editar'])) {
        // Obtener valores del formulario
        $nif = $_POST['nif'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        // Crear consulta de actualización
        $query = "UPDATE usuarios SET";
        if(!empty($nombre)) {
            $query .= " nombre = '$nombre',";
        }
        if(!empty($email)) {
            $query .= " email = '$email',";
        }
        $query = rtrim($query, ',');
        $query .= " WHERE nif = '$nif'";

        // Ejecutar consulta
        $result = mysqli_query($conn, $query);

        if($result) {
            echo "Los datos del usuario se han actualizado correctamente.";
        } else {
            echo "Error al actualizar los datos del usuario: " . mysqli_error($conn);
        }
    }
    echo "<br>";
    // Consulta para obtener todos los usuarios
    $query = "SELECT * FROM usuarios";
    $result = mysqli_query($conn, $query);

    // Mostrar resultados en una tabla
    echo "<table>";
    echo "<tr>";
    echo "<th>NIF</th>";
    echo "<th>Nombre</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>". $row['NIF'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        // Cerrar conexión a la base de datos
mysqli_close($conn);
?>  
