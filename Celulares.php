<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InnovatePhone</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="Celulares.css">
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
            <a class="nav-link" href="Actualizar2.php">Actualizar</a>
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
      <h2>Modelos mas vendidos</h2>
      <div class="row">
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

        $sql = "SELECT id, nombre, descripcion, precio, imagen FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '" class="card-img-top" alt="' . $row["nombre"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                echo '<p class="card-text"><strong>Precio: $' . $row["precio"] . '</strong></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay productos disponibles.</p>';
        }

        $conn->close();
        ?>
      </div>
    </section>
  </main>
  <br><br><br><br>

  <!-- Footer -->
  <footer class="footer bg-dark text-light">
    <div class="container">
      <p>&copy; 2024 Remind. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>
