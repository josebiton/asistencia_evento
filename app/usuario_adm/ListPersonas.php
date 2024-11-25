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
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Cumpleaños</th>
                    <th data-hide="phone,tablet">Acciones</th>
                </tr>

            </thead>
            <tbody>
                <?php
                include_once '../../common/conexion.php';
               $id_sucursal= $_SESSION['sucursal'];
               $sucursal= mysqli_fetch_assoc(mysqli_query($link, "SELECT*FROM sucursales WHERE id_sucursal='$id_sucursal'"));
                    $ListLogin = mysqli_query($link, "SELECT * FROM login WHERE id_sucursal='$id_sucursal'");
                    while ($listlogins = mysqli_fetch_array($ListLogin)):
                        $idpersonalogin=$listlogins['id_persona'];
                        $idlogin=$listlogins['id_login'];
                        $ListPersonas = mysqli_query($link, "SELECT * FROM personas WHERE id_persona='$idpersonalogin'");
                        while ($listpersonas = mysqli_fetch_array($ListPersonas)):
                            $idpersona = $listpersonas['id_persona'];
                            ?>
                            <tr class="gradeX">
                                <td> <?php echo $sucursal['nombre']; ?></td>
                                <td><?php                                    
                                    echo $listpersonas['nombres'];
                                    echo "&nbsp;";
                                    echo $listpersonas['apellidos'];
                                    ?></td>
                                <td> <?php echo $listpersonas['dni']; ?></td>
                                <td> <?php echo $listpersonas['telefono']; ?></td>
                                <td><?php echo $listpersonas['direccion']; ?></td>
                                <td><?php echo $listpersonas['email']; ?></td>
                                <td><?php echo $listpersonas['nacimiento']; ?></td>
                                <td class="center">
                                    <a href="javascript:;" onclick="UpdPersona('<?php echo $idpersona; ?>', '<?php echo $idlogin; ?>')" title="Editar Datos" data-toggle="modal" data-target="#ModalUpdPersona"><span class="fa fa-edit">&nbsp;&nbsp;&nbsp;</span></a>
                                    <a href="javascript:;" onclick="DelPersona('<?php echo $idpersona; ?>', '<?php echo $idlogin; ?>')" title="Eliminar del sistema"><span class="fa fa-trash-o">&nbsp;&nbsp;&nbsp;</span></a>
                                </td>
                            </tr>
                            <?php
                        endwhile;
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
