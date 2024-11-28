<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logueo</title>
    <link rel="stylesheet" href="../CSS/logueo.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="icon" href="../img/icono.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 400px;
            padding: 20px;
            margin: 100px auto;
        }

        .heading {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .forgot-password {
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .social-account-container {
            margin-top: 20px;
        }

        .agreement {
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_login.php";
    ?>
    <div class="container">
        <div class="heading">Inicio de sesión</div>
        <form class="form" action="#" name="sialci" method="post">
            
            <input placeholder="E-mail" id="email" name="email"  type="email" class="input" required="" />
            <input placeholder="Contraseña" id="password" name="password" type="password" class="input" required="" />

            <select id="role" name="role" class="input" required>
                <option value="" disabled selected>Selecciona un Rol</option>
                <option value="1">Administrador</option>
                <option value="">Usuario</option>
            </select>
        
            <span class="forgot-password"><a href="restablecer.php">¿Olvidaste tu contraseña?</a></span>
            <input class="btn btn-primary login-button" type="submit" name="InicioSesion" value="Iniciar sesión">

        </form>
        <span class="agreement"><a href="registro.php">¿No tienes cuenta? Regístrate</a></span>
        <span class="agreement"><a href="../Principal.php">Regresar</a></span>
    </div>

    <!-- Modal de error -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error de inicio de sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Correo electrónico, contraseña o rol son incorrectos. Por favor, inténtalo de nuevo.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>