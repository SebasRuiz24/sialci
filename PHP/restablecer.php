<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/logueo.css">
  <title>Recuperar Contraseña</title>
</head>
<body>
<div class="container">
        <div class="heading">Recuperar Contraseña</div>

        <form class="form" action="restablecer.php" name="sialcis" method="POST">

        <div class="form-floating my-3">
            <input type="email" class="form-control input" id="floatingInput" oninput="this.value = this.value.replace(/[^A-Za-z@.]/g, '');" name="email" required=""/>
            <label for="floatingInput">Correo electrónico</label>
        </div>
            <input class="btn btn-primary login-button" type="submit" name="EnviarCorreo" value="Enviar Correo">
            <span class="agreement"><a href="logueo.php">Regresar</a></span>
        </form>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Correo Verificado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>El Correo de Recuperacion se ha enviado correctamente.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p> Al enviar el correo electrónico</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="error" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>El Correo que ingresaste no se encuentra registrado.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>$(document).ready(function() { alert("Correo electrónico no válido"); });</script>';
            return;
        }

        $pass = substr(md5(microtime()), 1, 10);

        $conn = new mysqli("localhost", "root", "", "sialci");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $updated = false;

        // Actualizar contraseña para el usuario si existe
        $check_sql_login = "SELECT * FROM usuario WHERE correo_Usua='$email'";
        $result_login = $conn->query($check_sql_login);
        if ($result_login->num_rows > 0) {
            $sql_login = "UPDATE usuario SET password_Usua='$pass' WHERE correo_Usua='$email'";
            if ($conn->query($sql_login) === TRUE) {
                $updated = true;
            } else {
                echo '<script>$(document).ready(function() { alert("Error modificando en login: ' . $conn->error . '"); });</script>';
                return;
            }
        }

        // Actualizar contraseña para el administrador si existe
        $check_sql_admi = "SELECT * FROM usuario WHERE correo_Admi='$email'";
        $result_admi = $conn->query($check_sql_admi);
        if ($result_admi->num_rows > 0) {
            $admin_sql = "UPDATE usuario SET password_Admi='$pass' WHERE correo_Admi='$email'";
            if ($conn->query($admin_sql) === TRUE) {
                $updated = true;
            } else {
                echo '<script>$(document).ready(function() { alert("Error modificando en admi: ' . $conn->error . '"); });</script>';
                return;
            }
        }

        if ($updated) {
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'alvaromauricioramirezquintero@gmail.com'; // Reemplaza con tu correo de Gmail
                $mail->Password = 'pkez mcwv ekxq ikyr'; // Reemplaza con tu contraseña de Gmail o contraseña de aplicación
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configuración del correo
                $mail->setFrom('alvaromauricioramirezquintero@gmail.com', 'SIALCI-SAS'); // Reemplaza con tu correo de Gmail
                $mail->addAddress($email);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Recordar Password';
                $mail->Body = "El sistema le asignó la siguiente clave: " . $pass . "<br>Por favor copie la clave asignada y cuando inicie sesión de nuevo, cámbiela en la opción de editar información.<br>Haga click en el siguiente enlace para volver al formulario de inicio de sesión:<br><a href='http://localhost/SIALCI.SAS/PHP/logueo.php'>Iniciar sesión</a>";

                $mail->send();
                echo '$("#successModal").modal("show");';
            } catch (Exception $e) {
              echo '$("#errorModal").modal("show");';
              echo 'alert("Error al enviar el correo");';
            }
        } else {
          echo '$("#errorModal").modal("show");';
        }

        $conn->close();
    }
}
?>
        });
    </script>
</body>
</html>
