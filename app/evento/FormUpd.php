<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../common/conexion.php';
$id = $_POST['id'];
$query = mysqli_fetch_assoc(mysqli_query($link, "SELECT*FROM evento WHERE id_evento='$id'"));
?>
<div class="form-group col-lg-12 row">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="col-sm-12"><input type="text" placeholder="* Nombre"class="form-control"name="nombre" required="" value="<?php echo $query['nombre_evento']; ?>"></div>
</div>

<div class="form-group col-lg-12 row">                                                                                                 
    <div class="col-sm-12 form-group">
        <input type="date" placeholder="Fecha del evento"class="form-control"name="fecha" value="<?php echo $query['fecha_evento']; ?>"> 
    </div>
</div>
<div class="form-group col-lg-12 row">                                                                                                 
    <div class="col-sm-12 form-group">
        <input type="time" placeholder="Hora del evento"class="form-control"name="hora" value="<?php echo $query['hora_evento']; ?>"> 
    </div>
</div>
<div class="form-group col-lg-12 row">                                                                                                 
    <div class="col-sm-12 form-group">
        <input type="text" placeholder="Lugar del evento"class="form-control"name="lugar" value="<?php echo $query['lugar_evento']; ?>"> 
    </div>
</div>

<div class="form-group col-lg-12 row">
    <div class="col-sm-6 form-group">
        <select class="form-control" name="estado">
            <option><?php echo $query['estado']; ?></option>
            <option>Activo</option>
            <option>Inactivo</option>
        </select>
    </div>
</div>
<div class="modal-footer">      
    <input type="submit" class="btn btn-primary" value="Actualizar">
</div>

