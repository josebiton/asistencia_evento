<?php
error_reporting(0);
?>    <div class="ibox-title">
    <h5><?php echo $titulo_tabla; ?></h5>
</div>
<div class="ibox-content">
    <div class="table table-responsive">
        <table class="table table-striped table-bordered table-hover inquilinos" >
            <thead>

                <tr>
                    <th>Sucursal</th>
                    <th>Nombres</th>
                    <th>DNI</th>
                    <th data-hide="phone,tablet">Acciones</th>
                </tr>

            </thead>
            <tbody>
                <?php
                include_once '../../common/conexion.php';
                $id_sucursal = $_SESSION['sucursal'];
                $ListLogins = mysqli_query($link, "SELECT id_login,id_persona FROM login WHERE id_sucursal='$id_sucursal'");
                while ($listlogins = mysqli_fetch_array($ListLogins)):
                $idlogin = $listlogins['id_login'];              
                $id_persona = $listlogins['id_persona'];            
                
                ?>
                <tr class="gradeX">
                    <td> <?php
                        $sucursal = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombre FROM sucursales WHERE id_sucursal='$id_sucursal'"));                       
                        echo $sucursal['nombre'];
                        ?></td>
                    <td><?php
                        $personas = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombres, apellidos, dni FROM personas WHERE id_persona='$id_persona'"));
                        echo $personas['nombres'];
                        echo "&nbsp;";
                        echo $personas['apellidos'];
                        ?></td>
                    <td> <?php echo $personas['dni']; ?></td>
                    <td class="center">
                        <a href="javascript:;" onclick="AsignAccesoSuc('<?php echo $id_persona; ?>', '<?php echo $idlogin; ?>', '<?php echo $id_sucursal; ?>')" title="Asignar Acceso" ><span class="fa fa-arrow-right">&nbsp;&nbsp;&nbsp;</span></a>
                        <a href="javascript:;" onclick="ResetPass('<?php echo $idlogin; ?>')" title="Asignar Usuario y Clave"data-toggle="modal" data-target="#myModal3"><span class="fa fa-key">&nbsp;&nbsp;&nbsp;</span></a>
                     </td>
                </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('.inquilinos').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });

</script>
