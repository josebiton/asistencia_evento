<?php
include_once '../common/conexion.php';
date_default_timezone_set('America/Lima');
$idl=$_SESSION['id_login'];
$sucursal= mysqli_fetch_assoc(mysqli_query($link, "SELECT id_sucursal FROM login WHERE id_login='$idl'"));
$ids=$sucursal['id_sucursal'];
$sucursal= mysqli_fetch_assoc(mysqli_query($link, "SELECT nombre FROM sucursales WHERE id_sucursal='$ids'"));
$nombresucursal=$sucursal['nombre'];
?>
<div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="apunte rápido" class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><b><?php echo $bienvenidos_a; echo "&nbsp;&nbsp;(&nbsp;$nombresucursal&nbsp;)&nbsp;";?></b></span>
                </li>
                <li>
                    <a href="../../common/cs.php">
                        <i class="fa fa-sign-out"></i> Salir
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>