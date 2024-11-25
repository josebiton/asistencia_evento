<?php
include_once '../../common/conexion.php';
$idLogin = $_SESSION['id_login'];
$login = mysqli_fetch_assoc(mysqli_query($link, "SELECT id_persona FROM login WHERE id_login='$idLogin'"));
$idPersona = $login['id_persona'];
$persona = mysqli_fetch_assoc(mysqli_query($link, "SELECT*FROM personas WHERE id_persona='$idPersona'"));
$foto=$persona['foto'];
$sexo = $persona['sexo'];
if ($sexo == 'Masculino') {
    if($foto!=null){$img_user = "../perfil/uploads/".$foto;}else{$img_user = $img_user_m;}
    
} else {
    if($foto!=null){$img_user = "../perfil/".$foto;}else{$img_user = $img_user_f;}    
}

?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <center>
                        <img alt="image" class="rounded-circle" src="<?php echo $img_user; ?>" width="96" height="96"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">
                                <?php
                                echo $persona['nombres'];
                                echo "<br>";
                                echo $persona['apellidos'];
                                echo "<br>";
                                ?>
                            </span>
                            <span class="text-muted text-xs block">Ver mas <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">                           
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item"  href="../perfil/">Cambiar Foto</a></li>
                            <li><a class="dropdown-item" href="../../common/cs.php">Salir</a></li>
                        </ul>
                    </center>
                </div>
                <div class="logo-element">
                    <span class="fa fa-desktop"></span>
                </div>
            </li>
            <?php if (in_array(200, $Codigo)) { ?>
                <li><a href="../panel_admin_master"><i class="fa fa-dashboard"></i> <span class="nav-label">PANEL MASTER</span>  </a> </li>    
            <?php }if (in_array(101, $Codigo)) { ?>
                <li><a href="../panel_admin"><i class="fa fa-dashboard"></i> <span class="nav-label">PANEL ADMIN</span>  </a> </li> 
            <?php }if (in_array(102, $Codigo)) { ?>
                <li><a href="../panel_caja"><i class="fa fa-dashboard"></i> <span class="nav-label">PANEL CAJA</span>  </a> </li> 
            <?php
            }if (in_array(103, $Codigo)) { ?>
                <li><a href="../panel_vendedor"><i class="fa fa-dashboard"></i> <span class="nav-label">PANEL VENTAS</span>  </a> </li> 
            <?php
            }if (in_array(105, $Codigo)) { ?>
                <li><a href="../panel_almacen"><i class="fa fa-dashboard"></i> <span class="nav-label">PANEL ALMACÉN</span>  </a> </li> 
            <?php
            }
            if (in_array(101, $Codigo)||in_array(103, $Codigo)) {
                ?>                      
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">CONTRATOS</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="../contratos/">Generar Contratos</a></li>
                        <li><a href="../seguimiento/">Seguimiento</a></li>
                        <li><a href="../rep_contratos/">Reporte</a></li>
                    </ul>
                </li>
<?php }if (in_array(102, $Codigo)) { ?>
                <li>
                    <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">CAJA</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="../open_caja/">Aperturas y Cierres</a></li>
                        <li><a href="../cobranzas/">Cobranzas</a></li>
                        <li><a href="../mov_dinero/">Mov. de dinero</a></li>
                        <li><a href="../ingresos/">Ingresos</a></li>
                        <li><a href="../egresos/">Egresos</a></li>
                    </ul>
                </li>
            <?php }if (in_array(200, $Codigo)) { ?>
                <li><a href="../servicios/"><i class="fa fa-magic"></i> <span class="nav-label">SERVICIOS</span>  </a> </li>
            <?php }if (in_array(200, $Codigo)) { ?>
                <li><a href="../seguros"><i class="fa fa-star-half-full"></i> <span class="nav-label">SEGUROS</span>  </a> </li>
<?php }if (in_array(101, $Codigo)||in_array(105, $Codigo)) { ?>
                <li>
                    <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">ALMACÉN </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <!--<li><a href="../cosas">Cosas</a></li>-->
                        <li><a href="../ataudes/">Ataudes</a></li>                         
                        <li><a href="../traslados/">Traslados</a></li>                         
                        <li><a href="../cbarras/">Código de barras</a></li>
                    </ul>
                </li>                
            <?php }if (in_array(200, $Codigo)) { ?><li><a href="../proveedores/"><i class="fa fa-user-secret"></i> <span class="nav-label">PROVEEDORES</span></a></li><?php }
        
            if (in_array(200, $Codigo)) {
                ?>
                <li><a href="../sucursales/"><i class="fa fa-street-view"></i> <span class="nav-label">SUCURSALES</span>  </a> </li>
<?php }if (in_array(101, $Codigo)) { ?>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">USER. SUCURSAL </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="../usuario_adm">Usuarios</a></li>
                        <li><a href="../access_adm">Accesos</a></li>
                    </ul>
                </li>
<?php }if (in_array(200, $Codigo)) { ?>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">USER. MASTER</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="../usuario_master/">Usuarios</a></li>
                        <li><a href="../access_master/">Accesos</a></li>
                    </ul>
                </li>
<?php }if (in_array(101, $Codigo)) { ?>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">REPORTES SUC.</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="#">Contratos</a></li>
                    </ul>
                </li>
<?php }if (in_array(200, $Codigo)) { ?>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">REPORTES GENERALES</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="#">Contratos</a></li>
                    </ul>
                </li>
<?php } ?>




    </div>
</nav>

