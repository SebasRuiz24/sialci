<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sialci.SAS</title>
    <link rel="icon" href="../img/icono.jpg">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../CSS/Servicios.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8eef3a9;
            padding-top: 80px;
        }

        input:focus,
        select:focus {
            border-color: #FA5229;
            /* Cambia este valor al color que prefieras */
            outline: none;
            /* Esto elimina el borde adicional del navegador */
            box-shadow: 0 2px 5px rgba(223, 80, 3, 0.959);
            /* Opcional: añade un efecto de sombra */
        }

        .contenido {
            margin-right: 120px;
            background-color: #ef652e;
            border-radius: 10px;
            padding: 40px;
            margin-bottom: 20px;
            box-shadow: 63px 33px 90px 3px rgba(0, 0, 0, 0.180);
        }



        #resultados {
            border-color: #FA5229;
            /* Cambia este valor al color que prefieras */
            outline: none;
            /* Esto elimina el borde adicional del navegador */
            box-shadow: 0 2px 5px rgba(223, 80, 3, 0.959);
            /* Opcional: añade un efecto de sombra */
        }

        .boton-cotizar {
            background-color: #FA5229;
            /* Color azul inicial */
            color: white;
            /* Color del texto */
            padding: 8px 20px;
            /* Tamaño del botón */
            border: none;
            /* Sin borde */
            border-radius: 50px;
            /* Borde redondeado */
            cursor: pointer;
            /* Cambia el cursor */
            transition: background-color 0.3s ease;
            /* Transición suave */
            font-size: 16px;
            /* Tamaño de la fuente */
        }

        /* Efecto de hover (al pasar el cursor) */
        .boton-cotizar:hover {
            background-color: #00b383;
            /* Cambia a color verde */
        }
    </style>
</head>

