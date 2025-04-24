        <footer class="footer">
            
        </footer>
        </div>
        </div>
        <div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="my-modal-title">Modificar Contraseña</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="cambiarContra">
                            <div id="errorPass"></div>
                            <div class="form-group">
                                <label for="actual">Contraseña Actual</label>
                                <input id="actual" class="form-control" type="password" name="actual" placeholder="Contraseña Actual">
                            </div>
                            <div class="form-group">
                                <label for="nueva">Contraseña Nueva</label>
                                <input id="nueva" class="form-control" type="password" name="nueva" placeholder="Contraseña Nueva">
                            </div>
                            <button class="btn btn-primary" type="button" id="cambiar">Cambiar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="my-modal-title">Confirmar</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-black">¿Esta seguro que desea salir</p>
                    </div>
                    <!-- <div class="modal-footer ml-auto"> -->
                    <div class="modal-footer">
                        <a href="/Usuarios/salir" class="btn btn-danger">Si</a>
                        <button class="btn btn-primary" data-dismiss="modal" type="button">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScript files-->
        <script src="/Assets/js/jquery.min.js"></script>
        <script src="/Assets/js/bootstrap.bundle.min.js"></script>
        <script src="/Assets/js/Funciones.js"></script>
        <script src="/Assets/js/chartjs.min.js"></script>
        <script src="/Assets/js/all.min.js"></script>
        <script src="/Assets/js/front.js"></script>
        <script src="/Assets/js/sweetalert2@9.js"></script>
        <script src="/Assets/js/jquery.dataTables.min.js"></script>
        <script src="/Assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="/Assets/DataTables/DataTables-1.10.21/js/dataTables.select.min.js" type="text/javascript"></script>
        <script src="/Assets/js/autocompleteBS.js"></script>
        


        <script>
            var global_tablelanguage = {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Próximo",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            };
            $(document).ready(function() {
                $('#Table').DataTable({
					language: global_tablelanguage
				});
            });
        </script>
        </body>

        </html>