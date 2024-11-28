<?php
session_start();
if (empty($_SESSION["correo_usuario"])){
    header("location: logueo.php");
    exit; 
}
include "../modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["Correo"];
    $contraseña = $_POST["Contraseña"];
    $nombre = $_POST["Nombre"];
    $apellidos = $_POST["Apellidos"];

    $correo_usuario = $_SESSION["correo_usuario"];

    $update_usuario_sql = "UPDATE usuario SET nombre_Usua=?, apellidos_Usua=?, correo_Usua=? WHERE correo_Usua=?";
    $update_usuario_stmt = $conexion->prepare($update_usuario_sql);
    $update_usuario_stmt->bind_param("ssss", $nombre, $apellidos, $correo, $correo_usuario);
    $update_usuario_result = $update_usuario_stmt->execute();

    $update_contraseña_sql = "UPDATE usuario SET password_Usua=? WHERE correo_Usua=?";
    $update_contraseña_stmt = $conexion->prepare($update_contraseña_sql);
    $update_contraseña_stmt->bind_param("ss", $contraseña, $correo);
    $update_contraseña_result = $update_contraseña_stmt->execute();

    if ($update_usuario_result && $update_contraseña_result) {
        echo '<div class="alert alert-success" role="alert">¡Los datos se actualizaron correctamente!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos.</div>';
        echo $conexion->error; 
    }
}

$correo_usuario = $_SESSION["correo_usuario"];
$usuario_query = "SELECT * FROM usuario WHERE correo_Usua=?";
$usuario_stmt = $conexion->prepare($usuario_query);
$usuario_stmt->bind_param("s", $correo_usuario);
$usuario_stmt->execute();
$usuario_result = $usuario_stmt->get_result();
$usuario = $usuario_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../CSS/editar.css">
    <link rel="icon" href="../img/icono.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</head>

<body>
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
                        <a class="nav-link mx-lg-2 active" aria-current="page" href="Principal2.php">SIALCI SAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="Principal2.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="Servicios.php">Cotizador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="Usuario.php">Pedido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Informacion Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="principal2.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
            <a href="../controlador/controlador_cerrar_session.php" class="login-button" >Cerrar sesion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <p class="title">Editar Información Usuario</p>
    <div class="flex">
        <label>
            <input class="input" type="text" name="Nombre" value="<?php echo $usuario['nombre_usua']; ?>" required="">
            <span>Nombre</span>
        </label>
        <label>
            <input class="input" type="text" name="Apellidos" value="<?php echo $usuario['apellidos_usua']; ?>" required="">
            <span>Apellido</span>
        </label>
    </div>
    <div class="flex">
        <label>
            <input class="input" type="email" name="Correo" value="<?php echo $usuario['correo_usua']; ?>" required="">
            <span>Email</span>
        </label>
        <label>
            <input class="input" type="password" name="Contraseña">
            <span>Nueva Contraseña</span>
        </label>
    </div>
    <button class="submit" name="Registro">Editar</button>
</form>


    <!-- Modal de éxito -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Verificado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Los datos se han actualizado correctamente.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap Bundle con Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($update_usuario_result) {
                    echo '$("#successModal").modal("show");';
                } else {
                    echo 'alert("Error al actualizar los datos.");';
                }
            }
        ?>
    });
    </script>
</body>

</html>
