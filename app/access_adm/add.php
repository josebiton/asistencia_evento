<?php
error_reporting(0);
include_once 'config.php';
include_once '../../common/conexion.php';
$IdP = $_POST['idp'];
$NP = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombres FROM personas WHERE id_persona='$IdP'"));
$NombreP = $NP['nombres'];
 $idL = $_POST['idl'];
 $idS = $_POST['ids'];
$Suc = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombre FROM sucursales WHERE id_sucursal='$idS'"));
$NombreSuc = $Suc['nombre'];
$accesos = mysqli_query($link, "SELECT codigo FROM accesos WHERE id_login='$idL' && sucursal='$idS'");
$nConfig = mysqli_num_rows($accesos);

if ($nConfig > 0) {
    for ($i = 0; $i < $nConfig; $i++) {
        $codigos = mysqli_fetch_array($accesos);
        $Codigo[$i] = $codigos["codigo"];
    }
}
?> 
<div class="ibox-title">
    <h5>Asignar Acceso  a: &nbsp;&nbsp; <font color="red"><b><?php echo $NombreP; ?> &nbsp;/ &nbsp;<?php echo $NombreSuc; ?>&nbsp;&nbsp;&nbsp;</b></font></h5>    
</div>
<div class="ibox-content"> 
    <div id="adm">
        <div class="col-lg-12 row form-group">
            <select class="form-control" id="perfil">
                <option value="0">* Elija el perfil de acceso</option>
                <option value="101">Administrador</option>
                <option value="102">Caja</option>
                <option value="103">Ventas</option>
                <option value="105">Almacén</option>
            </select> 
        </div>
        <div class="col-lg-12 row form-group">
            <a href="javascript:;" onclick="AccessSuc($('#perfil').val(), '<?php echo $IdP; ?>','<?php echo $idL;?>')" class="btn btn-success float-right "> Asignar </a>
        </div>

    </div>
    
</div>

</div>
<div class="ibox-content">
    <div class="table table-responsive" id="ReturnDiv2">
        <table class="table table-striped table-bordered table-hover " >
            <thead>
                <tr>
                    <th>Accede como:</th>
                    <th>Quitar acceso</th>
                </tr>
            </thead>
            <tbody>
                <tr class="gradeX">
                    <td> Admin Sucursal</td>
                    <td> 
                        <?php
                        if(in_array(101, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessSuc('<?php echo $IdP; ?>','101','<?php echo $idL; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td> Caja</td>
                    <td> 
                        <?php
                        if(in_array(102, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessSuc('<?php echo $IdP; ?>','102','<?php echo $idL; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td> Ventas</td>
                    <td> 
                        <?php
                        if(in_array(103, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessSuc('<?php echo $IdP; ?>','103','<?php echo $idL; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                
                <tr class="gradeX">
                    <td> Almacen</td>
                    <td> 
                        <?php
                        if(in_array(105, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessSuc('<?php echo $IdP; ?>','105','<?php echo $idL; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

</div>





