<?php
// incluye archivo config
require_once "config.php";

if (isset($_POST['botonEnviar'])) {
    $titulo = " ";
    $desarrollo = " ";
    $titulo = $_POST['titulo'];
    $desarrollo = $_POST['desarrollo'];

    $subirNoticia = "INSERT INTO `noticias` (`id`, `titulo`, `desarrollo`, `img`, `enlace`) VALUES (NULL, '$titulo', '$desarrollo', '', '');";

    if (mysqli_query($link, $subirNoticia)) {
        $noticiaInsertada = mysqli_query($link, $subirNoticia);
    } else {
        echo "Error: " . $subirNoticia . "<br>" . mysqli_error($link);
    }
}
$mostrarNoticia = "SELECT * FROM `noticias` ORDER BY id DESC;";

if (mysqli_query($link, $mostrarNoticia)) {
    $noticia = mysqli_query($link, $mostrarNoticia);
} else {
    echo "Error: " . $mostrarNoticia . "<br>" . mysqli_error($link);
}
?> 


<!DOCTYPE html>
<html>

    <head>
        <!-- basic -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">

        <!-- site metas -->
        <title>Poleñino</title>
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
        <link href="../scss/_navbar.scss" rel="stylesheet" type="text/scss">


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
                                        <a href="../php/noticias.php" class="nav-link active" aria-current="page">Noticias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pages/agenda.html" class="nav-link">Agenda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../pages/rutas.html">Rutas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../php/login.php" class="nav-link">Reservas</a>
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
                        <div class="col-sm-12">
                            <div class="row my-3">
                                <div class="col-sm-9 " id="morecsspure">
                                    <h2 class="titulo">Noticias</h2>
                                    <?php
                                    foreach ($noticia as $key => $row) {
                                        ?> 
                                        <div class="d-flex position-relative my-5">
                                            <img src="../imgs/<?php echo $row['img'] ?> " width="25%" class="flex-shrink-0 me-3" alt="">
                                            <div>
                                                <h5 class="mt-0">  <?php echo $row['titulo'] ?></h5>
                                                <p class="texto">  <?php echo $row['desarrollo'] ?></p>
                                                <?php if ($row['enlace'] != null) {
                                                    ?>
                                                    <a href="<?php echo $row['enlace'] ?>" class="stretched-link">Leer más</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-3 my-5">
                                    <!--busqueda de noticia en google-->
                                    <form method="get" action="https://www.google.com/search" target="_blank">
                                        <input type="search" name="q" placeholder="Buscar en Google" autofocus required>
                                        <input type="submit">
                                    </form>

                                    <h5 class="titulo my-3">Últimas Noticias</h5>
                                    <ul class="list-group">
                                        <a href="https://www.diariodelaltoaragon.es/noticias/deportes/2021/05/07/arranca-el-monegros-padel-tour-con-una-importante-participacion-1490385-daa.html" class="list-group-item list-group-item-action">Arranca el “Monegros Pádel Tour” con una importante participación</a>
                                        <a href="https://www.cope.es/emisoras/aragon/huesca-provincia/huesca/informativo-mediodia-en-huesca/noticias/una-tractorada-recorrera-las-calles-huesca-proximo-jueves-abril-20210426_1256705" class="list-group-item list-group-item-action">Una tractorada recorrerá las calles de Huesca el próximo jueves 29 de abril</a>
                                        <a href="https://www.radiohuesca.com/deportes/nace-el-monegros-padel-tour-12042021-152976.html" class="list-group-item list-group-item-action">Nace el "Monegros Pádel Tour"</a>
                                        <a href="https://www.heraldo.es/noticias/aragon/2021/04/06/aragon-suma-ya-20-incendios-la-mayoria-agricolas-desde-el-inicio-de-la-epoca-de-peligro-el-1-de-abril-1482715.html" class="list-group-item list-group-item-action">Aragón suma ya 20 incendios, la mayoría agrícolas, desde el inicio de la época de peligro el 1 de abril</a>
                                        <a href="https://www.heraldo.es/noticias/ocio-y-cultura/2021/04/20/jose-luis-corral-rescata-del-olvido-a-la-reina-petronila-y-asume-su-voz-1486120.html" class="list-group-item list-group-item-action">José Luis Corral rescata del olvido a la reina Petronila y asume su voz</a>
                                        <a href="https://www.radiohuesca.com/sociedad/el-16-de-marzo-se-conoceran-los-finalistas-del-premio-promesas-alta-cocina-19022021-150540.html" class="list-group-item list-group-item-action">Dos representantes de Huesca, finalistas del premio Promesas Alta Cocina de Le Cordon Bleu</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="row border-2 shadow-lg p-3 mb-3 bg-white ">
                        <div class="col-sm-12">
                            <form action=" " method="post" >
                                <div class="row">
                                    <h4 class="titulo">Escriba su propia noticia</h4>
                                    <div class="col-sm-12">
                                        <div class="form-group my-2">
                                            <label for="titulo">Título de la noticia</label>
                                            <input type="titulo" class="form-control"  name="titulo" value="" placeholder="Escribe el título de la noticia" />
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group my-2">
                                                    <label for="noticia">Desarrollo de la noticia</label>
                                                    <textarea rows="10" class="form-control"  name="desarrollo" value="" placeholder="Escribe la noticia"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group my-2">
                                            <button type="submit" name="botonEnviar" class="btn btn-primary">Enviar</button>
                                        </div>
                                        <a href="mailto:" class="text-white bg-dark">Si lo prefieres envienos un email</a>
                                    </div>
                                </div>
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


        <!--carousel-->
        <script type="text/javascript">
                        // Call carousel manually
                        $('#myCarouselCustom').carousel();

                        // Go to the previous item
                        $("#prevBtn").click(function () {
                            $("#myCarouselCustom").carousel("prev");
                        });
                        // Go to the previous item
                        $("#nextBtn").click(function () {
                            $("#myCarouselCustom").carousel("next");
                        });
        </script>


    </body>

</html>