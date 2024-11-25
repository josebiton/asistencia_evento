
<?php
require '../vendor/autoload.php'; // PHPSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;

include_once '../common/conexion.php';
// Procesar archivo subido
if (isset($_POST['upload'])) {
    if (isset($_FILES['file']['name']) && $_FILES['file']['error'] == 0) {
        // Guardar el archivo en la carpeta 'uploads'
        $uploadDir = __DIR__ . '/uploads/';
        $filePath = $uploadDir . basename($_FILES['file']['name']);
        
        // Mueve el archivo a una ubicación temporal en 'uploads'
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            // Leer el archivo Excel
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $header = $sheet->rangeToArray('A1:' . $sheet->getHighestColumn() . '1')[0]; // Encabezados
            
            echo "<form action='guarda_data.php' method='post'>";
            echo "<input type='hidden' name='filePath' value='" . $filePath . "'>";
            
            echo "<h3>Seleccione los campos para cargar en la base de datos:</h3>";
            foreach ($header as $index => $field) {
                echo "<label><input type='checkbox' name='fields[]' value='$index'> $field</label><br>";
            }
            
            echo "<button type='submit' name='save'>Guardar en la Base de Datos</button>";
            echo "</form>";
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error al cargar el archivo.";
    }
}

// Guardar datos seleccionados en la base de datos

?>

