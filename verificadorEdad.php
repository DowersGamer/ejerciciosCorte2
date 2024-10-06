<?php
  date_default_timezone_set('America/Bogota');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./libraries/css/index.css">
  <title>Ejercicios PHP</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Ejercicios Unidad 2</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-0 ms-auto mb-2 mb-lg-0">
          <li class="nav-item mx-3">
            <a class="nav-link" aria-current="page" href="index.php">Calculadora interes simple</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link active" href="#">Verificador de edad</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="IMC.php">Calculadora de IMC</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="container descripcionPagina mt-2 mb-2 fw-bold d-flex flex-column align-items-center justify-content-center">
      <h1>Verificador de edad</h1>
      <p>En este apartado, podras calcular si una persona es mayor de edad, usando su fecha de nacimiento.</p>
    </div>
    <div class="card">
      <h5 class="card-header">Verificador de edad</h5>
      <div class="card-body">
        <form class="row justify-content-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="col-md-4">
            <div class="form-floating">
              <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimiento" required max='<?php echo(date('Y-m-d'))?>'>
              <label for="floatingInputGrid">Fecha de nacimiento<span class='texto-rojo'>*</span></label>
            </div>
          </div>
          <div class='col-12 mt-3 d-flex justify-content-center'>
            <button type='submit' class="btn btn-sm btn-success" id="btnCalcularFecha">Verificar edad</button>
          </div>
        </form>
      </div>
    </div>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $fechaNacimiento = new DateTime($fechaNacimiento);
        $fechaCumple18 = clone $fechaNacimiento; 
        $fechaCumple18->modify('+18 years');
        $fechaActual = new DateTime();
        $edad = $fechaActual->diff($fechaNacimiento);
        if ($fechaActual->format('Y-m-d') == $fechaCumple18->format('Y-m-d')) {
            echo('<div class="alert alert-primary fw-bold mt-3">Felicidades, a partir de hoy eres mayor de edad!</div>');
        } else if ($edad->y >= 18) {
            echo('<div class="alert alert-success fw-bold mt-3">Eres mayor de edad!</div>');
        } else {
            echo('<div class="alert alert-warning fw-bold mt-3">Aun no eres mayor de edad!</div>');
        }
    ?>
    <?php
      }
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="./libraries/js/index.js"></script>
</body>
</html>