<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese un usuario.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuario ya fue tomado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirma tu contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "No coincide la contraseña.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
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

        <title>Poleñino - Register</title>
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
                    <div class="container">
                        <h2 class="titulo">Registro</h2>
                        <p>Por favor, complete este formulario para crear una cuenta.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Email</label>
                                <input type="email" name="username" class="form-control" placeholder="Ej.: usuario@servidor.com" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>    
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Iniciar">
                                <input type="reset" class="btn btn-default" value="Borrar">
                            </div>
                            <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar aquí</a>.</p>
                        </form>
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