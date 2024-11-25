<?php
include_once '../../common/conexion.php';
$id = $_POST['id'];
$detalles = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM ataudes WHERE id_ataud = '$id'"));

?>
<div class="form-group"><input type="text" placeholder="Modelo"class="form-control" name="modelo" value="<?php echo $detalles['modelo'];?>" disabled=""></div>
<div class="form-group col-lg-12 row" ><div class="col-sm-6"><input type="text" placeholder="Cod. Barras"class="form-control" name="barras" value="<?php echo $detalles['codigo_barras'];?>" disabled=""></div>
    <div class="col-sm-6"><input type="text" placeholder="Color"class="form-control" name="color" value="<?php echo $detalles['color'];?>" disabled=""></div></div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $detalles['tipo'];?>" disabled="">
    </div>
    <div class="col-sm-6"> 
       <?php
            $id_proveedor=$detalles['id_proveedor'];
            $proveedor = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombre FROM proveedores WHERE id_proveedor='$id_proveedor'"));
        ?>
        <input type="text" class="form-control"name="proveedor" placeholder="Proveedor" value="<?php echo $proveedor['nombre'];?>" disabled="">                                              
    </div>
</div>

<div class="form-group"> 
    <img src="uploads/<?php echo $detalles['foto']; ?>" alt="imagen" width="200" height="auto"/>
</div>


</div>


