<?php
session_start();
include '../modelo/conexion.php';

if (empty($_SESSION["correo_usuario"])) {
    header("location: logueo.php");
    exit;
}

$usuario = $_SESSION["correo_usuario"];

$array_ids_pedidos = array();

$sql = $conexion->query("SELECT * FROM usuario WHERE correo_usua = '$usuario'");

if ($datos = $sql->fetch_object()) {
    $nombre = $datos->nombre_usua; // Cambiar a minúsculas
    $apellidos = $datos->apellidos_usua; // Cambiar a minúsculas
    $correo = $datos->correo_usua; // Cambiar a minúsculas
} else {
    echo '<div class="alert alert-danger" role="alert">No se encontraron datos del usuario.</div>';
    exit;
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre_Usua = isset($_POST["nombre_Usua"]) ? $_POST["nombre_Usua"] : '';
    $apellidos_Usua = isset($_POST["apellidos_Usua"]) ? $_POST["apellidos_Usua"] : '';
    $direccion_Remi = isset($_POST["direccion_Remi"]) ? $_POST["direccion_Remi"] : '';
    $telefono_Remi = isset($_POST["telefono_Remi"]) ? $_POST["telefono_Remi"] : '';
    $nombreempresa_Remi = isset($_POST["nombreempresa_Remi"]) ? $_POST["nombreempresa_Remi"] : '';
    $paquetes = isset($_POST["paquetes"]) ? $_POST["paquetes"] : [];
    $descripcion_Paque = isset($_POST["descripcion_Paque"]) ? $_POST["descripcion_Paque"] : [];
    $peso = isset($_POST["peso"]) ? $_POST["peso"] : [];
    $largo = isset($_POST["largo"]) ? $_POST["largo"] : [];
    $ancho = isset($_POST["ancho"]) ? $_POST["ancho"] : [];
    $alto = isset($_POST["alto"]) ? $_POST["alto"] : [];
    $valor_Mercancia = isset($_POST["valor_Mercancia"]) ? $_POST["valor_Mercancia"] : [];
    $nombre_Des = isset($_POST["nombre_Des"]) ? $_POST["nombre_Des"] : '';
    $nombreempresa_Des = isset($_POST["nombreempresa_Des"]) ? $_POST["nombreempresa_Des"] : '';
    $pais_Des = isset($_POST["pais_Des"]) ? $_POST["pais_Des"] : '';
    $depar_Des = isset($_POST["depar_Des"]) ? $_POST["depar_Des"] : '';
    $ciudad_Des = isset($_POST["ciudad_Des"]) ? $_POST["ciudad_Des"] : '';
    $codigo_Postal = isset($_POST["codigo_Postal"]) ? $_POST["codigo_Postal"] : '';
    $email_Des = isset($_POST["email_Des"]) ? $_POST["email_Des"] : '';
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : '';
    $peso_Units = isset($_POST["peso_Units"]) ? $_POST["peso_Units"] : [];

    // Crear consulta SQL para insertar destinatario
    $sql_insert_Des = "INSERT INTO destinatario (nombre_Des, nombreempresa_Des, pais_Des, depar_Des, ciudad_Des, codigo_Postal, email_Des, telefono)
                        VALUES ('$nombre_Des', '$nombreempresa_Des', '$pais_Des', '$depar_Des', '$ciudad_Des', '$codigo_Postal', '$email_Des', '$telefono')";


    if ($conexion->query($sql_insert_Des) === TRUE) {
        $id_Destinatario = $conexion->insert_id;
        echo '<div class="alert alert-success" role="alert">Destinatario insertado correctamente. ID: ' . $id_Destinatario . '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al insertar el destinatario: ' . $conexion->error . '</div>';
        exit;
    }

    // Insertar mercancías y pedidos
    foreach ($paquetes as $key => $paquete) {
        $unidad_peso = $peso_Units[$key];

        $sql_insert_mercancia = "INSERT INTO mercancia (paquetes, descripcion_Paque, valor_Mercancia, peso, largo, ancho, alto, peso_Units, id_Destinatario)
                                VALUES ('$paquete', '{$descripcion_Paque[$key]}', '{$valor_Mercancia[$key]}', '{$peso[$key]}', '{$largo[$key]}', '{$ancho[$key]}', '{$alto[$key]}', '{$peso_Units[$key]}', '$id_Destinatario')";
        $conexion->query($sql_insert_mercancia);
        $id_Mercancia = $conexion->insert_id;

        $sql_insert_pedidos = "INSERT INTO pedidos (correo_Usua, direccion_Remi, telefono_Remi, nombreempresa_Remi, id_Mercancia, fecha)
    VALUES ('$correo', '$direccion_Remi', '$telefono_Remi', '$nombreempresa_Remi', '$id_Mercancia', NOW())";

        if ($conexion->query($sql_insert_pedidos) === TRUE) {
            $id_pedidos = $conexion->insert_id;
            $array_ids_pedidos[] = $id_pedidos;
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al insertar el pedido: ' . $conexion->error . '</div>';
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sialci.SAS</title>
    <link rel="icon" href="../img/icono.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link href="../CSS/Usuario.css" rel="stylesheet">
</head>

<body class=" fondo">
    <!-- icono whatsapp -->
    <a href="https://wa.me/573204146958?text=Hola" class="btn-wsp" target="_blank">
        <i class="fa fa-whatsapp icono" style="font-size: 35px;"></i>
    </a>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#"> <img src="../img/icono.jpg" alt="icono de la pagina"> </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
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
                            <a class="nav-link mx-lg-2" href="#usuario">Pedido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="EditarInformacion.php">Informacion Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Principal2.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="../controlador/controlador_cerrar_session.php" class="login-button">cerrar sesion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section class="formulario">
        <div class="container" id="formularioContainer">
            <header>Registro de pedido</header>
            <form action="" method="POST">
                <div class="form first">
                    <div class=" details personal">
                        <span class="title">Datos del remitente</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Nombre(s):</label>
                                <input type="text" name="nombre_Usua" placeholder="Ingrese su nombre"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');" 
                                    title="Por favor, ingrese solo letras" required value="<?php echo $nombre; ?>">
                            </div>

                            <div class="input-field">
                                <label>Apellidos:</label>
                                <input type="text" name="apellidos_Usua" placeholder="Ingrese su apellido"
                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');" 
                                    title="Por favor, ingrese solo letras" required value="<?php echo $apellidos; ?>">
                            </div>

                            <div class="input-field">
                                <label>Direccion</label>
                                <input type="text" name="direccion_Remi" placeholder="ingrese su Direccion" required>
                            </div>

                            <div class="input-field">
                                <label>Correo electrónico</label>
                                <input type="email" oninput="this.value = this.value.replace(/[^A-Za-z@.]/g, '');"
                                    name="correo_Usuass" placeholder="Ingrese su correo electrónico" required
                                    value="<?php echo $correo; ?>">
                            </div>




                            <div class="input-field">
                                <label>Telefono</label>
                                <input type="Number" oninput="this.value = this.value.replace(/[^0-9\+]/g, '');"
                                    name="telefono_Remi" placeholder="Ingrese su numero de telefono" required>
                            </div>

                            <div class="input-field">
                                <label>Nombre de la empresa (si aplica):</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');" 
                                    name="nombreempresa_Remi" placeholder="Ingrese nombre de la empresa">
                            </div>

                        </div>
                    </div>

                    <div class="details ID">
                        <span class="title">Mercancia</span>
                        <div class="fields">
                            <div class="input-field">
                                <label>Paquetes</label>
                                <input type="number" name="paquetes[]" placeholder="#-?"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                            </div>

                            <div class="input-field">
                                <label>Descripcion del paquete: </label>
                                <input type="text" name="descripcion_Paque[]" placeholder="Ingrese una Descripcion"
                                    title="Por favor, ingrese solo letras" required>
                            </div>

                            <div class="input-field pesos">
                                <label>Peso</label>
                                <div class="input-group">
                                    <input type="number" name="peso[]" placeholder="#"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                    <select name="peso_Units[]" class="">
                                        <option value="lb">lb</option>
                                        <option value="kg">kg</option>
                                    </select>
                                </div>
                            </div>



                            <div class="input-field">
                                <label>Valor Mercancia</label>
                                <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    name="valor_Mercancia[]" placeholder="#-?" required>
                            </div>


                            <div class="input-field dimensiones">
                                <label>Dimensiones (LARGO X ANCHO X ALTURA EN CM)</label>
                                <div class="input-group">
                                    <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                        name="largo[]" class="form-control auto-width" placeholder="L" required>
                                    <span style="margin: 0px 4px;">x</span>
                                    <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                        name="ancho[]" class="form-control auto-width" placeholder="A" required>
                                    <span style="margin: 0px 4px;">x</span>
                                    <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                        name="alto[]" class="form-control auto-width" placeholder="A" required>
                                    <span style="margin: 0px 4px;">CM</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="details addres">
                        <span class="title">Datos del destinatario</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Nombre Completo</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');" 
                                    name="nombre_Des" placeholder="Ingrese Nombre" required>
                            </div>

                            <div class="input-field">
                                <label>Nombre de la empresa (si aplica):</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');" 
                                    name="nombreempresa_Des" placeholder="Ingrese el nombre de la empresa">
                            </div>

                            <form id="destinationForm" method="POST" action="../JS/ciudades.js" onsubmit="return validateForm()">
                            <div class="input-field">
                                <label for="pais_Des">Pais</label>
                                <select class="form-select country" name="pais_Des" id="pais_Des" aria-label="Default select example" onchange="loadStates()">
                                    <option selected>Select country</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="depar_Des">Regiòn</label>
                                <select class="form-select state" name="depar_Des" id="depar_Des" aria-label="Default select example" onchange=" loadCities()">
                                    <option selected>Select State</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="ciudad_Des">Ciudad</label>
                                <select class="form-select city" name="ciudad_Des" id="ciudad_Des" aria-label="Default select example">
                                    <option selected>Select City</option>
                                </select>
                            </div>
                            </form>
                            <div class="input-field">
                                <label>Codigo postal</label>
                                <input type="text" name="codigo_Postal" placeholder="Ingrese codigo postal" required>
                            </div>

                            <div class="input-field">
                                <label>Correo</label>
                                <input type="email" oninput="this.value = this.value.replace(/[^A-Za-z@.]/g, '');"
                                    name="email_Des" placeholder="Ingrese el correo" required>
                            </div>

                            <div class="input-field">
                                <label>Numero del telefono</label>
                                <input type="number" oninput="this.value = this.value.replace(/[^0-9\+]/g, '');"
                                    name="telefono" placeholder="Ingrese el numero de telefono" required>
                            </div>

                        </div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText" type="submit">Enviar</span>
                    </button>


                </div>
        </div>

        </form>
        </div>
    </section>

    <!-- Modal Registro Exitoso -->
    <div class="modal fade" id="registroExitosoModal" tabindex="-1" aria-labelledby="registroExitosoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroExitosoModalLabel">Registro Exitoso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Se han enviado sus pedidos correctamente. El ID de su mercancia es: <?php echo $id_Mercancia; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function validateForm() {
            const cityValue = document.querySelector('#ciudad_Des').value;
            if (cityValue === "" || cityValue === "undefined") {
                alert("Por favor, selecciona una ciudad válida.");
                return false;
            }
            return true;
        }
    </script>
    <script>
        $(document).ready(function () {
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                $('#registroExitosoModal').modal('show');
            <?php } ?>
        });
    </script>

    <script src="../JS/script.js"></script>
    <script src="../JS/ciudades.js"></script>

</body>

</html>