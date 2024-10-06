<?php
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
            <a class="nav-link active" aria-current="page" href="#">Calculadora interes simple</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="verificadorEdad.php">Verificador de edad</a>
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
      <h1>Calculadora de interes simple</h1>
      <p>En esta calculadora podras determinar el monto de interes ganados en un determinado tiempo</p>
    </div>
    <div class="card">
      <h5 class="card-header">Calculadora de interes simple</h5>
      <div class="card-body">
        <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="col-md-4">
            <div class="form-floating">
              <input type="number" class="form-control" id="inputMonto" name="inputMonto" placeholder="Ej: 100000" required>
              <label for="floatingInputGrid">Monto inicial <span class='texto-rojo'>*</span></label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input type="number" class="form-control" id="inputTasa" name="inputTasa" placeholder="Ej: 50%" required>
              <label for="floatingInputGrid">Tasa de interes <span class='texto-rojo'>*</span></label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input type="number" class="form-control" id="inputTiempo" name="inputTiempo" placeholder="Ej: 2" required>
              <label for="floatingInputGrid">Tiempo a calcular (en meses) <span class='texto-rojo'>*</span></label>
            </div>
          </div>
          <div class='col-2 mt-3'>
            <button type='submit' class="btn btn-sm btn-success" id="btnCalcularImpuesto">Calcular impuesto</button>
          </div>
        </form>
      </div>
    </div>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["inputMonto"] != 0) {
        $monto = intval($_POST["inputMonto"]);
        $tasa = intval($_POST["inputTasa"]);
        $tiempo = intval($_POST["inputTiempo"]);
        $resultado = $monto + ($monto*($tasa/100))*$tiempo;
    ?>
      <div class="card mt-5">
        <h5 class="card-header">Resultado</h5>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" value="$ <?php echo(number_format($monto ?? 0, 0, ',','.'))?>" disabled>
                <label for="floatingInputGrid">Monto recibido</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" value="<?php echo(number_format($tasa ?? 0, 0, ',','.'))?>" disabled>
                <label for="floatingInputGrid">Tasa de interes recibida</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" value="<?php echo(number_format($tiempo ?? 0, 0, ',','.'))?>" disabled>
                <label for="floatingInputGrid">Tiempo recibido</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control mt-4" value="$ <?php echo(number_format($resultado ?? 0, 0, ',','.')) ?>" disabled>
                <label for="floatingInputGrid">Resultado</label>
              </div>
            </div>
          </div>
        </div>
      </div>
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