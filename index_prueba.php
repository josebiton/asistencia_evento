<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda en tiempo real</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Búsqueda en Base de Datos</h2>
    <input type="text" id="searchBox" placeholder="Escribe para buscar...">
    <p id="resultMessage"></p>

    <script>
        $(document).ready(function(){
            $('#searchBox').on('input', function(){
                let query = $(this).val();

                if(query.length > 0){
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {query: query},
                        success: function(response){
                            $('#resultMessage').text(response);
                            if(response === "Encontrado") {
                                $('#searchBox').val(''); // Limpia el campo si se encuentra
                            }
                        }
                    });
                } else {
                    $('#resultMessage').text(''); // Limpia el mensaje si no hay texto
                }
            });
        });
    </script>

</body>
</html>