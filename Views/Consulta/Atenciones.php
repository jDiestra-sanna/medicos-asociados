<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump($data->data);?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> HISTORIAL DE ATENCIONES</h6></li>
                            </ol>
                        </nav>
                        <div class="card-footer">
                            <a href="/Consulta/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                        <div class="row">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Fecha Atención</th>
                                            <th>Beneficio</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            if($data && $data->success && count($data->data)>0) 
                                            {
                                                foreach ($data->data as $cl) { 
                                                     ?>
                                                <tr>
                                                    <td><?php echo $cl->fec_ate; ?></td>
                                                    <td><?php echo $cl->beneficio; ?></td>
                                                    <td><?php echo $cl->nom_pac; ?></td>
                                                </tr>
                                        <?php
                                                }
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    

                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>