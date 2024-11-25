<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../common/conexion.php';
$id = $_POST['id'];
$sucursales = mysqli_fetch_assoc(mysqli_query($link, "SELECT*FROM sucursales WHERE id_sucursal='$id'"));
?>
<div class="form-group col-lg-12 row">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="col-sm-12"><input type="text" placeholder="* Nombres"class="form-control"name="nombre" required=""onkeypress="return SoloLetras(event)" value="<?php echo $sucursales['nombre'];?>"></div>
</div>

<div class="form-group col-lg-12 row">    
    <div class="col-sm-6">
        <input type="tel" placeholder="Teléfono"class="form-control"name="telefono" onkeypress="return SoloNumeros(event)" maxlength="9"value="<?php echo $sucursales['telefono'];?>">
    </div>
    <div class="col-sm-6"form-group"> 
        <select class="form-control"onchange="javascript:region1(this.value);" name="regionUpd">
            <option><?php echo $sucursales['region'];?></option>
            <?php
            $regiones = mysqli_query($link, "SELECT region FROM peru GROUP BY region");
            while ($row = mysqli_fetch_array($regiones)) {
                ?>
                <option><?php echo $row['region']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6 form-group"id="provinciasUpd">
        <select class="form-control" onchange="javascript:provincias1(this.value);" name="provinciaUpd">
            <option><?php echo $sucursales['provincia'];?></option>
        </select> 
    </div>  
    <div class="col-sm-6 form-group" id="distritosUpd">
        <select class="form-control" name="distritoUpd">
            <option><?php echo $sucursales['distrito'];?></option>
        </select>
    </div> 
</div>
<div class="form-group col-lg-12 row">
    <input type="text"class="form-control" placeholder="Dirección"name="direccion"value="<?php echo $sucursales['direccion'];?>">   
</div>
<!-- <div class="form-group col-lg-12 row">
     <input type="file"class="form-control"name="foto">   
 </div>
-->
<div class="modal-footer">
    <div id="MsjUpdSucursal"> </div>   
    <input type="submit" class="btn btn-primary" value="Actualizar">
</div>

