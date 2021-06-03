<?php
// Initialize the session
session_start();

require_once 'config.php';

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<?php
$reservasSalon = "SELECT * FROM reservas where tipo = 'salon' group by fecha";


if (mysqli_query($link, $reservasSalon)) {
    $salon = mysqli_query($link, $reservasSalon);
} else {
    echo "Error: " . $reservasSalon . "<br>" . mysqli_error($link);
}

$fechasOcupadas = [];
foreach ($salon as $row) {
    $fechasOcupadas[] .= $row['fecha'];
}

//$horasBotones = array_diff($horasDisponibles, $horasOcupadas);
$fechas = "SELECT DAY(fecha) as 'dia' FROM reservas where tipo = 'salon' group by fecha";


if (mysqli_query($link, $fechas)) {
    $lasfechas = mysqli_query($link, $fechas);
} else {
    echo "Error: " . $fechas . "<br>" . mysqli_error($link);
}

$diasLibres = [];
for ($i = 1; $i <= 30; $i++) {
    $diasLibres[] .= $i;
}

$diasOcupados = [];
foreach ($lasfechas as $row) {
    $diasOcupados[] .= $row['dia'];
}

$diasSelect = array_diff($diasLibres, $diasOcupados);
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- basic -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">

        <title>Poleñino - Reservar</title>
        <meta name="author" content="Paula Olivar Mur" />
        <meta name="keywords" content="">
        <meta name="description" content="">

        <!-- fevicon -->
        <link rel="shortcut icon" href="../imgs/escudo.png" type="image/png">

        <!--cambio tipografia-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">

        <!--link bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!--enlazar css-->
        <link href="../css/index.css" rel="stylesheet" type="text/css">

    </head>
</head>
<body>
    <!--Fluid, se adapta al ancho de la pantalla-->
    <div class="container-fluid">
        <div class="row">
            <header>
                <!--Header: TÍTULO DE LA WEB-->
                <div class="row">
                    <img src="../imgs/tira.jpg" alt="" class="banner">
                </div>

                <!--Header: BARRA DE NAVEGACIÓN: asignamos nombres y asignamos color de fondo-->
                <nav class="navbar navbar-expand-lg navbar-light borde">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="../index.html">
                            <img src="../imgs/escudo.png" alt="" width="22" height="30" class="d-inline-block align-text-top"> Ayuntamiento de Poleñino
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <!--Header: BARRA DE NAVEGACIÓN: activamos la Página principal -->
                                <li class="nav-item">
                                    <a href="../index.html" class="nav-link ">Municipio</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../php/noticias.php" class="nav-link">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../pages/agenda.html" class="nav-link">Agenda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../pages/rutas.html">Rutas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../php/login.php" class="nav-link active" aria-current="page">Reservas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://polenino.sedipualba.es/" class="nav-link">Sede Electrónica</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!--Header: BARRA DE NAVEGACIÓN: -->
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.navbar-nav li').click(function () {
                            $('.navbar-nav a').removeClass('active');
                            $(this).find('a').addClass('active'); //dentro de this=navbar-nav li
                            // encuentra los descendientes a y añádeles la clase.active
                            //$(this).children().addClass('active');//otra forma de añadir la clase.
                            //Selecciona los hijos de li donde hago click y les añade la clase.active.
                        });
                    });
                </script>
            </header>
            <main>
                <div class="row border-2 shadow-lg p-3 mb-3 bg-white ">
                    <!--ALERT-->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>¡Atención!</strong> El salón se reserva para celebrar acontecimientos, dispone de escenario y baños. Se reserva por día. <br> Antes de dejarlo, se deberá quedar limpio.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div>
                        <a href="welcome.php" class="btn btn-outline-dark my-2">Volver</a>
                    </div>

                    <h3 class="text-center my-2">Reservar Salón</h3>
                    <div class="col-sm-12 my-2">
                        <div class="row my-3">
                            <div class="col-sm-3 ">
                                <a class="btn btn-info btn-lg my-3 disabled" href="salon.php" role="button">Salón</a>  
                                <img src="../imgs/salon.jpg" width="90%"  />
                            </div>
                            <div class="col-sm-9">    
                                <form action="../php/agregarReserva.php" method="post">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre al que se hace la reserva</label>
                                            <input type="text" class="form-control" id="nombre" required name="nombre" value="" placeholder="Escribe tu nombre" />
                                        </div>
                                    </div> <!--pedir nombre-->

                                    <div class="col-sm-12">
                                        <div class="form-group my-2">
                                            <label for="telefono">Teléfono</label>
                                            <input type="number" class="form-control" id="telefono" required pattern="^[9|8|7|6]\d{8}$" name="telefono" value="" placeholder="Escribe tu teléfono" />
                                        </div>
                                    </div> <!--pedir telefono-->

                                    <div class="col-sm-12">
                                        <div class="form-group my-2">
                                            <label for="fecha">Fecha</label>
                                            <select name="dia">
                                                <?php
                                                foreach ($diasSelect as $row) {
                                                    echo "<option value='" . $row . "' name='dia'>" . $row . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <select name="mes">
                                                <option value="<?php echo date('m'); ?>" name="mes"><?php echo date('m'); ?></option>
                                            </select >
                                            <select name="year">
                                                <option value="2021" name="year">2021</option>
                                            </select>
                                            <!--<input type="date" min="2021-01-01" max="2021-12-31" required class="form-control"  id="fecha" name="fecha" value="" />-->
                                        </div>
                                    </div> <!--pedir fecha-->

                                    <input type="hidden" name="hora" value="<?php echo "Reservado todo el día"; ?>">

                                    <input type="hidden" name="tipo" value="<?php echo "salon"; ?>">

                                    <div class="form-group my-4 text-center">
                                        <input type="submit" class="btn btn-primary" value="Reservar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </main>

    <!-- footer -->
    <footer class="text-center footer-style ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-3 footer-col ">
                    <img src="../imgs/escudo.png " class="escudo " />
                    <p>Ayuntamiento de Poleñino</p>
                </div>

                <div class="col-md-3 footer-col ">
                    <h4>Dirección</h4>
                    <p> Pz. San Sebastian, 1 - 22216 Poleñino (Huesca)</p>
                </div>

                <div class="col-md-3 footer-col ">
                    <h4>Contacto</h4>
                    <p>Tlf: 974.39.52.01 - aytopole@hotmail.com</p>
                </div>

                <div class="col-md-3 footer-col ">
                    <h4>Siguenos en:</h4>
                    <a target="_blank " href="https://es-es.facebook.com/pages/category/Community/Pole%C3%B1ino-122635227810025/ "><img src="../imgs/facebook.png " class="icono "></a>
                    <a target="_blank " href="https://www.instagram.com/explore/locations/383612519/polenino-spain/?hl=es "><img src="../imgs/instagram.png " class="icono "></a>
                </div>
                <!-- Copyright -->
                <div class="copyright ">
                    © 2021 Copyright: <a class="text-white " href="# ">Paula Olivar Mur</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- fin footer -->
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js "></script>
<!--está declarada la variable $ de jQuery, por tanto debe ir primero-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js " integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW " crossorigin="anonymous "></script>

<script type="text/javascript ">
    $(document).ready(function() {});
</script>



</body>

</html>