<body class="fondo">
    <!-- icono whatsapp -->
    <a href="https://wa.me/573204146958?text=Hola" class="btn-wsp" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
        </svg>
    </a>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#"> <img src="../img/icono.jpg" alt="icono de la pagina"> </a>
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
                            <a class="nav-link mx-lg-2" href="#sialci">Cotizador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Usuario.php">Pedido</a>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="background-image-container">
        <img src="../imgcoti/imagenfondo.jpg" alt="Imagen de fondo">
    </div>
    <header class="header">
        <h1>COTIZA TU ENVÍO</h1>
        <p>Cotizador de Envíos a Nivel Internacional</p>
    </header>


    <div class="container">

        <!-- Formulario de cotización -->
        <form action="servicios.php" method="post" id="cotizacion-form">
            <div id="cotizaciones">
                <div class="cotizacion">
                    <label>Zona de Destino:</label>
                    <select name="zona_destino[]" required>
                        <option value="1">Latinoamérica</option>
                        <option value="2">Miami-USA</option>
                        <option value="3">Usa, Canada, Mexico, Puerto Rico</option>
                        <option value="4">Resto del caribe</option>
                        <option value="5">Europa</option>
                        <option value="6">Medio y lejano Oriente</option>
                        <option value="7">Australia</option>
                    </select>

                    <label>Peso en KG:</label>
                    <input type="number" placeholder="Ej: 2 Kg" name="peso_kg[]" required>

                    <label>Ancho (cm):</label>
                    <input type="number" placeholder="El ancho de tu paquete" name="ancho[]" required>

                    <label>Largo (cm):</label>
                    <input type="number" placeholder="El largo de tu paquete" name="largo[]" required>

                    <label>Alto (cm):</label>
                    <input type="number" placeholder="El Alto de tu paquete" name="alto[]" required>

                    <label>Cantidad de Paquetes:</label>
                    <input type="number" placeholder="El numero de paquetes" name="cantidad_paquetes[]" required>

                    <span class="remove-button" onclick="removeCotizacion(this)">Eliminar esta cotización</span>
                </div>
            </div>
            <button type="button" onclick="agregarCotizacion()">+ Agregar Otro Paquete</button>
            <br><br>
            <input type="submit" class="boton-cotizar" value="Cotizar">
        </form>

        <!-- Resultados de la cotización -->
        <div id="resultados">
            <h2>Aquí aparecerán tus cotizaciones</h2>
            <div id="resultado-cotizacion">
                <!-- Aquí se mostrarán los resultados de la cotización -->
                <?php
                include '../modelo/conexion.php';
                $zonas_destino_texto = [
                    '1' => 'Latinoamérica',
                    '2' => 'Miami-USA',
                    '3' => 'Usa, Canada, Mexico, Puerto Rico',
                    '4' => 'Resto del caribe',
                    '5' => 'Europa',
                    '6' => 'Medio y lejano Oriente',
                    '7' => 'Australia'
                ];

                $cotizaciones = [];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    foreach ($_POST['zona_destino'] as $index => $zona) {
                        $cotizaciones[] = [
                            'peso' => $_POST['peso_kg'][$index],
                            'ancho' => $_POST['ancho'][$index],
                            'largo' => $_POST['largo'][$index],
                            'alto' => $_POST['alto'][$index],
                            'cantidad' => $_POST['cantidad_paquetes'][$index],
                            'zona' => $zona,
                        ];
                    }
                }

                if (!empty($cotizaciones)) {

                    $resultados = procesarVariasCotizaciones($cotizaciones);
                
                    if (!empty($resultados) && isset($resultados['paquetes'])) {
                        foreach ($resultados['paquetes'] as $i => $paquete) {
                
                            $zona_num = $cotizaciones[$i]['zona'] ?? null;
                            $zona_texto = $zonas_destino_texto[$zona_num] ?? 'Zona desconocida';
                
                            // Mostrar información del paquete
                            echo "<h3>Paquete " . ($i + 1) . ":</h3>";
                            echo "<p>Zona De Destino: " . htmlspecialchars($zona_texto) . "</p>";
                            echo "<p>Peso: " . number_format($paquete['peso'], 2) . " kg</p>";
                            echo "<p>Flete en USD: " . number_format($paquete['fleteUSD'], 2) . " USD</p>";
                            echo "<p>Flete en Pesos Colombianos (COP): " . number_format($paquete['fleteCOP'], 2) . " COP</p>";
                
                            // Insertar datos en la base de datos
                            $stmt = $conexion->prepare("INSERT INTO cotizaciones 
                                (zona_destino, peso, flete_usd, flete_cop, peso_total, total_usd, total_cop) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
                
                            $stmt->bind_param(
                                "sdddddd",
                                $zona_texto,
                                $paquete['peso'],
                                $paquete['fleteUSD'],
                                $paquete['fleteCOP'],
                                $resultados['pesoTotal'],
                                $resultados['costoTotalUSD'],
                                $resultados['costoTotalCOP']
                            );
                
                            $stmt->execute();
                        }
                
                        // Mostrar totales
                        echo "<br><h3>TOTAL</h3>";
                        echo "<p>Peso Total: " . number_format($resultados['pesoTotal'], 2) . " kg</p>";
                        echo "<p>Total en USD: " . number_format($resultados['costoTotalUSD'], 2) . " USD</p>";
                        echo "<p>Total en COP: " . number_format($resultados['costoTotalCOP'], 2) . " COP</p>";
                
                    
                    } else {
                        echo "<p>No se encontraron cotizaciones válidas.</p>";
                    }
                } else {
                    echo "<p><br>Por favor, ingresar datos</p>";
                }
                
                ?>

            </div>
        </div>
    </div>

    <script>
        // Función para agregar otra cotización
        function agregarCotizacion() {
            var contenedorCotizaciones = document.getElementById('cotizaciones');
            var nuevaCotizacion = contenedorCotizaciones.children[0].cloneNode(true); // Clonamos el primer formulario
            limpiarCampos(nuevaCotizacion); // Limpiamos los campos clonados
            contenedorCotizaciones.appendChild(nuevaCotizacion); // Añadimos el formulario clonado
        }

        // Función para limpiar los campos de una cotización clonada
        function limpiarCampos(cotizacion) {
            var inputs = cotizacion.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = ''; // Limpiamos el valor de cada input
            }
        }

        // Función para eliminar una cotización
        function removeCotizacion(button) {
            if (document.getElementsByClassName('cotizacion').length > 1) {
                button.parentElement.remove();
            } else {
                alert("Debe haber al menos una cotización.");
            }
        }
    </script>

