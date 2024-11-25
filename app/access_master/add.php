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
    <h5>Asignar Acceso como administrador de sucursal a: &nbsp;&nbsp; <font color="red"><b><?php echo $NombreP; ?> &nbsp;/ &nbsp;<?php echo $NombreSuc; ?>&nbsp;&nbsp;&nbsp;</b></font></h5>
    <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
</div>
<div class="ibox-content"> 
    <div id="adm" style="display: none;">
        <div class="col-lg-12 row form-group">
            <select class="form-control" id="sucursal">
                <option value="0">* Elija la sucursal en la que será administrador</option>
                <?php
                $sucursales = mysqli_query($link, "SELECT id_sucursal, nombre FROM sucursales");
                while ($row = mysqli_fetch_array($sucursales)) {
                    ?>
                    <option value="<?php echo $row['id_sucursal']; ?>"><?php echo $row['nombre']; ?></option>
                <?php } ?>
            </select> 
        </div>
        <div class="col-lg-12 row form-group">
            <a href="javascript:;" onclick="AccessAdmin($('#sucursal').val(), '<?php echo $IdP; ?>','<?php echo $idL;?>')" class="btn btn-success float-right "> Convertir en administrador de sucursal </a>
        </div>

    </div>
    <div id="master" style="display: block;">
        <div class="col-lg-12 row form-group">
            <a href="javascript:;" onclick="AccessMaster('<?php echo $idS; ?>','<?php echo $IdP; ?>','<?php echo $idL; ?>',)" class="btn btn-success float-right "> Convertir en ADMIN MASTER </a>
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
                    <td> Admin Master</td>
                    <td> 
                        <?php
                        if(in_array(200, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessM('<?php echo $IdP; ?>','200','<?php echo $idL; ?>','<?php echo $idS; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td> Admin Sucursal</td>
                    <td> 
                        <?php
                        if(in_array(101, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessM('<?php echo $IdP; ?>','101','<?php echo $idL; ?>','<?php echo $idS; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td> Caja</td>
                    <td> 
                        <?php
                        if(in_array(102, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessM('<?php echo $IdP; ?>','102','<?php echo $idL; ?>','<?php echo $idS; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td> Ventas</td>
                    <td> 
                        <?php
                        if(in_array(103, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessM('<?php echo $IdP; ?>','103','<?php echo $idL; ?>','<?php echo $idS; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
               <!-- <tr class="gradeX">
                    <td> Cobranzas</td>
                    <td> 
                        <?php
                       // if(in_array(104, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessM('<?php //echo $IdP; ?>','104','<?php //echo $idL; ?>','<?php //echo $idS; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php //} ?>
                    </td>
                </tr>
               -->
                <tr class="gradeX">
                    <td> Almacen</td>
                    <td> 
                        <?php
                        if(in_array(105, $Codigo)){
                        ?>
                        <a href="javascript:;" onclick="DelAccessM('<?php echo $IdP; ?>','105','<?php echo $idL; ?>','<?php echo $idS; ?>')" title="Quitar este acceso"><span class="fa fa-remove"></span></a>
                        <?php } ?>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

</div>


<script type="text/javascript">
    function showContent() {
        element = document.getElementById("adm");
        master = document.getElementById("master");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display = 'block';
            master.style.display = 'none';
        } else {
            element.style.display = 'none';
            master.style.display = 'block';
        }
    }
</script>


