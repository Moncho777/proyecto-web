<?php
include('../conexion.php'); // Incluir la conexión a la base de datos

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibimos los datos del formulario
    $empresa = $_POST['empresa'];
    $tipoConvenio = $_POST['tipoConvenio'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $vencimiento = $_POST['vencimiento'];
    $website = isset($_POST['website']) ? $_POST['website'] : null;
    $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : null;
    $youtube = isset($_POST['youtube']) ? $_POST['youtube'] : null;
    $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : null;

    // Manejo del logo (archivo de imagen)
    if (isset($_FILES['logo'])) {
        $logo = $_FILES['logo'];
        $logoName = $logo['name'];
        $logoTmpName = $logo['tmp_name'];
        $logoSize = $logo['size'];
        $logoError = $logo['error'];
        $logoType = $logo['type'];

        // Validación para aceptar solo imágenes
        $allowed = array('jpg', 'jpeg', 'png');
        $fileExt = strtolower(pathinfo($logoName, PATHINFO_EXTENSION));

        if (in_array($fileExt, $allowed)) {
            if ($logoError === 0) {
                if ($logoSize < 10000000) { // 1MB máximo
                    $newLogoName = uniqid('', true) . '.' . $fileExt;
                    $logoDestination = '../upload/' . $newLogoName; // Carpeta donde guardaremos el logo
                    if(move_uploaded_file($logoTmpName, $logoDestination)){
                        echo "El archivo fue guardado.";     
                    }
                } else {
                    echo "El archivo es demasiado grande.";
                }
            } else {
                echo "Hubo un error al subir el archivo.";
            }
        } else {
            echo "Tipo de archivo no permitido.";
        }
    }

    // Preparar la consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO convenios (id, nombre ,convenio ,logo , contacto, telefono, correo, vencimiento, web, facebook, youtube, twitter) 
            VALUES (0,?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind de los parámetros
        $stmt->bind_param("sssssssssss", $empresa, $tipoConvenio, $logoDestination, $contacto, $telefono, $email, $vencimiento, $website, $facebook, $youtube, $twitter);

        // Ejecutar la consulta
        $exito=0;
        if ($stmt->execute()) {
            echo "Convenio registrado exitosamente.";
            $exito=1;
        } else {
            echo "Error al registrar el convenio: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
     
    if($exito==1){
       header("Location: ../../../vista_lista/lista.php");
       exit();
    }
}
?>