</body>

</html>

<?php
// Función para obtener el valor del dólar diario en pesos colombianos (COP) con TRM + 25 pesos
function obtenerTRMDolar()
{
    $apiKey = '8c0ac7ecd74ee93d11f020b7';
    $url = "https://v6.exchangerate-api.com/v6/8c0ac7ecd74ee93d11f020b7/latest/USD";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['conversion_rates']['COP'])) {
        $dolarHoy = $data['conversion_rates']['COP'];
        return $dolarHoy + 25;
    } else {
        return 4200 + 50;
    }
}

// Función para calcular el flete
function calcularFlete($peso, $dimensiones, $cantidad, $zona,)
{
    $peso = floatval($peso);
    $zona = intval($zona);

    $ancho = floatval($dimensiones['ancho']);
    $largo = floatval($dimensiones['largo']);
    $alto  = floatval($dimensiones['alto']);

    $trmDolar = obtenerTRMDolar();

    $tarifasZona = [
        1 => [45.2, 50.8, 56.3, 61.8, 67.3, 72.8, 78.3, 83.9, 89.4, 94.9, 99.5, 104.6, 109.7, 114.7, 119.8, 124.9, 130.0, 135.0, 140.1, 145.2, 148.7, 152.2, 155.6, 159.1, 162.6, 166.1, 169.6, 173.0, 176.5, 180.0, 183.5, 187.0, 190.4, 193.9, 197.4, 200.9, 204.4, 207.8, 211.3, 214.8, 218.0, 221.2, 224.4, 227.5, 230.7, 233.9, 237.1, 240.3, 243.5, 246.7, 249.9, 253.0, 256.2, 259.4, 262.6, 265.8, 269.0, 272.2, 275.3, 278.5, 282.5, 286.4, 290.3, 294.3, 298.2, 302.1, 306.1, 310.0, 313.9, 317.8, 321.8, 325.7, 329.6, 333.6, 337.5, 341.4, 345.4, 349.3, 353.2, 357.2, 361.1, 365.0, 369.0, 372.9, 376.8, 380.8, 384.7, 388.6, 392.5, 396.5, 400.4, 404.3, 408.3, 412.2, 416.1, 420.1, 424.0, 427.9, 431.9, 435.8],
        2 => [35.7, 39.9, 44.1, 46.7, 55.0, 60.3, 65.5, 70.8, 76.0, 81.3, 87.2, 90.4, 93.7, 97.0, 100.3, 103.5, 106.8, 110.1, 113.4, 116.6, 119.9, 123.2, 126.5, 129.7, 133.0, 136.3, 139.6, 142.8, 146.1, 149.4, 152.7, 155.9, 159.2, 162.5, 165.7, 169.0, 172.3, 175.6, 178.8, 182.1, 185.7, 189.2, 192.7, 196.3, 199.8, 203.4, 206.9, 210.4, 214.0, 217.5, 221.1, 224.6, 228.1, 231.7, 235.2, 238.7, 242.3, 245.8, 249.4, 252.9, 256.4, 259.9, 263.5, 267.0, 270.5, 274.0, 277.5, 281.0, 284.6, 288.1, 291.6, 295.1, 298.6, 302.1, 305.7, 309.2, 312.7, 316.2, 319.7, 323.2, 326.8, 330.3, 333.8, 337.3, 340.8, 344.3, 347.9, 351.4, 354.9, 358.4, 361.9, 365.4, 369.0, 372.5, 376.0, 379.5, 383.0, 386.5, 390.1, 393.6],
        3 => [35.7, 39.9, 44.1, 46.7, 55.0, 60.3, 65.5, 70.8, 76.0, 81.3, 87.2, 90.4, 93.7, 97.0, 100.3, 103.5, 106.8, 110.1, 113.4, 116.6, 119.9, 123.2, 126.5, 129.7, 133.0, 136.3, 139.6, 142.8, 146.1, 149.4, 152.7, 155.9, 159.2, 162.5, 165.7, 169.0, 172.3, 175.6, 178.8, 182.1, 185.7, 189.2, 192.7, 196.3, 199.8, 203.4, 206.9, 210.4, 214.0, 217.5, 221.1, 224.6, 228.1, 231.7, 235.2, 238.7, 242.3, 245.8, 249.4, 252.9, 256.4, 259.9, 263.5, 267.0, 270.5, 274.0, 277.5, 281.0, 284.6, 288.1, 291.6, 295.1, 298.6, 302.1, 305.7, 309.2, 312.7, 316.2, 319.7, 323.2, 326.8, 330.3, 333.8, 337.3, 340.8, 344.3, 347.9, 351.4, 354.9, 358.4, 361.9, 365.4, 369.0, 372.5, 376.0, 379.5, 383.0, 386.5, 390.1, 393.6],
        4 => [57.3, 65.7, 74.0, 82.4, 90.7, 99.3, 108.0, 116.6, 125.2, 133.8, 142.4, 149.7, 157.0, 164.3, 171.6, 178.9, 186.2, 193.5, 200.8, 208.1, 212.8, 217.5, 222.2, 226.9, 231.6, 236.3, 241.0, 245.7, 250.4, 255.1, 259.8, 264.5, 269.2, 273.9, 278.6, 283.3, 288.0, 292.7, 297.4, 302.1, 306.3, 310.5, 314.7, 318.8, 323.0, 327.2, 331.4, 335.6, 339.7, 343.9, 348.1, 352.3, 356.4, 360.6, 364.8, 369.0, 373.1, 377.3, 381.5, 385.7, 390.5, 395.4, 400.3, 405.2, 410.1, 415.0, 419.8, 424.7, 429.6, 434.5, 439.4, 444.3, 449.1, 454.0, 458.9, 463.8, 468.7, 473.6, 478.4, 483.3, 488.2, 493.1, 498.0, 502.9, 507.8, 512.6, 517.5, 522.4, 527.3, 532.2, 537.1, 541.9, 546.8, 551.7, 556.6, 561.5, 566.4, 571.2, 576.1, 581.0],
        5 => [61.6, 74.1, 86.6, 99.0, 111.5, 123.0, 134.5, 146.0, 157.5, 169.0, 176.3, 183.5, 190.8, 198.1, 205.4, 212.6, 219.9, 227.2, 234.5, 241.7, 247.3, 252.8, 258.3, 263.8, 269.3, 274.9, 280.4, 285.9, 291.4, 296.9,  302.5, 308.0, 313.5, 319.0, 324.5, 330.0, 335.6, 341.1, 346.6, 352.1, 357.6, 363.2, 368.7, 374.2, 379.7, 385.2, 390.7, 396.3, 401.8, 407.3,  412.8, 418.3, 423.9, 429.4, 434.9, 440.4, 445.9, 451.5, 457.0, 462.5, 466.7, 470.8, 475.0, 479.2, 483.4, 487.5, 491.7, 495.9, 500.1, 504.2, 508.4, 512.6, 516.8, 521.0, 525.1, 529.3, 533.5, 537.7, 541.8, 546.0,  550.2, 554.4, 558.5, 562.7, 566.9, 571.1, 575.2, 579.4, 583.6, 587.8, 591.9, 596.1, 600.3, 604.5, 608.6, 612.8, 617.0, 621.2, 625.3, 629.5],
        6 => [66.3, 82.8, 99.4, 115.9, 132.5, 147.0, 161.5, 176.0, 190.6, 205.1, 220.3, 229.0, 237.8, 246.5, 255.2, 263.9, 272.6, 281.3, 290.1, 298.8, 303.1, 307.5, 311.9, 316.2, 320.6, 324.9, 329.3, 333.6, 338.0, 342.4, 346.7, 351.1, 355.4, 359.8, 364.2, 368.5, 372.9, 377.2, 381.6, 386.0, 391.0, 396.1, 401.2, 406.3, 411.3, 416.4, 421.5, 426.6, 431.7, 436.7, 441.8, 446.9, 452.0, 457.1, 462.1, 467.2, 472.3, 477.4, 482.5, 487.5, 495.9, 504.3, 512.7, 521.0, 529.4, 537.8, 546.2, 554.5, 562.9, 571.3, 579.7, 588.0, 596.4, 604.8, 613.2, 621.5, 629.9, 638.3, 646.7, 655.0, 663.4, 671.8, 680.2, 688.5, 696.9, 705.3, 713.7, 722.1, 730.4, 738.8, 747.2, 755.6, 763.9, 772.3, 780.7, 789.1, 797.4, 805.8, 814.2, 822.6],
        7 => [66.3, 82.8, 99.4, 115.9, 132.5, 147.0, 161.5, 176.0, 190.6, 205.1, 220.3, 229.0, 237.8, 246.5, 255.2, 263.9, 272.6, 281.3, 290.1, 298.8, 303.1, 307.5, 311.9, 316.2, 320.6, 324.9, 329.3, 333.6, 338.0, 342.4, 346.7, 351.1, 355.4, 359.8, 364.2, 368.5, 372.9, 377.2, 381.6, 386.0, 391.0, 396.1, 401.2, 406.3, 411.3, 416.4, 421.5, 426.6, 431.7, 436.7, 441.8, 446.9, 452.0, 457.1, 462.1, 467.2, 472.3, 477.4, 482.5, 487.5, 495.9, 504.3, 512.7, 521.0, 529.4, 537.8, 546.2, 554.5, 562.9, 571.3, 579.7, 588.0, 596.4, 604.8, 613.2, 621.5, 629.9, 638.3, 646.7, 655.0, 663.4, 671.8, 680.2, 688.5, 696.9, 705.3, 713.7, 722.1, 730.4, 738.8, 747.2, 755.6, 763.9, 772.3, 780.7, 789.1, 797.4, 805.8, 814.2, 822.6],
    ];

    // Calcular volumen (peso volumétrico)
    $volumen = ($ancho * $largo * $alto) / 5000; // Fórmula volumétrica

    // Usar el peso mayor entre peso real y volumétrico
    $pesoFinal = max($volumen, $peso);

    // Determinar el índice de tarifa
    if ($pesoFinal <= 30) {
        $indice = min(ceil($pesoFinal * 2), count($tarifasZona[$zona])) - 1;
    } else {
        $indice = 60 + ($pesoFinal - 31); // A partir de 30 kg, incrementos de 1 kg
    } // Multiplicar el peso por 2 para considerar los incrementos de 0.5 kg ya que los toma de uno en uno 


    // Verificar si la zona existe en el array de tarifas
    if (!isset($tarifasZona[$zona])) {
        die("Error: Zona no válida.");
    }
    // para validar que los valores ingresados por los usuarios sean mayores a 0 , si no es asi saldra un error
    if ($peso <= 0 || $ancho <= 0 || $largo <= 0 || $alto <= 0 || $cantidad <= 0) {

        echo '<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "¡Todos los valores deben ser mayores que cero!"
                });
            });
          </script>';
        exit; // Terminar la ejecución del script
    }
    // Obtener tarifa por paquete según el peso
    if (isset($tarifasZona[$zona][$indice])) {
        $tarifaPorPaquete = $tarifasZona[$zona][$indice];
    } else {
        // para usar la tarifa más alta disponible en los arrays si se excede al ser ingresado 
        $tarifaPorPaquete = end($tarifasZona[$zona]);
    }

    // para calcular flete en dolares
    $fleteFinalUSD = $tarifaPorPaquete;

    // para convertir cop usando TRM del día
    $fleteFinalCOP = $fleteFinalUSD * $trmDolar;

    // Devolver resultado
    return [
        'fleteUSD' => $fleteFinalUSD,
        'fleteCOP' => $fleteFinalCOP
    ];
}
// Función para agrupar cotizaciones por zona de destino y sumar pesos
// Función para agrupar cotizaciones por zona de destino y multiplicar el peso si hay varias cantidades
function agruparCotizacionesPorZona($cotizaciones)
{
    $cotizacionesAgrupadas = [];

    foreach ($cotizaciones as $cotizacion) {
        $zona = $cotizacion['zona'];
        $peso = $cotizacion['peso'] * $cotizacion['cantidad']; // Multiplica el peso por la cantidad

        if (!isset($cotizacionesAgrupadas[$zona])) {
            $cotizacionesAgrupadas[$zona] = [
                'peso_total' => 0,
                'dimensiones' => [
                    'ancho' => $cotizacion['ancho'],
                    'largo' => $cotizacion['largo'],
                    'alto' => $cotizacion['alto']
                ],
                'zona' => $zona,
                'paquetes' => []
            ];
        }

        $cotizacionesAgrupadas[$zona]['paquetes'][] = [
            'peso' => $peso,
            'cantidad' => $cotizacion['cantidad'],

        ];
        $cotizacionesAgrupadas[$zona]['peso_total'] += $peso;
    }

    return $cotizacionesAgrupadas;
}

