<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "sialci";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['Registro'])) {
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña']; 
    $confirmarContraseña = $_POST['confirmarContraseña'];

    if ($Contraseña !== $confirmarContraseña) {
        $errorMessage = "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
    } else {
        $consultaCorreo = "SELECT * FROM Usuario WHERE correo_Usua = '$Correo'";
        $resultado = mysqli_query($enlace, $consultaCorreo);
        if (!$resultado) {
            $errorMessage = "Error en la consulta: " . mysqli_error($enlace);
        } elseif (mysqli_num_rows($resultado) > 0) {
            $errorMessage = "El correo electrónico '$Correo' ya está en uso. Por favor, elija otro.";
        } else {
            $insertarDatos = "INSERT INTO Usuario (correo_Usua, password_Usua, nombre_Usua, apellidos_Usua) 
                                VALUES ('$Correo', '$Contraseña', '$Nombre', '$Apellidos')"; 
            $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

            if ($ejecutarInsertar) {
                $successMessage = "Datos insertados correctamente.";
            } else {
                $errorMessage = "Error al insertar datos en la tabla 'Usuarios': " . mysqli_error($enlace);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../CSS/registro.css">
    <link rel="icon" href="../img/icono.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form class="form" action="#" name="sialcis" method="post">
        <p class="title">Registro Usuario</p>
        <p class="message">Regístrese ahora y obtenga acceso completo a nuestra aplicación.</p>
        <div class="flex">
            <label>
                <input class="input" type="text" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');"  name="Nombre" placeholder="" required="">
                <span>Nombre</span>
            </label>

            <label>
                <input class="input" type="text" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');"  name="Apellidos" placeholder="" required="">
                <span>Apellido</span>
            </label>
        </div>
        <div class="fle">
            <label>
                <input class="input" type="email" name="Correo" placeholder="" required="">
                <span>Email</span>
            </label>

            <label>
                <input class="input" type="password" name="Contraseña" placeholder="" required="">
                <span>Password</span>
            </label>

            <label>
                <input class="input" type="password" name="confirmarContraseña" placeholder="" required="">
                <span>Confirmar password</span>
            </label>
        </div>
        
        <button class="submit" name="Registro">Registrar</button>
        <p class="signin">¿Ya tienes una cuenta? <a href="logueo.php">Iniciar sesión</a></p>
    </form>

    <!-- Modal de error -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error de registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body error-modal-body">
                    <?php
                    if (isset($errorMessage)) {
                        echo "<p>$errorMessage</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de éxito -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Registro exitoso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body success-modal-body">
                    <?php
                    if (isset($successMessage)) {
                        echo "<p>$successMessage</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            <?php
            if (isset($errorMessage)) {
                echo '$("#errorModal").modal("show");';
            }
            if (isset($successMessage)) {
                echo '$("#successModal").modal("show");';
            }
            ?>
        });
    </script>
</body>
</html>
