<?php

require '../../vendor/autoload.php'; // PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

include_once '../../common/conexion.php';

if (isset($_POST['save'])) {
    $filePath = $_POST['filePath'];
    $selectedFields = $_POST['fields'];
    $id_evento = $_POST['id_evento'];

    if (empty($selectedFields)) {
        die("Seleccione al menos un campo.");
    }
    // Define el mapeo entre índices y nombres de columnas de la base de datos
    $columnMapping = [
        0 => 'nombres', // Columna A en Excel corresponde a 'nombres' en la base de datos
        1 => 'dni',
        2 => 'grupo',
        3 => 'fecha_pago',
        4 => 'hora_pago',
    ];
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    $data = $sheet->toArray();
    // Convertir índices seleccionados a nombres de columnas
    $columnNames = array_map(function ($index) use ($columnMapping) {
        return $columnMapping[$index];
    }, $selectedFields);
    // Agregar la columna id_evento a los nombres de columnas
    $columnNames[] = 'id_evento';

    // Insertar cada fila en la base de datos
    foreach ($data as $rowIndex => $row) {
        if ($rowIndex == 0) continue; // Saltar encabezado

        // Filtrar las columnas seleccionadas
        $filteredRow = array_intersect_key($row, array_flip($selectedFields));
        $values = implode("','", array_map(function ($value) use ($link) {
            return mysqli_real_escape_string($link, $value);
        }, array_map('strval', $filteredRow)));

        // Agregar el valor de id_evento a los valores
        $values .= "','" . mysqli_real_escape_string($link, $id_evento);

        // Construir la consulta SQL con los nombres de columnas y valores
        $sql = "INSERT INTO participantes (" . implode(',', $columnNames) . ") VALUES ('$values')";
        if (!$link->query($sql)) {
            echo "Error: " . $link->error;
        }
    }

    echo "Datos insertados correctamente.";
}

    ?> 
    <script>
        alert("Operación realizada con éxito.");
        window.location.href = "data.php";
    </script> 
    <?php

    unlink($filePath);

?>
