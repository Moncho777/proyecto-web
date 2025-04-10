<?php
include("../src/pages/conexion.php");
$id=$_REQUEST['id'];
$sql = "SELECT * FROM convenios where id=".$id;
$resultado = $conn->query($sql);
$fila = $resultado->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Directorio oficial de convenios académicos, empresariales e internacionales del Tecnologico superior de Jalisco. Consulta prácticas, servicio social y colaboración institucional.">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; style-src 'self' https://fonts.googleapis.com 'unsafe-inline'; script-src 'self' 'unsafe-inline';">
    <link rel="preload" href="https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2" as="font" type="font/woff2" crossorigin>
    <style>
        /* Fuente Poppins con font-display: swap */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        
        
    </style> <!-- Carga no bloqueante de fuentes adicionales -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" media="print" onload="this.media='all'" />
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.png" />
    <link href="/proyecto-web/proyecto-web-main/vista_empresa/src/output.css" rel="stylesheet" />
    <link href="/proyecto-web/proyecto-web-main/vista_empresa/src/css/styles.css" rel="stylesheet" />
    <title>Convenios</title>
</head>

<body>
    <div class="container">
        <div class="w-full flex-col h-full mt-15">
            <div class="w-full fixed top-0 left-0 z-[999]" style="max-height: 164px">
                <div class="up-header"></div>
                <div class="flex flex-wrap justify-center items-center w-full mx-auto">
                    <div class="toolbar flex w-full justify-center items-center mx-auto gap-20">
                        <div class="imgJalisco"> <img src="assets/images/logo/Grupo_10491.svg" alt="Imagen Jalisco" class="logo-navbar no-styles" tabindex="0" /> </div> <img src="assets/images/logo/home.svg" alt="Imagen Home" class="logo-navbar no-styles home-icon" tabindex="0" />
                        <div class="desktop-nav">
                            <p class="text-white texto-inter">Unidades académicas</p>
                            <p class="text-white texto-inter">Contacto</p> <a href="src/pages/login/login.html" class="text-login text-white texto-inter">Iniciar Sesión</a>
                        </div> <button id="menuBtn" class="menu-button"> <img src="assets/images/logo/menu-svgrepo-com.svg" alt="Menu" class="logo-navbar no-styles" /> </button>
                    </div> 
                    <div id="menuPanel" class="menu-panel">
                        <div class="menu-content">
                            <p class="menu-item">Unidades académicas</p>
                            <p class="menu-item">Contacto</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="w-full p-4 mt-[164px]" style="background-color: #f5f5f5">
        <div class="oferta" title="Convenios">
            <div class="w-full relative py-2" style="background-color: #f5f5f5">
                <img src="assets/images/logo/imagenes/icono-regresar.png" alt="Volver" class="btn-volver" onclick="window.location.href='../vista_lista/lista.php'"/>
                <h5 class="text-convenios font-bold text-4xl text-base_blue-500"> Acerca de </h5>
            </div>
        </div>
    </div> 
   
    <div class="cards-container w-full p-6 flex justify-center gap-6 flex-wrap">
        
        <div class="company-card bg-white rounded-lg shadow-md p-6 w-full max-w-4xl">
            <div class="flex flex-row">
                <!-- Logo de la empresa -->
                <div class="company-logo-container">
                    <img src='<?php echo "../src/pages/".str_replace("../", "", $fila["logo"]); ?>' alt="Oracle Logo" class="company-logo">
                </div>
                
                <div class="company-info">
                    <h2 class="company-title"><?php echo $fila['nombre'];?></h2>
                    
                    <div class="company-details">
                        <p><strong>Correo:<?php echo $fila['correo'];?></strong></p>
                        <p><strong>Contacto:<?php echo $fila['contacto'];?></strong></p>
                        <p><strong>Teléfono:<?php echo $fila['telefono'];?></strong></p>
                        
                        <P><strong>Fecha de vencimiento:<?php echo date('d/m/Y', strtotime($fila['vencimiento']));?></strong></P>
                    </div>
                    
                    <!-- Redes sociales -->
                    <div class="social-links">
                        <div class="flex items-center gap-4">
                            <?php if(!empty($fila['web'])): ?>
                            <a href="<?php echo $fila['web']; ?>" class="social-icon-link" title="Enlace" target="_blank">
                                <img src="assets/images/logo/link-svgrepo-com.svg" alt="Enlace" class="social-icon">
                            </a>
                            <?php else: ?>
                            <a href="404.html" class="social-icon-link" title="Enlace no disponible">
                                <img src="assets/images/logo/link-svgrepo-com.svg" alt="Enlace" class="social-icon opacity-50">
                            </a>
                            <?php endif; ?>
                            
                            <?php if(!empty($fila['facebook'])): ?>
                            <a href="<?php echo $fila['facebook']; ?>" class="social-icon-link" title="Facebook" target="_blank">
                                <img src="assets/images/logo/facebook-color-svgrepo-com.svg" alt="Facebook" class="social-icon">
                            </a>
                            <?php else: ?>
                            <a href="404.html" class="social-icon-link" title="Facebook no disponible">
                                <img src="assets/images/logo/facebook-color-svgrepo-com.svg" alt="Facebook" class="social-icon opacity-50">
                            </a>
                            <?php endif; ?>
                            
                            <?php if(!empty($fila['twitter'])): ?>
                            <a href="<?php echo $fila['twitter']; ?>" class="social-icon-link" title="Twitter" target="_blank">
                                <img src="assets/images/logo/icons8-x.svg" alt="Twitter" class="social-icon">
                            </a>
                            <?php else: ?>
                            <a href="404.html" class="social-icon-link" title="Twitter no disponible">
                                <img src="assets/images/logo/icons8-x.svg" alt="Twitter" class="social-icon opacity-50">
                            </a>
                            <?php endif; ?>
                            
                            <?php if(!empty($fila['youtube'])): ?>
                            <a href="<?php echo $fila['youtube']; ?>" class="social-icon-link" title="YouTube" target="_blank">
                                <img src="assets/images/logo/youtube-168-svgrepo-com.svg" alt="YouTube" class="social-icon">
                            </a>
                            <?php else: ?>
                            <a href="404.html" class="social-icon-link" title="YouTube no disponible">
                                <img src="assets/images/logo/youtube-168-svgrepo-com.svg" alt="YouTube" class="social-icon opacity-50">
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="footer w-full p-10">
        <div class="footer-container flex justify-between items-center">
            <div class="footer-img"> <img src="assets/images/logo/Grupo_10491.svg" alt="Footer Image 1" loading="lazy" /> </div>
            <div class="footer-links flex gap-4"> <a href="https://www.facebook.com/TecSJ " class="footer-img " target="_blank"> <img src="assets/images/logo/facebook-svgrepo-com.svg" alt="Facebook Link" loading="lazy" /> </a> <a href="https://www.youtube.com/@TecSJ" class="footer-img" target="_blank"> <img src="assets/images/logo/youtube-svgrepo-com.svg" alt="YouTube Link" loading="lazy" /> </a> </div>
            <div class="footer-text-links flex flex-col items-center gap-2"> <a href="../index.php" class="footer-link">Modulo de convenios</a> <a href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml?idEntidad=MTQ=&idSujetoObligado=MTM3OTE=#inicio" class="footer-link">Plataforma Nacional de Transparencia</a> </div>
        </div>
    </div> <!-- Información Adicional -->
    <div class="extra-info w-full p-6 bg-gray-800 text-white text-center">
        <div class="additional-images"> <img src="assets/images/logo/imagenes/educacion.png" alt="Logo de la secretaria de educacion publica" loading="lazy" /> <img src="assets/images/logo/imagenes/tecnologico.svg" alt="logo del tecnologico nacional de mexico" loading="lazy" /> <img src="assets/images/logo/imagenes/innovacion.png" alt="" loading="lazy" /> <img src="assets/images/logo/imagenes/jalisco.png" alt="logo del gobierno de jalisco" loading="lazy" /> </div>
    </div>
    <script src="/proyecto-web/proyecto-web-main/src/js/script.js"></script>
</body>
</html>