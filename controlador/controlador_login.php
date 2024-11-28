<?php

session_start();

$mensajeError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mysqli = new mysqli("localhost", "root", "", "sialci");

    if ($mysqli->connect_errno) {
        echo "Error al conectar a la base de datos: " . $mysqli->connect_error;
        exit();
    }

    $usuario = $_POST["email"];
    $password = $_POST["password"];
    $rol = $_POST["role"]; 

    if ($rol === '1') {
        $sql = "SELECT * FROM usuario WHERE correo_Admi = ? AND password_Admi = ? AND rol = '1'";
    } else {
        $sql = "SELECT * FROM usuario WHERE correo_Usua = ? AND password_Usua = ? AND rol = ''";
    }

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rol"] = $rol; 
        $_SESSION["correo_usuario"] = $usuario; 
        if ($rol === '1') {
            $_SESSION["admin"] = true;
            header("Location: ../admi/index.php");
        } else {
            header("Location: Principal2.php");
        }
        exit;
    } else {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            $("#errorModal").modal("show");
        });
      </script>';
    }

    $stmt->close();
}
?>
