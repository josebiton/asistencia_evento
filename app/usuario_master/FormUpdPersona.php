<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../common/conexion.php';
$idPer = $_POST['id'];
$idLogin = $_POST['idl'];
$personas = mysqli_fetch_assoc(mysqli_query($link, "SELECT*FROM personas WHERE id_persona='$idPer'"));
?>
<div class="form-group col-lg-12 row">
    <input type="hidden" name="id" value="<?php echo $idPer;?>">
    <input type="hidden" name="idl" value="<?php echo $idLogin;?>">
    <div class="col-sm-12"><input type="text" placeholder="* Nombres"class="form-control"name="nombres" required=""onkeypress="return SoloLetras(event)" value="<?php echo $personas['nombres'];?>"></div>
</div>
<div class="form-group col-lg-12 row"> 
    <div class="col-sm-12"><input type="text" placeholder="Apellidos"class="form-control"name="apellidos"  onkeypress="return SoloLetras(event)"value="<?php echo $personas['apellidos'];?>"></div>
</div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6"> 
        <input type="text" placeholder="* DNI"class="form-control"name="dni"  maxlength="8" required=""onkeypress="return SoloNumeros(event)"value="<?php echo $personas['dni'];?>">
    </div>
    <div class="col-sm-6"> <input type="tel" placeholder="Teléfono"class="form-control"name="telefono" onkeypress="return SoloNumeros(event)" maxlength="9"value="<?php echo $personas['telefono'];?>"></div>
</div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6"><input type="text" placeholder="Email"class="form-control"name="email"value="<?php echo $personas['email'];?>"> </div>
    <div class="col-sm-6"> <input type="date" title="fecha de Nacimiento"class="form-control"name="nacimiento" title="Fecha de Nacimiento" onkeypress="return SoloNumeros(event)"value="<?php echo $personas['nacimiento'];?>"></div>
</div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6"> 
        <select name="sexo" class="form-control" >
            <option><?php echo $personas['sexo'];?></option>
            <option>Masculino</option>
            <option>Femenino</option>                                                    
        </select>
    </div>                                                    
    <div class="col-sm-6"form-group"> 
        <select class="form-control"onchange="javascript:region1(this.value);" name="regionUpd">
            <option><?php echo $personas['region'];?></option>
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
            <option><?php echo $personas['provincia'];?></option>
        </select> 
    </div>  
    <div class="col-sm-6 form-group" id="distritosUpd">
        <select class="form-control" name="distritoUpd">
            <option><?php echo $personas['distrito'];?></option>
        </select>
    </div> 
</div>
<div class="form-group col-lg-12 row">
    <select class="form-control" name="sucursal">
        <?php 
        $sucursal= mysqli_fetch_assoc(mysqli_query($link, "SELECT sucursales.nombre,sucursales.id_sucursal,login.id_sucursal FROM sucursales, login WHERE login.id_sucursal=sucursales.id_sucursal")); 
        ?>
        <option value="<?php echo $sucursal['id_sucursal']; ?>"><?php echo $sucursal['nombre'];?></option>
        <?php
        $sucursales = mysqli_query($link, "SELECT id_sucursal, nombre FROM sucursales");
        while ($row = mysqli_fetch_array($sucursales)) {
            ?>
            <option value="<?php echo $row['id_sucursal']; ?>"><?php echo $row['nombre']; ?></option>
        <?php } ?>
    </select>   
</div>
<div class="form-group col-lg-12 row">
    <input type="text"class="form-control" placeholder="Dirección"name="direccion"value="<?php echo $personas['direccion'];?>">   
</div>
<!-- <div class="form-group col-lg-12 row">
     <input type="file"class="form-control"name="foto">   
 </div>
-->
<div class="modal-footer">
    <div id="MsjUpdPersona"> </div>   
    <input type="submit" class="btn btn-primary" value="Actualizar">
</div>

