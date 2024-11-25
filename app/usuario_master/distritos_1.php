<?php
require_once '../../common/conexion.php';
$provincia = $_POST['provincia'];
$distritos = mysqli_query($link, "SELECT distrito FROM peru WHERE provincia='$provincia'GROUP BY distrito");
?>
<select class="form-control" name="distritoUpd">
    <option>Elija Distrito</option> 
    <?php
    while ($row = mysqli_fetch_array($distritos)) { ?>
    <option><?php echo $row['distrito']; ?></option>
<?php } ?>
</select>

