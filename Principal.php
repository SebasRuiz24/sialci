<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIALCI.SAS</title>
    <link rel="icon" href="img/icono.jpg" >
    <link rel="stylesheet" href="principal1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- icono whatsapp -->
    <a href="https://wa.me/573204146958?text=Hola" class="btn-wsp" target="_blank">
        <i class="fa fa-whatsapp icono" style="font-size: 48px;"></i>
    </a>
    <!-- video -->
    <video muted autoplay loop playsinline src="img/portada.mp4" class="video" id="sialci"></video>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="#"> <img src="img/icono.jpg" alt="icono de la pagina"  > </a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIALCI-SAS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 active" aria-current="page" href="#sialci">SIALCI SAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
            <a href="PHP/logueo.php" class="login-button" >Iniciar sesion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

    <h1 id="productos" ><span>Productos que hemos Exportado</span></h1>

    <div class="d-flex justify-content-center">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="max-width: 1000px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/bolso2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/valdez.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/cafe.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <h1 id="productos" ><span>Origenes de nuestros Productos</span></h1>

    <div class="d-flex justify-content-center">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="max-width: 1000px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/acevedo.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>Acevedo-Huila</h5>
                    <p>Altura: 1.348 – 1855 m s. n. m </p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/garzon.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>Garzon-Huila</h5>
                    <p>Altura: 1.355 – 1730 m s. n. m.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/pitalito.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>Pitalito-Huila</h5>
                    <p>Altura: 1.318-2.762 m s. n. m</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/plata.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>La Plata-Huila</h5>
                    <p>Altura: 1.050 – 2032 m s. n. m</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/san.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>San Agustin-Huila</h5>
                    <p>Altura: 1.730 – 2.621 m s. n. m.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/santa.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>La Santa Maria-Huila</h5>
                    <p>Altura: 1.320 – 2.492 m s. n. m </p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/teruel.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>Teruel-Huila</h5>
                    <p>Altura: 900 – 1.728 m s. n. m.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/iquira.jpg" class="d-block w-100 img-responsive" alt="...">
                <div class="carousel-caption d-sm-block">
                    <h5>Íquira-Huila</h5>
                    <p>Altura: 1.123 – 2.024 m s. n. m.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


    <h1 id="productos" ><span>De colombia para el Mundo</span></h1>

    <article>
        <div class="contenedorimg">
            <img src="img/Cafesub.jpeg" alt="imagen cafe">
        </div>
    </article>

    <div class="qr">
    <div class="text">
        <p>¡Escanea el código QR para contactarnos por WhatsApp!</p>
    </div>
    <div class="qr">
        <img id="contacto" src="img/qr1.jpg" alt="Código QR de WhatsApp">
    </div>
</div>



    <footer class="bg-light text-dark pt-5 pb-4">
            <div class="container text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Nosotros</h5>
                        <hr class="mb-4">
                        <p>Sialci SAS es una empresa que permite conectar los productos colombianos con los compradores extranjeros, sin ninguna complicación y puerta a puerta</p>
                    </div>
                        <div class="col-md-2 col-lg-2 col-lx-2 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Dejanos</h5>
                            <hr class="mb-4">
                            <p>
                                <a href="#" class="text-dark">Tus Datos</a>
                            </p>
                            <p>
                                <a href="#" class="text-dark">Tus Ordenes</a>
                            </p>
                            <p>
                            <a href="#" class="text-dark">Manejo de tus pedidos</a>
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-lx-2 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Direccion</h5>
                            <hr class="mb-4">
                            <p>
                                <a href="#" class="text-dark">Colombia</a>
                            </p>
                            <p>
                                <a href="#" class="text-dark">Neiva-Huila</a>
                            </p>
                            <p>
                            <a href="#" class="text-dark">Calle 13a # 35 - 11, neiva</a>
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-lx-2 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Contacto</h5>
                            <hr class="mb-4">
                            <p>
                                <li class="fas fa-home me-3"></li>Colombia, Huila 
                            </p>
                            <p>
                                <li class="fas fa-envelope me-3"></li>andres.morales@sialcisas.com
                            </p>
                            <p>
                                <li class="fas fa-phone me-3"></li>3204146958
                            </p>
                            <p>
                                <li class="fas fa-print me-3"></li> +573204146958
                            </p>
                        </div>
                        <hr class="mb-4">
                        <div class="text-center mb-2">
                            <p>
                                Copyright Todos los derechos reservados
                            </p>
                        </div>
                        <div class="text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/SIALCI?mibextid=ZbWKwL" class="text-dark"><i class="fab fa-2x fa-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://wa.me/573204146958?text=Hola" class="text-dark"><i class="fab fa-2x fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
    </footer>
</body>
</html>