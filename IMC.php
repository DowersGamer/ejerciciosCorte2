<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./libraries/css/index.css">
  <title>Ejercicios PHP</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Ejercicios unidad 2</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-0 ms-auto mb-2 mb-lg-0">
          <li class="nav-item mx-3">
            <a class="nav-link" href="index.php">Calculadora interés simple</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="verificadorEdad.php">Verificador de edad</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link active" aria-current="page" href="#">Calculadora de IMC</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container text-center">
    <div
      class="container descripcionPagina mt-2 mb-2 fw-bold d-flex flex-column align-items-center justify-content-center">
      <h1>Calculadora de IMC</h1>
      <p>En esta calculadora podrás determinar tu índice de masa corporal</p>
    </div>
    <div class="card">
      <h5 class="card-header text-start">Calculadora de IMC</h5>
      <div class="card-body">
        <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="col">
            <div class="form-floating">
              <input type="number" class="form-control" id="inputPeso" name="inputPeso" placeholder="Ej: 100000"
                required>
              <label for="floatingInputGrid">Peso (En Kg) <span class='texto-rojo'>*</span></label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input step="0.01" type="number" class="form-control" id="inputAltura" name="inputAltura" placeholder="Ej: 50%" required>
              <label for="floatingInputGrid">Estatura (En metros) <span class='texto-rojo'>*</span></label>
            </div>
          </div>
          <div class='row mt-3'>
            <div class="col-md-auto">
              <button type='submit' class="btn btn-sm btn-success" id="btnCalculoIMC">Calcular IMC</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["inputAltura"] != 0) {
        $peso = floatval($_POST["inputPeso"]);
        $altura = floatval($_POST["inputAltura"]);
        $resultado = round($peso/($altura*$altura), 1);
        $imp = $resultado < 18.5?'Bajo peso':($resultado < 24.9?'Peso saludable':($resultado < 29.9?'Sobre peso':'Obesidad'));
    ?>
    <div class="card mt-5">
      <h5 class="card-header">Resultado</h5>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control" value="<?php echo(number_format($peso ?? 0, 2, ',','.'))?>"
                disabled>
              <label for="floatingInputGrid">Peso en Kg</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control" value="<?php echo(number_format($altura ?? 0, 2, ',','.'))?>"
                disabled>
              <label for="floatingInputGrid">Estatura en Metros</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control"
                value="<?php echo("$imp (".number_format($resultado ?? 0, 2, ',','.').")"); ?>" disabled>
              <label for="floatingInputGrid">IMC</label>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 
 } ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="./libraries/js/index.js"></script>
</body>

</html>