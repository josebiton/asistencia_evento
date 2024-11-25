<?php
error_reporting(0);
?>    <div class="ibox-title">
    <h5><?php echo $titulo_tabla; ?></h5>
</div>
<div class="ibox-content">
    <div class="table table-responsive">
        <table class="table table-striped table-bordered table-hover sucursales" >
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Región</th>
                    <th>Provincia</th>
                    <th>Distrito</th>
                    <th>Dirección</th>
                    <th data-hide="phone,tablet">Acciones</th>
                </tr>

            </thead>
            <tbody>
                <?php
                include_once '../../common/conexion.php';

                        $ListSucursales = mysqli_query($link, "SELECT * FROM sucursales");
                        while ($listsucursales = mysqli_fetch_array($ListSucursales)):
                            $idsucursal = $listsucursales['id_sucursal'];
                            ?>
                            <tr class="gradeX">
                                <td> <?php echo $listsucursales['nombre']; ?></td>
                                <td><?php                                    
                                    echo $listsucursales['telefono'];
                                    ?></td>
                                <td> <?php echo $listsucursales['region']; ?></td>
                                <td> <?php echo $listsucursales['provincia']; ?></td>
                                <td><?php echo $listsucursales['distrito']; ?></td>
                                <td><?php echo $listsucursales['direccion']; ?></td>
                                <td class="center">
                                    <a href="javascript:;" onclick="UpdSucursal('<?php echo $idsucursal; ?>')" title="Editar Datos" data-toggle="modal" data-target="#ModalUpdSucursal"><span class="fa fa-edit">&nbsp;&nbsp;&nbsp;</span></a>
                                   <a href="javascript:;" onclick="DelSucursal('<?php echo $idsucursal; ?>')" title="Eliminar del sistema"><span class="fa fa-trash-o">&nbsp;&nbsp;&nbsp;</span></a>
                                   <a href="javascript:;" onclick="AuditarSucursal('<?php echo $idsucursal; ?>')" title="Auditar esta Sucursal"><span class="fa fa-eye">&nbsp;&nbsp;&nbsp;</span></a>
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
        $('.sucursales').DataTable({
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
