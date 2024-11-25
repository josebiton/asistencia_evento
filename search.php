<?php
$servername = "localhost";  // Cambia a tu configuración
$username = "root";
$password = "";
$dbname = "eventos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if(isset($_POST['query'])){
    $query = $conn->real_escape_string($_POST['query']);

    // Consulta para buscar el registro
    //$sql = "SELECT dni,estado FROM evento WHERE dni = '$query'";
    //$result = $conn->query($sql);
    
$sql = mysqli_query($conn,"SELECT dni, estado FROM evento WHERE dni='$query'" );

$row = mysqli_fetch_array($sql);
$estado = $row['estado'];

    if ($sql->num_rows > 0) {
        
       if($estado=='Entró'){
    echo "Esta Persona ya Entró";
}else{
   $update = "UPDATE evento SET estado = 'Entró' WHERE dni = '$query'";
        $conn->query($update); 
        echo "Persona Encontrada y registrado su entrada";
}    
    } else {
        echo "No encontrado";
    }
}

$conn->close();
?>
