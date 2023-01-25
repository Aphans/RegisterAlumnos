<?php
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL statement to create table
    $sql = "CREATE TABLE usuarios (
        NIF VARCHAR(10) PRIMARY KEY,
        Nombre VARCHAR(10) NOT NULL,
        primerApellido VARCHAR(10) NOT NULL,
        segundoApellido VARCHAR(10) NOT NULL,
        email VARCHAR(50),
        UNIQUE (NIF)
    )";
    
    

    if (mysqli_query($conn, $sql)) {
        echo "Table usuarios created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
