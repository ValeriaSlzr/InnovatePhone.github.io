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
  <title>Actualizar Producto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="Celulares.css">
  <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            padding-top: 3rem;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control, .form-control-file {
            margin-top: 0.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        img {
            display: block;
            margin-top: 1rem;
            max-width: 100%;
            height: auto;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }
    </style>
</head>
<body>
         <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Celulares.php">Innovate Phone</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Insertar.php">Agregar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Actualizar.php">Actualizar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Eliminar.php">Eliminar</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Header -->
  <header class="jumbotron">
    <div class="container">
      <h1>Innovate Phone</h1>
      <p>Celulares de última generación con el mejor soporte técnico</p>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container-sm">
    <section>
  <div class="container">
    <h2>Actualizar Producto</h2>
    <form action="procesar_actualizacion.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $row['descripcion']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $row['precio']; ?>">
      </div>
      <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="<?php echo $row['nombre']; ?>" style="max-width: 200px;">
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</body>
</html>
