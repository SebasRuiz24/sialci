<?php
$mysqli = new mysqli("localhost", "root", "", "sialci");

if ($mysqli->connect_errno) {
    echo "Error al conectar a la base de datos: " . $mysqli->connect_error;
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM mercancia WHERE id_Mercancia = '$id'";
$resultado = $mysqli->query($sql);
?>

<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../img/icono.jpg">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>       
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center">
                <?php if($resultado) { ?>
                    <h3>REGISTRO ELIMINADO</h3>
                <?php } else { ?>
                    <h3>ERROR AL ELIMINAR</h3>
                <?php } ?>
                <a href="mercancia.php" class="btn btn-primary mt-3">Regresar</a> 
            </div>
        </div>
    </div>
</div>
</body>
</html>
