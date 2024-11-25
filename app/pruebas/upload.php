<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Directorio donde se guardará el archivo
        $uploadDir = 'uploads/';
        
        // Crear el directorio si no existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Ruta completa del archivo
        $uploadFile = $uploadDir . basename($file['name']);

        // Intentar mover el archivo al directorio
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo "Archivo subido exitosamente: " . basename($file['name']);
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "No se ha recibido ningún archivo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