// Función para procesar varias cotizaciones
function procesarVariasCotizaciones($cotizaciones)
{

    $resultados = [];
    $pesoTotal = 0;
    $costoTotalUSD = 0;
    $costoTotalCOP = 0;

    // Agrupar cotizaciones por zona
    $cotizacionesAgrupadas = agruparCotizacionesPorZona($cotizaciones);

    foreach ($cotizacionesAgrupadas as $zona => $datosZona) {
        $pesoTotalZona = 0; // Variable para calcular el peso total por zona

        // Primero calculamos el flete para cada paquete individualmente
        foreach ($datosZona['paquetes'] as $paquete) {
            $resultadoFleteIndividual = calcularFlete(
                $paquete['peso'],
                $datosZona['dimensiones'],
                $paquete['cantidad'],
                $zona
            );

            // Agregar el peso del paquete individual al peso total de la zona
            $pesoTotalZona += $paquete['peso'];

            // Guardar el detalle de cada paquete individual
            $resultados['paquetes'][] = [
                'peso' => $paquete['peso'],
                'fleteUSD' => $resultadoFleteIndividual['fleteUSD'],
                'fleteCOP' => $resultadoFleteIndividual['fleteCOP']
            ];
        }

        // Luego calculamos el flete para el peso total combinado de la zona
        $resultadoFleteTotalZona = calcularFlete(
            $pesoTotalZona,
            $datosZona['dimensiones'],
            1, // Solo un paquete combinado para el cálculo del total
            $zona
        );

        // Sumar el peso total y los costos combinados de esta zona
        $pesoTotal += $pesoTotalZona;
        $costoTotalUSD += $resultadoFleteTotalZona['fleteUSD'];
        $costoTotalCOP += $resultadoFleteTotalZona['fleteCOP'];
    }

    // Devolver resultados con el cálculo individual y el total combinado
    return [
        'paquetes' => $resultados['paquetes'], // Detalle individual
        'pesoTotal' => $pesoTotal, // Peso total combinado
        'costoTotalUSD' => $costoTotalUSD, // Costo total en USD para el peso combinado
        'costoTotalCOP' => $costoTotalCOP  // Costo total en COP para el peso combinado
    ];
}
?>


</body>

</html>