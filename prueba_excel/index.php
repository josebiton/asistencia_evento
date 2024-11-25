<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivo Excel</title>
</head>
<body>
    <h2>Subir y Seleccionar Campos de Archivo Excel</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Seleccione un archivo Excel:</label>
        <input type="file" name="file" id="file" accept=".xlsx, .xls" required>
        <button type="submit" name="upload">Cargar</button>
    </form>
</body>
</html>