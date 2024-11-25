<?php
error_reporting(0);
include_once '../../common/conexion.php';
$id = $_POST['id'];
$detalles = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM ataudes WHERE id_ataud = '$id'"));
$id_sucursal = $_SESSION['sucursal'];
?>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="form-group"><input type="text" placeholder="Modelo"class="form-control" name="modelo" value="<?php echo $detalles['modelo']; ?>" required=""></div>
<div class="form-group col-lg-12 row" ><div class="col-sm-6"><input type="text" placeholder="Cod. Barras"class="form-control" name="barras" value="<?php echo $detalles['codigo_barras']; ?>" required=""></div>
    <div class="col-sm-6"><input type="text" placeholder="Color"class="form-control" name="color" value="<?php echo $detalles['color']; ?>"></div></div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6">
        <select class="form-control"name="tipo">
            <option value="<?php echo $detalles['tipo']; ?>"><?php echo $detalles['tipo']; ?></option>
            <option value="PEQUE">PEQUEÑO</option>
            <option value="MEDIANO">MEDIANO</option>
            <option value="GRANDE">GRANDE</option>
            <option value="EXTRA">EXTRA GRANDE</option>
        </select>
    </div>
    <div class="col-sm-6"> 
         <select class="form-control"name="proveedor">
            <?php
            $id_proveedor = $detalles['id_proveedor'];
            $proveedor = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombre FROM proveedores WHERE id_proveedor='$id_proveedor'"));
            ?>
            <option value="<?php echo $proveedor['nombre']; ?>"><?php echo $proveedor['nombre']; ?></option>
            <?php
            $proveedores = mysqli_query($link, "SELECT id_proveedor,nombre FROM proveedores");
            while ($row = mysqli_fetch_array($proveedores)) {
                ?>
                <option value="<?php echo $row['id_proveedor']; ?>"><?php echo $row['nombre']; ?></option>
            <?php } ?>
        </select>                                         
    </div>
</div>



<div class="modal-footer">
    <input type="submit" class="btn btn-primary"  value="Actualizar">
</div>

