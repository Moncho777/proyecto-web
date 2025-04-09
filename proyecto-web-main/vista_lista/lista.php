<?php
include("../src/pages/conexion.php");

$sql = "SELECT * FROM convenios";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lista de Convenios</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="estilo/estilo.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
  <style>
    .clickable-row td {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="barra-rosa"></div>

  <header class="barra-purpura">
    <div class="logo-institucion">
      <img src="images/Grupo_10491.svg" alt="Tecnológico Superior de Jalisco" />   
    </div>

    <nav class="menu-principal">
      <button onclick="window.location.href='https://google.com'">Modulos</button>
      <button onclick="window.location.href='https://google.com'">Contacto</button>
      <button onclick="window.location.href='https://google.com'">Edcore</button>
    </nav>
  </header>

  <div class="fila-busqueda">
    <h2>Lista de convenios</h2>
    <div class="botones-container">
      <img src="img/icono-regresar.png" alt="Volver" class="btn-volver" onclick="window.location.href='../index.php'" />
      <!-- Search button removed -->
    </div>
  </div>

  <!-- Add a container div for better styling -->
  <div class="datatable-container">
    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Convenio</th>
          <th>Marca</th>
          <th>Contacto</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Vencimeinto</th>
          
        </tr>
      </thead>
      <tbody>
      
      <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
          ?>

<tr onclick="window.location.href='../vista_empresa/index.php?id=<?php echo $fila["id"]; ?>'">
          <td><?php echo $fila["id"]; ?></td>
          <td><?php echo $fila["nombre"]; ?></td>
          <td><?php echo $fila["convenio"]; ?></td>
          <td><img src='<?php echo "../src/pages/".str_replace("../", "", $fila["logo"]); ?>' width="50px"/></td>
          <td><?php echo $fila["contacto"]; ?></td>
          <td><?php echo $fila["telefono"]; ?></td>
          <td><?php echo $fila["correo"]; ?></td>
          <td><?php echo date('d/m/Y', strtotime($fila["vencimiento"])); ?></td>   
        </tr>

<?php
            }
          }
            $conn->close();
?>
            
<!-- Removing the extra ?> that was here -->
      
       
      </tbody>
    </table>
  </div>
    
  <!-- Footer -->
<div class="footer w-full p-10">
  <div class="footer-container flex justify-between items-center">
      <div class="footer-img">
          <img src="images/Grupo_10491.svg" alt="Footer Image 1" loading="lazy" />
      </div>
      <div class="footer-links flex gap-4">
          <a href="https://www.facebook.com/TecSJ" class="footer-img" target="_blank">
              <img src="images/facebook-svgrepo-com.svg" alt="Facebook Link" loading="lazy" />
          </a>
          <a href="https://www.youtube.com/@TecSJ" class="footer-img" target="_blank">
              <img src="images/youtube-svgrepo-com.svg" alt="YouTube Link" loading="lazy" />
          </a>
      </div>
      <div class="footer-text-links flex flex-col items-center gap-2">
          <a href="../index.php" class="footer-link">Modulo de convenios</a>
          <a href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml?idEntidad=MTQ=&idSujetoObligado=MTM3OTE=#inicio" class="footer-link">Plataforma Nacional de Transparencia</a>
      </div>
  </div>
</div>
<!-- Información Adicional -->
<div class="extra-info w-full p-6 bg-gray-800 text-white text-center">
  <div class="additional-images">
      <img src="images/educacion.png" alt="Logo de la secretaria de educacion publica" loading="lazy" />
      <img src="images/tecnologico.svg" alt="logo del tecnologico nacional de mexico" loading="lazy" />
      <img src="images/innovacion.png" alt="" loading="lazy" />
      <img src="images/jalisco.png" alt="logo del gobierno de jalisco" loading="lazy" />
  </div>
</div>

<!-- jQuery must be loaded BEFORE DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTables Buttons and required extensions -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

<!-- Your custom script -->
<script src="script.js"></script>
</body>
</html>
