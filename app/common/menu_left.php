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
            <?php if (in_array(101, $Codigo)) { ?>
            <li><a href="../panel_admin"><i class="fa fa-dashboard"></i> <span class="nav-label">INICIO</span>  </a> </li>
            <?php }if (in_array(101, $Codigo)||in_array(102, $Codigo)||in_array(200, $Codigo)) { ?>
            <li><a href="../evento"><i class="fa fa-calendar"></i> <span class="nav-label">EVENTOS</span>  </a> </li>
            <?php }if (in_array(105, $Codigo)||in_array(101, $Codigo)||in_array(200, $Codigo)) { ?>
            <li><a href="../reg_asistencia"><i class="fa fa-list-ol"></i> <span class="nav-label">REG. ASISTENCIA</span>  </a> </li>
            <?php }if (in_array(102, $Codigo)||in_array(101, $Codigo)||in_array(200, $Codigo)) { ?>
            <li><a href="../cargar_data"><i class="fa fa-upload"></i> <span class="nav-label">CARGAR LISTA</span>  </a> </li>
            <?php }if (in_array(101, $Codigo)||in_array(102, $Codigo)||in_array(200, $Codigo)) { ?>
            <li><a href="../reg_participantes"><i class="fa fa-list"></i> <span class="nav-label">REGISTRO & LISTADO</span>  </a> </li>
            <?php }if (in_array(200, $Codigo)) { ?>
            <li><a href="../sucursales/"><i class="fa fa-street-view"></i> <span class="nav-label">ÁREAS</span>  </a> </li>
            <?php }if (in_array(101, $Codigo)||in_array(200, $Codigo)) { ?>
            <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">USERS. AREA </span><span class="fa arrow"></span></a>
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
            <?php }//if (in_array(101, $Codigo)) { ?>
            
           
        




    </div>
</nav>

