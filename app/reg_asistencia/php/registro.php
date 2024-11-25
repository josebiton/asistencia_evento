<style>            
.texto-centrado {
    text-align: center; /* Centra el texto */
    font-size: 2em; /* Tamaño similar a un h2 */
    color: red; /* Color rojo */
}
        </style>
<?php
error_reporting(0);
include_once '../../../common/conexion.php';
if(isset($_POST['query'])){
    $query = $link->real_escape_string($_POST['query']);
    
$sql = mysqli_query($link,"SELECT * FROM participantes WHERE dni='$query' AND (asistio IS NULL OR asistio != 'SI')" );

$row = mysqli_fetch_array($sql);
$nombres = $row['nombres'];
$estado = $row['asistio'];

    if ($sql->num_rows > 0) {
        
       if($estado=='SI'){
    ?> <div class="texto-centrado">Esta persona ya ingresó</div><?php
}else{
   $update = "UPDATE participantes SET asistio = 'SI' WHERE dni = '$query' LIMIT 1";
        $link->query($update); 
        ?> <div class="texto-centrado"> <?php echo $nombres; ?>  <br>registrado su entrada</div><?php
}    
    } else {
        ?> <div class="texto-centrado">Persona no registrada</div><?php
    }
}

$link->close();

 
 
?>
