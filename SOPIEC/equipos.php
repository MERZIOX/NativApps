<?php
require_once("assets/php/val_session_admin.php");
?>
<?php
require_once("assets/php/db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOPIEC</title>

    <!-- Estilos CSS Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- FONTAWESOME CDN -->
    <script src="https://kit.fontawesome.com/763b114892.js" crossorigin="anonymous"></script>
    <!-- CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>



<body>
    <!-- Contenedor principal -->
    <!-- Contenedor principal -->
    <div id="wrapper">
        <!-- Header -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="fa fa-square-o "></i>&nbsp;SOPIEC</a>
                </div>
                <!-- Lista opciones -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">See Website</a></li>
                        <li><a href="ticket.php">Open Ticket</a></li>
                        <li><a href="assets/php/logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  Sidebar de opciones  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />
                    </li>
                    <!-- Primero/inicio -->
                    <li>
                        <a href="index.php"><i class="fa fa-desktop "></i>Inicio</a>
                    </li>
                    <!-- Segundo/Administracion de usuarios -->
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Administración de usuarios<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevousuario.php">Crear Nuevo usuario</a>
                            </li>
                            <li>
                                <a href="usuarios.php">Ver usuarios registrados</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Cuarto/Administracion de equipos -->
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Administración de equipos<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevoequipo.php">Agregar un equipo</a>
                            </li>
                            <li>
                                <a href="equipos.php">Gestionar equipo</a>
                            </li>

                        </ul>
                    </li>
                    <!--  Quinto/A cerca de SOPIEC-->
                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>A cerca de SOPIEC</a>
                    </li>
                </ul>

            </div>

        </nav>


        <!-- Contenido de la pagina, lado derecho ancho  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="usuarios-buscar">
                            <h2>Equipos</h2>
                            <!-- Barra de busqueda -->
                            <form class="form-inline my-2 my-lg-0 barra-buscar" action="assets/php/buscarequipo.php"
                                method="GET">
                                <input class="form-control mr-sm-2" type="search" placeholder="Serial"
                                    aria-label="Search" id="buscar_equipo" name="buscar_equipo">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="boton_buscar"
                                    id="boton_buscar">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr />

                <!-- query -->
                <?php
                require_once("assets/php/db.php");
                $registros = mysqli_query($conexion, "select `serial`, `marca`, `nombre`, `tipo_equipo`, `modelo_equipo`, `procesador`, `ram`, `disco_duro`, `sistema_operativo`,`estado`
                                      from equipos") or
                    die("Problemas en el select:" . mysqli_error($conexion));
                ?>
                <div id="contenedor-usuarios" class="contenedor-usuarios">
                    <div class="row">
                        <!-- Tabla de valores en base de datos -->
                        <table class="table">
                            <thead class="thead-light ">
                                <!-- Header de la tabla -->
                                <tr class="">
                                    <th scope="col">Serial</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo de equipo</th>
                                    <th scope="col">Modelo de equipo</th>
                                    <th scope="col">Procesador</th>
                                    <th scope="col">Ram</th>
                                    <th scope="col">Disco duro</th>
                                    <th scope="col">Sistema operativo</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($reg = mysqli_fetch_array($registros)) {
                                ?>
                                <!-- Contenido de la tabla -->
                                <tr class="actual">
                                    <th scope="row">
                                        <input class="form-control" type="text"
                                            value="<?php echo $serial = $reg['serial'] ?>" readonly id="serial"
                                            name="serial" readonl> </th>
                                    <td> <?php echo $reg['marca'] ?></td>
                                    <td> <?php echo $reg['nombre'] ?></td>
                                    <td> <?php echo $reg['tipo_equipo'] ?> </td>
                                    <td> <?php echo $reg['modelo_equipo'] ?> </td>
                                    <td> <?php echo $reg['procesador'] ?> </td>
                                    <td> <?php echo $reg['ram'] ?> </td>
                                    <td> <?php echo $reg['disco_duro'] ?> </td>
                                    <td> <?php echo $reg['sistema_operativo'] ?> </td>
                                    <td> <?php echo $reg['estado'] ?> </td>

                                    <td class="eliminar-editar">
                                        <!-- botones editar y eliminar -->
                                        <a id="edit" class="btn fa fa-pen"
                                            href="modificarequipo.php?serial=<?php echo $reg['serial']; ?>"></a>

                                            <a id="del" class="btn fa fa-trash-alt" href="#"
                                            onclick="confirmacion_borrar('<?php  echo $reg['serial']; ?>')"></a>
                                    </td>
                                </tr>

                    </div>
                </div>

                <?php
                                }
                                mysqli_close($conexion);
            ?>
                </tbody>
                </table>
            </div>

            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/validaciones.js"></script>
    <!-- CDN Jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Script Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="assets/js/validaciones.js"></script>

    <!-- Alerta borrar -->
    <script type="text/javascript">
        // var nombre = document.getElementById("nombre");
        // console.log(nombre.value);

        function confirmacion_borrar(serial, nombre) {

            if (confirm("¿Realmente desea eliminar el equipo con serial #" + serial)) {
                toastr["error"]("El equipo con serial #" + serial + " ha sido eliminado.", "Equipo eliminado")

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "5000",
                    "hideDuration": "5000",
                    "timeOut": "5000",
                    "extendedTimeOut": "5000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                setTimeout(() => {
                    window.location.href = "assets/php/borrarequipo.php?serial=" + serial 
                }, 1500);
            }
        }
    </script>

</body>

</html>