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
$id = $_SESSION["id"];

//ver reservas PADEL de base de datos
$verPadel = "SELECT id_reserva, nombre, telefono, fecha, hora FROM `reservas` WHERE id_usuario = '$id' AND tipo = 'padel' ORDER BY id_reserva;";

if (mysqli_query($link, $verPadel)) {
    $padel = mysqli_query($link, $verPadel);
} else {
    echo "Error: " . $verPadel . "<br>" . mysqli_error($link);
}


//ver reservas SALON de base de datos
$verSalon = "SELECT id_reserva, nombre, telefono, fecha FROM `reservas` WHERE id_usuario = '$id' AND tipo = 'salon' ORDER BY fecha;";

if (mysqli_query($link, $verSalon)) {
    $salon = mysqli_query($link, $verSalon);
} else {
    echo "Error: " . $verSalon . "<br>" . mysqli_error($link);
}


//ver reservas MERENDERO de base de datos
$verMerendero = "SELECT id_reserva, nombre, telefono, fecha FROM `reservas` WHERE id_usuario = '$id' AND tipo = 'merendero' ORDER BY fecha DESC;";

if (mysqli_query($link, $verMerendero)) {
    $merendero = mysqli_query($link, $verMerendero);
} else {
    echo "Error: " . $verMerendero . "<br>" . mysqli_error($link);
}

//borrar
if (isset($_POST["id_reserva"])) {
//Se almacena en una variable el id del registro a eliminar
    $id_reserva = $_POST["id_reserva"];

//Preparar la consulta
    $consulta = "DELETE FROM `reservas` WHERE id_reserva= '$id_reserva'";

//Ejecutar la consulta
    if (mysqli_query($link, $consulta)) {
        $borrado = mysqli_query($link, $consulta);
        header("Refresh:0");
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($link);
    }
}

//cerrar
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- basic -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <meta http-equiv="X-UA-Compatible" content="IE = edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <meta name="viewport" content="initial-scale = 1, maximum-scale = 1">

        <title>Poleñino - Reservar</title>
        <meta name="author" content="Paula Olivar Mur" />
        <meta name="keywords" content="">
        <meta name="description" content="">

        <!-- fevicon -->
        <link rel="shortcut icon" href="../imgs/escudo.png" type="image/png">

        <!--cambio tipografia-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href = "https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel = "stylesheet">

        <!--link bootstrap-->
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin = "anonymous">
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin = "anonymous">
        <script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin = "anonymous"></script>
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
                    $(".navbar-nav li').click(function () {
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
                <!--mostrar contenido boton -->
                <script>
                    window.addEventListener("load", mostrar);
                    function mostrar1() {
                    var x = document.getElementById('alerta1');
                    if (x.style.display === 'none') {
                    x.style.display = 'block';
                    } else {
                    x.style.display = 'none';
                    }
                    }
                    window.addEventListener("load", mostrar);
                    function mostrar2() {
                    var x = document.getElementById('alerta2');
                    if (x.style.display === 'none') {
                    x.style.display = 'block';
                    } else {
                    x.style.display = 'none';
                    }
                    }
                    window.addEventListener("load", mostrar);
                    function mostrar3() {
                    var x = document.getElementById('alerta3');
                    if (x.style.display === 'none') {
                    x.style.display = 'block';
                    } else {
                    x.style.display = 'none';
                    }
                    }
                </script>

                <div class="row border-2 shadow-lg p-3 mb-3 bg-white ">
                    <!--PERFIL-->
                    <div class="col-sm-2 " id="morecsspure">
                        <div class=" my-2 iconoUsuario">
                            <a title="Inicio" href="../php/welcome.php"><img src="../imgs/usuario.png"  width="65%" /></a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ajustes
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                                    <a class="dropdown-item" href="reset-password.php">Cambiar contraseña</a>
                                    <a class="dropdown-item" href="misreservas.php">Ver mis reservas</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="welcome.php" class="btn btn-outline-dark my-2">Volver</a>
                        </div>
                    </div>

                    <div class="col-sm-10  text-center " id="morecsspure">
                        <h3> Listado de mis reservas </h3>
                        <div class="col-sm-12 ">
                            <div class="row my-3">
                                <form>
                                    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                                        <button type="button" onclick="mostrar1()" class="btn btn-info btn-lg my-3">Pista Pádel</button>
                                        <button type="button" onclick="mostrar2()" class="btn btn-info btn-lg my-3">Salón</button>
                                        <button type="button" onclick="mostrar3()" class="btn btn-info btn-lg my-3">Merendero</button>
                                    </div>
                                </form>

                                <div class="col-sm-12  text-center">
                                    <div>
                                        <div id="alerta1">
                                            <table class="table table-striped">
                                                <thead>
                                                <h2>Padel</h2>
                                                <tr>
                                                    <th>ID RESERVA</th>
                                                    <th>NOMBRE</th>
                                                    <th>TELÉFONO</th>
                                                    <th>FECHA</th>
                                                    <th>HORA</th>
                                                    <th>BORRAR</th>
                                                </tr>
                                                </thead>
                                                <?php foreach ($padel as $row) { ?> 
                                                    <tr>
                                                        <td><?php echo $row['id_reserva'] ?></td>
                                                        <td><?php echo $row['nombre'] ?></td>
                                                        <td><?php echo $row['telefono'] ?></td>
                                                        <td><?php echo $row['fecha'] ?></td>
                                                        <td><?php echo $row['hora'] ?></td>
                                                        <td><form method='post' action=''> 
                                                                <input type='hidden' name='id_reserva' value="<?php echo $row['id_reserva'] ?>">
                                                                <input type='submit' value='Eliminar'>
                                                            </form></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <div id="alerta2">
                                            <table class="table table-striped">
                                                <thead>
                                                <h2>Salón</h2>
                                                <tr>
                                                    <th>ID RESERVA</th>
                                                    <th>NOMBRE</th>
                                                    <th>TELÉFONO</th>
                                                    <th>FECHA</th>
                                                    <th>BORRAR</th>
                                                </tr>
                                                </thead>
                                                <?php foreach ($salon as $row) { ?> 
                                                    <tr>
                                                        <td><?php echo $row['id_reserva'] ?></td>
                                                        <td><?php echo $row['nombre'] ?></td>
                                                        <td><?php echo $row['telefono'] ?></td>
                                                        <td><?php echo $row['fecha'] ?></td>
                                                        <td><form method='post' action=''> 
                                                                <input type='hidden' name='id_reserva' value="<?php echo $row['id_reserva'] ?>">
                                                                <input type='submit' value='Eliminar'>
                                                            </form></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <div id="alerta3">
                                            <table class="table table-striped">
                                                <thead>
                                                <h2>Merendero</h2>
                                                <tr>
                                                    <th>ID RESERVA</th>
                                                    <th>NOMBRE</th>
                                                    <th>TELÉFONO</th>
                                                    <th>FECHA</th>
                                                    <th>BORRAR</th>
                                                </tr>
                                                </thead>
                                                <?php foreach ($merendero as $row) { ?> 
                                                    <tr>
                                                        <td><?php echo $row['id_reserva'] ?></td>
                                                        <td><?php echo $row['nombre'] ?></td>
                                                        <td><?php echo $row['telefono'] ?></td>
                                                        <td><?php echo $row['fecha'] ?></td>
                                                        <td><form method='post' action=''> 
                                                                <input type='hidden' name='id_reserva' value="<?php echo $row['id_reserva'] ?>">
                                                                <input type='submit' value='Eliminar'>
                                                            </form></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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