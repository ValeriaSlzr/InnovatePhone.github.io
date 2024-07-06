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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el producto.";
        exit();
    }
} else {
    echo "ID no especificado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrar Producto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Borrar Producto</h2>
    <p>¿Estás seguro de que quieres borrar el siguiente producto?</p>
    <div class="card">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen']); ?>" class="card-img-top" alt="<?php echo $row['nombre']; ?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
        <p class="card-text"><?php echo $row['descripcion']; ?></p>
        <p class="card-text"><strong>Precio: $<?php echo $row['precio']; ?></strong></p>
      </div>
    </div>
    <form action="procesar_borrado.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <button type="submit" class="btn btn-danger">Sí, borrar</button>
      <a href="Celulares.php" class="btn btn-secondary">No, regresar</a>
    </form>
  </div>
  <br><br>
</body>
</html>
