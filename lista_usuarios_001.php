<?php
    // Conexión a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "alumnos");

    // Inicializar variables para los valores de búsqueda
    $nombre = '';
    $email = '';

    // Verificar si se han enviado valores de búsqueda
    if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }

    // Consulta para obtener todos los alumnos
    $query = "SELECT * FROM alumnos";
    if(!empty($nombre) || !empty($email)) {
        $query .= " WHERE ";
    }
    if(!empty($nombre)) {
        $query .= "nombre LIKE '%$nombre%'";
    }
    if(!empty($nombre) && !empty($email)) {
        $query .= " AND ";
    }
    if(!empty($email)) {
        $query .= "email LIKE '%$email%'";
    }
    $result = mysqli_query($conn, $query);

    // Mostrar resultados en una tabla
    echo "<table>";
    echo "<tr>";
    echo "<th>NIF</th>";
    echo "<th>Nombre</th>";
    echo "<th>Primer Apellido</th>";
    echo "<th>Segundo Apellido</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>". $row['NIF'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['primerApellido'] . "</td>";
        echo "<td>" . $row['segundoApellido'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        $edit_button = "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#editModal' data-nif='".$row['NIF']."' data-nombre='".$row['Nombre']."' data-email='".$row['email']."'>Editar</button>";
        echo "<td>" .$edit_button . "</td";
        echo "</tr>";
        }
        echo "</table>";
        // Cerrar conexión a la base de datos
        mysqli_close($conn);        
?>