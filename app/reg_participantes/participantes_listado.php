<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Lista de participantes</a></li>
                    
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Nombres de los participantes</th>
                                            <th data-hide="phone,tablet">DNI</th>
                                            <th data-hide="phone,tablet">Evento</th>
                                            <th data-hide="phone,tablet">Fecha Pago</th>
                                            <th data-hide="phone,tablet">Hora Pago</th>
                                            <th data-hide="phone,tablet">Asistió</th>
                                            <th data-hide="phone,tablet">Hora Ingreso</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../../common/conexion.php';
                                        //$id_sucursal = $_SESSION['sucursal'];
                                        $listarbienes = mysqli_query($link, "SELECT * FROM participantes");// WHERE asistio = '' OR asistio IS NULL;
                                        while ($listarbienes1 = mysqli_fetch_array($listarbienes)):
                                            ?>
                                            <tr class="gradeX">
                                                <td><?php echo $listarbienes1['nombres']; ?></td>
                                                <td><?php echo $listarbienes1['dni']; ?></td>
                                                <td><?php echo $listarbienes1['grupo']; ?></td>                                               
                                                <td><?php echo $listarbienes1['fecha_pago']; ?></td>                                               
                                                <td><?php echo $listarbienes1['hora_pago']; ?></td>                                               
                                                <td><?php $dato= $listarbienes1['asistio']; 
                                                if($dato!='SI'){ echo "NO";}else{ echo "SI"; }?></td>  
                                                <td><?php echo $listarbienes1['hora_llegada']; ?></td>
                                            </tr>
                                            <?php
                                        endwhile;
                                        ?>

                                        </tfoot>
                                </table>
                            </div>


                        </div>
                    </div>
                    
                </div>


            </div>

        </div>
    </div>
</div>




<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
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