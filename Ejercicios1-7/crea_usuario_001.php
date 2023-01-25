<?php 
ini_set('display_errors', 1);
//Importo la clase Alumno
require_once("ClassAlumno.php");
//Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "test");
//Comprobamos la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conexión exitosa<br>";

$NIF = $_POST['NIF'];
$nombre = $_POST['nombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];

// Encriptar la contraseña
$salt = md5($passwd);
$pasword_encript = crypt($passwd, $salt);

// Insertar los datos en la tabla
$sql = "INSERT INTO usuarios (NIF, Nombre,passw, primerApellido, segundoApellido,email) VALUES ('$NIF','$nombre','$pasword_encript','$primerApellido', '$segundoApellido','$email')";

//Comprobar si el registro es realizado con exito
if ($conexion->query($sql) === TRUE) {
    echo "El alumno ha sido registrado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<br>";
echo "<br>";
//Consulta para seleccionar todos los alumnos
$sql = "SELECT nif, nombre, primerapellido, segundoapellido FROM usuarios";
$resultado = mysqli_query($conexion, $sql);
//Creamos variables para almacenar los resultados obtenidos
$nifObtenido = "";
$nombreObtenido = "";
$primerApellidoObtenido = "";
$segundoApellidoObtenido = "";
//Comprobamos la consulta
if (mysqli_num_rows($resultado) > 0) {
    //Recorremos los resultados y los guardamos en las variables que hemos creado
    while($fila = mysqli_fetch_assoc($resultado)) {
        $nifObtenido = $fila["nif"];
        $nombreObtenido = $fila["nombre"];
        $primerApellidoObtenido = $fila["primerapellido"];
        $segundoApellidoObtenido = $fila["segundoapellido"];
        $alumno = new Alumno(); //Creamos un objeto de la clase Alumno
        //Usando métodos mágicos
        $alumno->nif=$nifObtenido;//Establecemos un nif
        $alumno->nombre=$nombreObtenido;//Establecemos un nombre
        $alumno->primerApellido=$primerApellidoObtenido;//Establecemos el primer Apellido
        $alumno->segundoApellido=$segundoApellidoObtenido;//Establecemos el segundo Apellido
        $alumno->email=$email;//Establecemos el email
        $alumno->pinta_Alumno(); //Imprimos el objeto
    }
    
} else {
    echo "No hay alumnos en la base de datos";
}
//Cerramos la conexión
mysqli_close($conexion);
unset($alumno1);//Destruimos el alumno 1
Alumno::getNumeroAlumnos();//Obtenemos el número de alumnos
?>