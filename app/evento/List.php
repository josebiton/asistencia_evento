<?php
error_reporting(0);
include_once 'config.php';
?>    <div class="ibox-title">
    <h5><?php echo $titulo_tabla; ?></h5>
</div>
<div class="ibox-content">
    <div class="table table-responsive">
        <table class="table table-striped table-bordered table-hover seguros" >
            <thead>
                <tr>
                    <th>Grupo</th>
                    <th>Evento</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Lugar</th>
                    <th>Estado</th>
                    <th data-hide="phone,tablet">Acciones</th>
                </tr>

            </thead>
            <tbody>
                <?php
                include_once '../../common/conexion.php';
                $idsucursal = $_SESSION['sucursal'];
                $List0 = mysqli_query($link, "SELECT * FROM evento WHERE id_sucursal='$idsucursal'");
                while ($list = mysqli_fetch_array($List0)):
                    $id = $list['id_evento'];
                    ?>
                    <tr class="gradeX">
                        <td> <?php $ListSucursales = mysqli_fetch_assoc(mysqli_query($link, "SELECT nombre FROM sucursales WHERE id_sucursal='$idsucursal'")); 
                        echo $ListSucursales['nombre']; ?></td>
                        <td> <?php echo $list['nombre_evento']; ?></td>
                        <td> <?php echo $list['fecha_evento']; ?></td>
                        <td> <?php echo $list['hora_evento']; ?></td>
                        <td> <?php echo $list['lugar_evento']; ?></td>
                        <td> <?php echo $list['estado']; ?></td>
                        <td class="center">
                            <a href="javascript:;" onclick="Update('<?php echo $id; ?>')" title="Editar Datos" data-toggle="modal" data-target="#<?php echo $IdModalUpdate; ?>"><span class="fa fa-edit">&nbsp;&nbsp;&nbsp;</span></a>
                            <a href="javascript:;" onclick="Delete('<?php echo $id; ?>')" title="Eliminar del sistema"><span class="fa fa-trash-o">&nbsp;&nbsp;&nbsp;</span></a>
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
        $('.seguros').DataTable({
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
