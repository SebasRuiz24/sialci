<?php
$mysqli = new mysqli("localhost", "root", "", "sialci");

if ($mysqli->connect_errno) {
    echo "Error al conectar a la base de datos: " . $mysqli->connect_error;
    exit();
}
$sql = "SELECT * FROM pedidos";
$resultado = $mysqli->query($sql);
?>

<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../img/icono.jpg">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/cdn.datatables.net_1.13.7_css_jquery.dataTables.min.css" rel="stylesheet">
        <script src="js/cdn.datatables.net_1.13.7_js_jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admi</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#"> <img src="../img/icono.jpg" alt="icono de la pagina"  > </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIALCI-SAS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="#sialci">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="mercancia.php">Mercancia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="destinatario.php">Destinatario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Editar_infor.php">Editar Contraseña</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="fpdf/reporte_pedidos.php" target="_blank" >Generar Reporte</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="../controlador/controlador_cerrar_session.php" class="login-button" >Cerrar sesion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center">Pedidos</h2>
        <br>
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered custom-table" id="mitabla">
                <thead>
                    <tr>
                        <th>ID Pedidos</th>
                        <th>ID Mercancia</th>
                        <th>Correo Usuario</th>
                        <th>Dirección Remitente</th>
                        <th>Teléfono Remitente</th>
                        <th>Nombre Empresa Remitente</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['id_pedidos']; ?></td>
                            <td><?php echo $row['id_Mercancia']; ?></td>
                            <td><?php echo $row['correo_Usua']; ?></td>
                            <td><?php echo $row['direccion_Remi']; ?></td>
                            <td><?php echo $row['telefono_Remi']; ?></td>
                            <td><?php echo $row['nombreempresa_Remi']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td><a href="modificar.php?id=<?php echo $row['id_pedidos']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td><a href="#" data-href="eliminar.php?id=<?php echo $row['id_pedidos']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- Script de DataTable -->
    <script>
        $(document).ready(function () {
            $('#mitabla').DataTable({
                "order": [[1, "desc"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrada de _MAX_ registros)",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron registros coincidentes",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
</body>
</html>
