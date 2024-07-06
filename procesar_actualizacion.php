<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Celulares";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    
    // Manejo de la imagen
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($imagen));
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imgContenido' WHERE id=$id";
    } else {
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado exitosamente";
        echo '<br><a href="Celulares.php">Volver a la lista de productos</a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
