<?php
require_once '../../common/conexion.php';
$region = $_POST['region'];
$provincias = mysqli_query($link, "SELECT provincia FROM peru WHERE region='$region'GROUP BY provincia");
?>
<select class="form-control" onchange="javascript:provincias1(this.value);" name="provinciaUpd">
<option>Elija Provincia</option>   
 <?php
    while ($row = mysqli_fetch_array($provincias)) { ?>
    <option><?php echo $row['provincia']; ?></option>
<?php } ?>
</select>

