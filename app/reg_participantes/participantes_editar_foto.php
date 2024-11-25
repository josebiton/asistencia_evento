<?php
include_once '../../common/conexion.php';
$id = $_POST['id'];
$detalles = mysqli_fetch_assoc(mysqli_query($link, "SELECT foto FROM ataudes WHERE id_ataud = '$id'"));

?>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="form-group">
    <img src="uploads/<?php echo $detalles['foto']; ?>" alt="imagen" width="200" height="auto"/>
</div>
<div class="form-group"><label>Foto</label><input type="file"class="form-control"name="foto"></div>
<div class="modal-footer">
    <input type="submit" class="btn btn-primary"  value="Actualizar Foto">
</div>
