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
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    // Manejo de la imagen
    $imagen = $_FILES['imagen']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($imagen));

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$imgContenido')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Celulares.css">
    <style>
    body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #007bff;
        }
        .jumbotron {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 4rem 1rem;
            margin-bottom: 2rem;
        }
        .jumbotron h1 {
            font-size: 3rem;
            font-weight: 300;
        }
        .jumbotron p {
            font-size: 1.25rem;
        }
        .container-sm {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-top: 1rem;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            margin-top: 1rem;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
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
    
<form action="insertar.php" method="post" enctype="multipart/form-data">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br><br>
  <label for="descripcion">Descripción:</label>
  <textarea id="descripcion" name="descripcion"></textarea><br><br>
  <label for="precio">Precio:</label>
  <input type="text" id="precio" name="precio"><br><br>
  <label for="imagen">Imagen:</label>
  <input type="file" id="imagen" name="imagen"><br><br>
  <input type="submit" value="Agregar Producto">
</form>
 <!-- Footer -->
 <footer class="footer bg-dark text-light">
    <div class="container">
      <p>&copy; 2024 Remind. Todos los derechos reservados.</p>
    </div>
  </footer>
  <br><br><br><br>
    
</body>
</html>