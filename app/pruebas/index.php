<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo con AJAX</title>
</head>
<body>
    <h2>Subir archivo</h2>
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="file" id="fileInput" required>
        <button type="submit">Subir archivo</button>
    </form>
    <div id="result"></div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar que se envíe el formulario de forma tradicional

            // Obtener el archivo seleccionado
            const fileInput = document.getElementById('fileInput');
            const formData = new FormData();
            formData.append('file', fileInput.files[0]);

            // Enviar el archivo mediante AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Mostrar la respuesta de PHP
                    document.getElementById('result').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('result').innerHTML = 'Error al subir el archivo';
                }
            };

            xhr.send(formData); // Enviar el archivo
        });
    </script>
</body>
</html>
